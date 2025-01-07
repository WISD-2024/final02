<!-- resources/views/orders/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="checkout-container">
        <h1>結帳</h1>

        <form action="{{ route('orders.store') }}" method="POST" class="checkout-form">
            @csrf

            <div class="form-section">
                <h2>送貨地址</h2>
                <textarea name="shipping_address" required placeholder="請輸入送貨地址..." class="form-input"></textarea>
            </div>

            <div class="form-section">
                <h2>付款方式</h2>
                <select name="payment_method" required class="form-input">
                    <option value="credit_card">信用卡</option>
                    <option value="paypal">PayPal</option>
                    <option value="bank_transfer">銀行轉帳</option>
                </select>
            </div>

            <div class="form-section">
                <h2>購物車項目</h2>
                <ul class="cart-items-list">
                    @foreach ($cartItems as $cartItem)
                        <li class="cart-item">
                            <span class="cart-item-name">{{ $cartItem->product->name }}</span> - 
                            <span class="cart-item-quantity">{{ $cartItem->quantity }} x ${{ $cartItem->price }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <button type="submit" class="submit-btn">提交訂單</button>
        </form>
    </div>

    <style>
        /* 基本頁面佈局 */
        .checkout-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .checkout-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* 表單區塊 */
        .form-section {
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .form-section h2 {
            font-size: 1.25rem;
            color: #555;
            margin-bottom: 10px;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .form-input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .cart-items-list {
            list-style-type: none;
            padding-left: 0;
        }

        .cart-item {
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
            font-size: 1rem;
            color: #333;
        }

        .cart-item-name {
            font-weight: bold;
        }

        .cart-item-quantity {
            color: #777;
        }

        /* 提交按鈕 */
        .submit-btn {
            background-color: #007bff;
            color: #fff;
            font-size: 1.2rem;
            padding: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        /* 響應式設計 */
        @media (max-width: 768px) {
            .checkout-container {
                padding: 15px;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
@endsection
