@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>搜尋結果</h1>

        @if($keyword)
            <p>關鍵字：<strong>{{ $keyword }}</strong></p>
        @endif

        @if($products->isEmpty())
            <p>未找到相關產品。</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>編號</th>
                        <th>產品名稱</th>
                        <th>描述</th>
                        <th>價格</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
