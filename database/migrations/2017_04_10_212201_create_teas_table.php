<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('teas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->integer('temperature')->unsigned();
            $table->integer('time')->unsigned();
            $table->integer('caffeine')->unsigned();
            $table->timestamps();
            $table->integer('drinkable_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('teas');
    }
}
