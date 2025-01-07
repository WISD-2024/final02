<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>本地手工藝品交易平台</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        /* Header */
        header {
            background-color: #ff8c42;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header .logo {
            font-size: 1.8rem;
            font-weight: bold;
            letter-spacing: 2px;
        }

        header nav a {
            color: white;
            text-decoration: none;
            margin: 0 1rem;
            font-weight: 700;
            transition: color 0.3s ease;
        }

        header nav a:hover {
            color: #ffd699;
        }

        /* Banner */
        .banner {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url('https://via.placeholder.com/1500x500') no-repeat center center/cover;
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 0 1rem;
        }

        .banner h1 {
            font-size: 3.5rem;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 3px;
            animation: fadeIn 2s ease-in-out;
        }

        .banner p {
            font-size: 1.5rem;
            margin: 1rem 0 2rem;
            animation: fadeIn 3s ease-in-out;
        }

        .banner .cta-btn {
            padding: 0.8rem 2rem;
            background-color: #ff8c42;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .banner .cta-btn:hover {
            background-color: #ffd699;
        }

        /* Products Section */
        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem;
            background-color: white;
        }

        .product-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-card h3 {
            margin: 1rem 0 0.5rem;
            font-size: 1.2rem;
            color: #333;
            padding: 0 1rem;
        }

        .product-card p {
            color: #777;
            font-size: 1rem;
            margin-bottom: 1rem;
            padding: 0 1rem;
        }

        .product-card .btn {
            display: inline-block;
            margin: 1rem 0;
            padding: 0.5rem 1.5rem;
            background-color: #ff8c42;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .product-card .btn:hover {
            background-color: #ffd699;
        }

        /* Footer */
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 1.5rem 0;
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
<header>
    <div class="logo">手工藝品交易</div>
    <nav>
        @auth
            <a href="#">Welcome, {{ auth()->user()->name }}</a>
            <a href="{{ route('seller.index') }}">賣家頁面</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth

            @if(auth()->user() && auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">管理員後台</a>
            @endif
            @auth
                <a href="#" data-toggle="modal" data-target="#complaintModal">意見欄</a>
            @endauth
    </nav>
</header>

<div class="banner">
    <div>
        <h1>Explore Handmade Wonders</h1>
        <p>Discover unique, handcrafted items made with love</p>
        <a href="{{ route('products.search') }}" class="cta-btn">立即購買</a>
    </div>
</div>

<section class="products">
    @foreach($products as $product) <!-- 遍歷所有產品 -->
        <div class="product-card">
            <!-- 顯示商品圖片 -->
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">

            <h3>{{ $product->name }}</h3>
            <p>${{ number_format($product->price, 2) }}</p>
            <a href="#" class="btn">Buy Now</a>
        </div>
    @endforeach
</section>
<footer>
    <p>&copy; 2024 本地手工藝品交易平台. All rights reserved.</p>
</footer>


</body>

</html>
