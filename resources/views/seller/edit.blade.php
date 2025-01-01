<!-- resources/views/seller/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container text-gray-900 dark:text-white">
        <h1 class="text-gray-900 dark:text-white">Create New Product</h1>

        <!-- 顯示表單驗證錯誤訊息 -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('seller.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- 指示這是 PUT 請求，對應商品更新操作 -->

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update Product</button>
        </form>
    </div>
@endsection