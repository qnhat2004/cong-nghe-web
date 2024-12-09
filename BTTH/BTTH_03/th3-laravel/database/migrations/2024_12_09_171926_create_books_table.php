<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Mã sách, tự tăng
            $table->string('title'); // Tên sách
            $table->string('author'); // Tác giả
            $table->year('publication_year'); // Năm xuất bản
            $table->string('genre'); // Thể loại
            $table->foreignId('library_id') // Khóa ngoại
                  ->constrained('libraries') // Tham chiếu đến bảng libraries
                  ->onDelete('cascade'); // Xóa sách khi thư viện bị xóa
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};
