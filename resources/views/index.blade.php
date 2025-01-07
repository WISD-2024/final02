<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購物車項目</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>購物車項目</h1>
    @if($cartItems->isEmpty())
        <p>購物車是空的。</p>
    @else
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>商品名稱</th>
                <th>價格</th>
                <th>數量</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cartItems as $cart_item)
                <tr>
                    <td>{{ $cart_item->name }}</td>
                    <td>${{ $cart_item->price }}</td>
                    <td>{{ $cart_item->quantity }}</td>
                    <td>
                        <form action="{{ route('cart_items.destroy', $cart_item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">刪除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>

    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <form action="{{ route('cart_items.destroy', $cart_item->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">刪除</button>
</form>
