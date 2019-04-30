<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
  protected $table = 'pinjaman';
  protected $primaryKey = 'id_pinjaman';
  protected $fillable = [
    'id_pinjaman', 'namaPeminjam', 'jumlah', 'tglPinjam', 'keterangan', 'jmlKembali', 'tglKembali', 'statusPinjaman'
  ];
  public $timestamps = true;
}
