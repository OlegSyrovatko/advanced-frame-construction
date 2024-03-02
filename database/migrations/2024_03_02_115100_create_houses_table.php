<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{

    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('area')->default(0);
            $table->unsignedInteger('price')->default(0);
            $table->text('works');
            $table->text('other_works');
            $table->timestamps();
        });
/*
        Schema::create('house_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('house_id')->constrained();
            $table->string('photo_path');
            $table->boolean('is_cover')->default(false);
            $table->timestamps();
        });
*/
    }


    public function down()
    {
       // Schema::dropIfExists('house_photos');
        Schema::dropIfExists('houses');
    }
}
