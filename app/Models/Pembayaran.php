<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
  protected $table = 'pembayaran';
  protected $primaryKey = 'id_pembayaran';
  protected $fillable = [
    'id_pembayaran', 'penghuni_id', 'jumlahBayar', 'tglPembayaran', 'lamaKontrak', 'buktiBayar'
  ];
  public $timestamps = true;
}
