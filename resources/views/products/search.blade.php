@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">

        <!-- 搜尋表單 -->
        <div class="mb-6 text-center">
            <form action="{{ route('products.search') }}" method="GET">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="搜尋商品..." class="p-3 border border-gray-300 rounded-lg w-1/3">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">搜尋</button>
            </form>
        </div>

        <!-- 顯示搜尋結果 -->
        @if($keyword)
            <p class="text-center mb-4">關鍵字：<strong>{{ $keyword }}</strong></p>
        @endif

        @if($products->isEmpty())
            <p class="text-center text-red-500">未找到相關產品。</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="product-card border border-gray-300 rounded-lg shadow-lg p-4">
                        <!-- 顯示商品圖片 -->
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md mb-4">

                        <!-- 商品名稱 -->
                        <h3 class="text-lg font-semibold mb-2" style="color: white !important;">{{ $product->name }}</h3>

                        <p class="text-gray-600 mb-2" style="color: white !important;">{{ $product->description }}</p>
                        
                        <p class="text-xl font-semibold text-green-600 mb-2">${{ number_format($product->price, 2) }}</p>

                        <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 mt-4 block text-center">立即購買</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
