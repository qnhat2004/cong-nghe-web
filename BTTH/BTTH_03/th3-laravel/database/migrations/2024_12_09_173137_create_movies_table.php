<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); // Mã phim, tự tăng
            $table->string('title'); // Tên phim
            $table->string('director'); // Đạo diễn
            $table->date('release_date'); // Ngày phát hành
            $table->integer('duration'); // Thời lượng phim (phút)
            $table->foreignId('cinema_id') // Khóa ngoại tham chiếu cinemas.id
                  ->constrained('cinemas')
                  ->onDelete('cascade'); // Xóa phim nếu rạp bị xóa
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
