<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayarandet extends Model
{
  protected $table = 'pembayarandet';
  protected $primaryKey = 'id';
  protected $fillable = [
    'id_pembayaran','id_penghuni', 'tahun', 'bulan', 'status'
  ];
  public $timestamps = false;
}
