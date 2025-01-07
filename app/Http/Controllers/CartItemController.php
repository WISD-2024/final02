<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request
use App\Models\CartItem;

class CartItemController extends Controller
{
    /**
     * 刪除指定的購物車商品
     *
     * @param  \App\Models\CartItem  $cart_item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CartItem $cart_item)
    {
        // 刪除該商品
        $cart_item->delete();

        // 重定向回購物車列表頁
        return redirect()->route('cart_items.index')->with('success', '商品已成功刪除');
    }
}
