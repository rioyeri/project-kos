<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->increments('id_kamar');
            $table->unsignedInteger('blok_id');
            $table->foreign('blok_id')->references('id_blok')->on('blok');
            $table->unsignedInteger('lantai_id');
            $table->foreign('lantai_id')->references('id_lantai')->on('lantai');
            $table->string('namaKamar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamar');
    }
}
