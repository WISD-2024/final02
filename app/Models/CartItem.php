<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    // 如果資料表名稱不是 `cart_items`，需要明確指定
    protected $table = 'cart_items';

    // 定義允許批量賦值的欄位
    protected $fillable = ['name', 'price', 'quantity'];
}
