@extends('layouts.app')

@section('content')
    <div class="container text-gray-900 dark:text-white">
        <h1 class="text-gray-900 dark:text-white text-2xl font-bold mb-4">更改商品</h1>

        <!-- 顯示表單驗證錯誤訊息 -->
        @if($errors->any())
            <div class="alert alert-danger bg-red-500 text-white p-3 rounded-lg mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('seller.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT') <!-- 指示這是 PUT 請求，對應商品更新操作 -->

            <!-- 商品名稱 -->
            <div class="mb-4">
                <label for="name" class="form-label text-lg font-medium text-gray-800 dark:text-white">商品名稱</label>
                <input type="text" class="form-control w-full text-black p-3 rounded-md border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 dark:bg-gray-700 dark:text-white" id="name" name="name" value="{{ old('name', $product->name) }}" required style="color: black; background-color: white;">
            </div>

            <!-- 價格 -->
            <div class="mb-4">
                <label for="price" class="form-label text-lg font-medium text-gray-800 dark:text-white">價格</label>
                <input type="number" class="form-control w-full text-black p-3 rounded-md border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 dark:bg-gray-700 dark:text-white" id="price" name="price" value="{{ old('price', $product->price) }}" required style="color: black; background-color: white;">
            </div>

            <!-- 商品說明 -->
            <div class="mb-4">
                <label for="description" class="form-label text-lg font-medium text-gray-800 dark:text-white">說明</label>
                <textarea class="form-control w-full text-black p-3 rounded-md border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 dark:bg-gray-700 dark:text-white" id="description" name="description" style="color: black; background-color: white;">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- 目前圖片 -->
            <div class="mb-4">
                <label class="form-label text-lg font-medium text-gray-800 dark:text-white">目前圖片</label>
                <div>
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="商品圖片" class="rounded-md w-48 h-auto">
                    @else
                        <p class="text-gray-600 dark:text-gray-300">尚未上傳圖片</p>
                    @endif
                </div>
            </div>

            <!-- 新圖片上傳 -->
            <div class="mb-4">
                <label for="image" class="form-label text-lg font-medium text-gray-800 dark:text-white">更改圖片</label>
                <input type="file" class="form-control block w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none dark:bg-gray-700 dark:text-gray-300" id="image" name="image" accept="image/*">
                <small class="text-gray-500 dark:text-gray-400">（選擇新圖片會取代目前圖片）</small>
            </div>

            <!-- 更新按鈕 -->
            <button type="submit" class="btn btn-warning bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400" style="background-color: #F59E0B !important;">
                更新商品
            </button>
        </form>
    </div>
@endsection