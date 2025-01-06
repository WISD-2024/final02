<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // 用戶 ID
        'complaint', // 投訴內容
    ];

    // 定義與 User 模型的關聯
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
