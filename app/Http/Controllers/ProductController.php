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
}
