<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousePhotosTable extends Migration
{

    public function up()
    {

        Schema::create('house_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('house_id')->constrained();
            $table->string('photo_path');
            $table->boolean('is_cover')->default(false);
            $table->integer('width')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('house_photos');
    }
}
