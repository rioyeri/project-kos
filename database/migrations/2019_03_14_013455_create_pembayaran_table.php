<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id_pembayaran');
            $table->unsignedInteger('kamar_id');
            $table->foreign('kamar_id')->references('id_kamar')->on('kamar');
            $table->unsignedInteger('penghuni_id');
            $table->foreign('penghuni_id')->references('id_penghuni')->on('penghuni');
            $table->bigInteger('jumlahBayar');
            $table->date('tglPembayaran');
            $table->date('tglMasuk');
            $table->date('tglKeluar');
            $table->string('buktiBayar');
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
        Schema::dropIfExists('pembayaran');
    }
}
