<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenghuniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghuni', function (Blueprint $table) {
            $table->increments('id_penghuni');
            $table->string('noKTP')->unique();
            $table->string('nama');
            $table->string('jenisKelamin');
            $table->string('tempatLahir');
            $table->date('tanggalLahir');
            $table->string('pekerjaan');
            $table->string('alamatAsli');
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
        Schema::dropIfExists('users');
    }
}
