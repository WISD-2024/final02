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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();  // 訂單編號，自動遞增
            $table->unsignedBigInteger('user_id');  // 用戶 ID
            $table->decimal('order_amount', 10, 2);  // 訂單金額
            $table->string('order_status', 50);  // 訂單狀態
            $table->timestamps();  // 訂單創建和更新時間
            $table->text('shipping_address')->nullable();  // 送貨地址
            $table->string('payment_method', 50)->nullable();  // 付款方式

            // 如果 user_id 是外鍵，則您可以這樣設置外鍵約束
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
