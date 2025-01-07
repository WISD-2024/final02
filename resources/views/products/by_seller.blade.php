<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $seller->name }} 的商品列表</title>
</head>
<body>
    <h1>{{ $seller->name }} 的商品列表</h1>
    
    @if ($products->isEmpty())
        <p>該賣家目前沒有商品。</p>
    @else
        <ul>
            @foreach ($products as $product)
                <li>
                    <h2>{{ $product->name }}</h2>
                    <p>價格：{{ $product->price }}</p>
                    <p>描述：{{ $product->description }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
