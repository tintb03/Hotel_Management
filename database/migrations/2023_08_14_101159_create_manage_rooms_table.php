<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('manage_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_code');
            $table->string('room_number');
            $table->integer('floor');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('hotel_id');
            $table->timestamps();
            $table->foreign('hotel_id')->references('id')->on('hotels');
        });
    }

    public function down()
    {
        Schema::dropIfExists('manage_rooms');
    }
}
