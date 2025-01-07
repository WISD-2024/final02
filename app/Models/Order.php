<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // 定義可以批量賦值的欄位
    protected $fillable = ['order_number', 'status', 'total_amount', 'user_id'];

    // 其他必要的邏輯可以加入這裡
}
