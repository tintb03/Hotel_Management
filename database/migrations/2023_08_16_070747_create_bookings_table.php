<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('orderer');
            $table->string('phone_number');
            $table->string('email');
            $table->unsignedBigInteger('room_id');
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('manage_rooms'); // Đảm bảo rằng tên bảng và trường khớp với tên bảng và trường thực tế trong cơ sở dữ liệu
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
