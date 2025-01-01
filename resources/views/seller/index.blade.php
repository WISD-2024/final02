<!-- resources/views/seller/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container text-gray-900 dark:text-white">
        <h1 class="text-gray-900 dark:text-white">Create New Product</h1>

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
