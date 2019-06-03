<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
  protected $table = 'pengeluaran';
  protected $primaryKey = 'id_pengeluaran';
  protected $fillable = [
    'id_pengeluaran', 'namaPJ', 'jumlah', 'tanggal', 'keterangan'
  ];
  public $timestamps = true;
}
