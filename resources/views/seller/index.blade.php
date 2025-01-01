<!-- resources/views/seller/index.blade.php -->
@extends('layouts.app') <!-- 假設有一個共享的佈局文件 -->

@section('content')
    <div class="container">
        <h1>My Products</h1>

        <!-- 顯示操作成功的訊息 -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('seller.create') }}" class="btn btn-primary">Create New Product</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('seller.edit', $product->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('seller.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
