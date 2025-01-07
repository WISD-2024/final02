<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id'); // 假設 user_id 位於 id 之後
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // 這是外鍵約束（假設您有 users 資料表）
        });
    }
    
    public function down()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
