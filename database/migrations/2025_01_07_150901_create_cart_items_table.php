<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();  // 購物車項目 ID，自動遞增
            $table->unsignedBigInteger('user_id');  // 用戶 ID，指向使用者
            $table->unsignedBigInteger('product_id');  // 產品 ID，指向產品表
            $table->integer('quantity')->default(1);  // 產品數量，默認為 1
            $table->decimal('price', 10, 2);  // 單個產品的價格
            $table->timestamps();  // 購物車項目的創建和更新時間

            // 外鍵約束
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
