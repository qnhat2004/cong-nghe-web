<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->id(); // Mã thiết bị, tự tăng
            $table->string('device_name'); // Tên thiết bị
            $table->string('type'); // Loại thiết bị
            $table->boolean('status')->default(true); // Trạng thái hoạt động
            $table->foreignId('center_id') // Khóa ngoại
                  ->constrained('it_centers') // Tham chiếu đến bảng it_centers
                  ->onDelete('cascade'); // Xóa thiết bị nếu trung tâm bị xóa
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    public function down()
    {
        Schema::dropIfExists('hardware_devices');
    }
};
