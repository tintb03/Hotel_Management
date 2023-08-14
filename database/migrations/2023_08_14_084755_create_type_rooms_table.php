<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('type_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->string('name_type');
            // ... Thêm các cột khác cần thiết

            $table->foreign('hotel_id')->references('id')->on('hotels');
            // Thêm liên kết với bảng hotels

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_rooms');
    }
}
