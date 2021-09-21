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
            $table->string('nombre',50);
            $table->string('ciudad', 50);
            $table->tinyInteger('estrellas');
            $table->string('telefono', 14);

            $table->primary('id');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
