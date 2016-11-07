<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaLapTopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gia_lap_tops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lt')->unsigned();
            $table->foreign('id_lt')->references('id')->on('laptops')->onUpdate('cascade');
            $table->integer('gia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gia_lap_tops');
    }
}
