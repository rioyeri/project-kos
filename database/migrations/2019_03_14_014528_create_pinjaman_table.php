<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->increments('id_pinjaman');
            $table->string('namaPeminjam');
            $table->bigInteger('jumlah');
            $table->date('tglPinjam');
            $table->string('keterangan');
            $table->bigInteger('jmlKembali');
            $table->date('tglKembali');
            $table->string('statusPinjaman');
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
        Schema::dropIfExists('pinjaman');
    }
}
