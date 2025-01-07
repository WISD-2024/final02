<!-- resources/views/orders/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>訂單詳情</h1>

    <h2>訂單編號: {{ $order->id }}</h2>
    <p>付款方式: {{ $order->payment_method }}</p>
    <p>送貨地址: {{ $order->shipping_address }}</p>

    <h3>訂單項目</h3>
    <ul>
        @foreach ($order->orderDetails as $orderDetail)
            <li>{{ $orderDetail->product->name }} - {{ $orderDetail->quantity }} x ${{ $orderDetail->price }}</li>
        @endforeach
    </ul>
@endsection
