<!-- resources/views/seller/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">

        <!-- 顯示操作成功的訊息 -->
        @if(session('success'))
            <div class="alert alert-success p-4 mb-6 rounded-lg shadow-md" style="background-color: #d1fae5 !important; color: #16a34a !important;">
                {{ session('success') }}
            </div>
        @endif

        <!-- 新增商品按鈕 -->
        <div class="mb-6 text-right">
            <a href="{{ route('seller.create') }}" class="text-white px-6 py-2 rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200 ease-in-out" style="background-color: #48bb78 !important;">
                新增商品
            </a>
        </div>

        <!-- 商品列表表格 -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto border-collapse text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left font-semibold text-gray-700">名稱</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-700">價格</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-700">說明</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-700">動作</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($products as $product)
                        <tr>
                            <td class="py-3 px-4">{{ $product->name }}</td>
                            <td class="py-3 px-4">{{ $product->price }}</td>
                            <td class="py-3 px-4">{{ $product->description }}</td>
                            <td class="py-3 px-4 space-x-2">
                            <a href="{{ route('seller.edit', $product->id) }}" class="btn btn-warning bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400" style="background-color: #F59E0B !important;">
                            更改
                        </a>

                                <form action="{{ route('seller.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                                        刪除
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
