namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword'); // 獲取輸入的關鍵字
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get(); // 模糊查詢產品名稱

        return view('products.search', compact('products', 'keyword'));
    }

    public function show(Product $product)
    {
        // 顯示商品頁面，傳遞商品資料到視圖
        return view('products.show', compact('product'));
    }
}
