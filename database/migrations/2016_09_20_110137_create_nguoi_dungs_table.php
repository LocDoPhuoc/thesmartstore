<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoiDungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoi_dungs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level')->unsigned();
            $table->foreign('level')->references('id')->on('loai_nguoi_dungs')->onUpdate('cascade');
            $table->string('ten_tk');
            $table->string('mat_khau');
            $table->string('ho_ten');
            $table->string('email');
            $table->string('dia_chi');
            $table->rememberToken();
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
        Schema::dropIfExists('nguoi_dungs');
    }
}
