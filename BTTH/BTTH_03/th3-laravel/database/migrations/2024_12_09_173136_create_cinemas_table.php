<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id(); // Mã rạp chiếu, tự tăng
            $table->string('name'); // Tên rạp chiếu
            $table->string('location'); // Địa chỉ
            $table->integer('total_seats'); // Tổng số ghế ngồi
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    public function down()
    {
        Schema::dropIfExists('cinemas');
    }
};
