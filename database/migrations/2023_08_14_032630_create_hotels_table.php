<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hoteler_id')->constrained('hotelers');
            $table->string('Name_Hotel');
            $table->string('detailed_address'); // Thêm trường detailed_address
            $table->integer('Number_of_rooms');
            $table->integer('Number_of_floors');
            // ... Các cột khác
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
