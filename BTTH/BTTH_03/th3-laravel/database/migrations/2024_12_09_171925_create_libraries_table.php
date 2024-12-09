<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->id(); // Mã thư viện, tự tăng
            $table->string('name'); // Tên thư viện
            $table->string('address'); // Địa chỉ thư viện
            $table->string('contact_number'); // Số điện thoại liên hệ
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    public function down()
    {
        Schema::dropIfExists('libraries');
    }
};
