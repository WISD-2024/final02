<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;

class OrderController extends Controller
{
    public function create()
    {
        // 假設用戶的購物車項目存放在 CartItem 中
        $cartItems = CartItem::where('user_id', auth()->id())->get();

        // 顯示結帳頁面，並傳遞購物車項目
        return view('orders.create', compact('cartItems'));
    }

    public function store(Request $request)
    {
        // 驗證傳遞的資料
        $validated = $request->validate([
            'payment_method' => 'required|string',
            'shipping_address' => 'required|string',
            // 其他必需的欄位
        ]);

        // 開始儲存訂單
        $order = new Order();
        $order->user_id = auth()->id();
        $order->payment_method = $validated['payment_method'];
        $order->shipping_address = $validated['shipping_address'];
        // 儲存訂單，並將其他需要的資料填入
        $order->save();

        // 儲存訂單詳細資料
        $cartItems = CartItem::where('user_id', auth()->id())->get();
        foreach ($cartItems as $cartItem) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $cartItem->product_id;
            $orderDetail->quantity = $cartItem->quantity;
            $orderDetail->price = $cartItem->price;
            $orderDetail->save();

            // 移除購物車中的項目
            $cartItem->delete();
        }

        // 訂單提交成功，重定向到訂單詳情頁
        return redirect()->route('orders.show', ['order' => $order->id]);
    }

    public function show($orderId)
    {
        $order = Order::with('orderDetails.product')->findOrFail($orderId);

        return view('orders.show', compact('order'));
    }

    /**
     * 顯示所有訂單的頁面
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 獲取所有訂單，這裡可以根據需要進行篩選或排序
        $orders = Order::all();

        // 返回訂單列表的視圖
        return view('orders.index', compact('orders'));
    }

    /**
     * 取消訂單並更新商品庫存
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel(Order $order)
    {
        // 確保訂單的狀態為未取消
        if ($order->status !== 'canceled') {
            // 改變訂單狀態為已取消
            $order->status = 'canceled';
            $order->save();

            // 更新每個商品的庫存
            foreach ($order->orderDetails as $orderDetail) {
                $product = $orderDetail->product;
                $product->stock += $orderDetail->quantity;  // 增加庫存
                $product->save();
            }

            // 返回到訂單頁面
            return redirect()->route('orders.index')->with('success', '訂單已成功取消');
        }

        // 如果訂單已經取消，返回訂單頁面
        return redirect()->route('orders.index')->with('error', '該訂單已經被取消過了');
    }
}
