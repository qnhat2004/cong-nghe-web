<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('renters', function (Blueprint $table) {
            $table->id(); // Mã người thuê, tự tăng
            $table->string('name'); // Tên người thuê
            $table->string('phone_number'); // Số điện thoại
            $table->string('email')->unique(); // Email, duy nhất
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    public function down()
    {
        Schema::dropIfExists('renters');
    }
};
