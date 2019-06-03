<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
  protected $table = 'pemasukan';
  protected $primaryKey = 'id_pemasukan';
  protected $fillable = [
    'id_pemasukan', 'namaSumber', 'jumlah', 'tanggal', 'keterangan'
  ];
  public $timestamps = true;
}
