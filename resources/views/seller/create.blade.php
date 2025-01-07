@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">

        <!-- 顯示表單驗證錯誤訊息 -->
        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded-lg shadow-md mb-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="text-3xl font-semibold text-gray-900 dark:text-white mb-6">新增新的商品</h1>

        <!-- 表單 -->
        <form action="{{ route('seller.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf

            <!-- 商品名稱 -->
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-medium mb-2">商品名稱</label>
                <input type="text" class="form-control text-black block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <!-- 價格 -->
            <div class="mb-6">
                <label for="price" class="block text-gray-700 font-medium mb-2">價格</label>
                <input type="number" class="form-control text-black block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="price" name="price" value="{{ old('price') }}" required>
            </div>

            <!-- 商品說明 -->
            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-medium mb-2">說明</label>
                <textarea class="form-control text-black block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <!-- 圖片上傳 -->
            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-medium mb-2">上傳圖片</label>
                <input type="file" class="form-control block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="image" name="image" accept="image/*">
            </div>

            <!-- 提交按鈕 -->
            <button type="submit" class="w-full bg-green-500 text-black py-3 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400" style="background-color: #38a169 !important;">
                新增商品
            </button>
        </form>
    </div>
@endsection