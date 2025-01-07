<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    // 設定可以批量賦值的欄位
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
    ];

    // 與 User 模型的關聯
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 與 Product 模型的關聯
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
