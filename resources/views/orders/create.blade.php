<!-- resources/views/orders/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>結帳</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        
        <h2>送貨地址</h2>
        <textarea name="shipping_address" required></textarea>

        <h2>付款方式</h2>
        <select name="payment_method" required>
            <option value="credit_card">信用卡</option>
            <option value="paypal">PayPal</option>
            <option value="bank_transfer">銀行轉帳</option>
        </select>

        <h2>購物車項目</h2>
        <ul>
            @foreach ($cartItems as $cartItem)
                <li>{{ $cartItem->product->name }} - {{ $cartItem->quantity }} x ${{ $cartItem->price }}</li>
            @endforeach
        </ul>

        <button type="submit">提交訂單</button>
    </form>
@endsection
