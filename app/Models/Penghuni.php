<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
  protected $table = 'penghuni';
  protected $primaryKey = 'id_penghuni';
  protected $fillable = [
    'id_penghuni', 'noKTP', 'nama', 'jenisKelamin', 'tempatLahir', 'tanggalLahir', 'noHP', 'pekerjaan', 'alamatAsli'
  ];
  public $timestamps = true;
}
