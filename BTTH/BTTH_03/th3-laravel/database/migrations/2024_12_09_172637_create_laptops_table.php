<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id(); // Mã laptop, tự tăng
            $table->string('brand'); // Hãng sản xuất
            $table->string('model'); // Mẫu laptop
            $table->string('specifications'); // Thông số kỹ thuật
            $table->boolean('rental_status')->default(false); // Trạng thái cho thuê
            $table->foreignId('renter_id')->nullable() // Khóa ngoại, có thể null
                  ->constrained('renters') // Tham chiếu đến bảng renters
                  ->onDelete('set null'); // Set null khi người thuê bị xóa
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    public function down()
    {
        Schema::dropIfExists('laptops');
    }
};
