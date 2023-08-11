<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hoteler_id');
            $table->foreign('hoteler_id')->references('id')->on('hotelers')->onDelete('cascade');
            $table->string('room_code')->nullable();
            $table->string('room_number');
            $table->string('kind_of_room');
            $table->string('floor');
            $table->string('detailed_address');
            $table->text('description');
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}

