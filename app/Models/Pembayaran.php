<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
  protected $table = 'pembayaran';
  protected $primaryKey = 'id_pembayaran';
  protected $fillable = [
    'id_pembayaran', 'kamar_id', 'penghuni_id', 'jumlahBayar', 'tglPembayaran', 'tglMasuk', 'tglKeluar', 'buktiBayar'
  ];
  public $timestamps = true;
}
