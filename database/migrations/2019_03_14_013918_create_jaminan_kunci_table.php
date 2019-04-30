<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJaminanKunciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaminanKunci', function (Blueprint $table) {
            $table->increments('id_jaminankunci');
            $table->unsignedInteger('penghuni_id');
            $table->foreign('penghuni_id')->references('id_penghuni')->on('penghuni');
            $table->string('jaminan');
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
        Schema::dropIfExists('jaminanKunci');
    }
}
