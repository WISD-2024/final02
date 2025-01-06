<!-- resources/views/seller/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container text-gray-900 dark:text-white">


        <!-- 顯示操作成功的訊息 -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('seller.create') }}" class="btn btn-primary">新增商品</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>名稱</th>
                    <th>價格</th>
                    <th>說明</th>
                    <th>動作</th>
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
