<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dokumenPenghuni extends Model
{
  protected $table = 'dokumenpenghuni';
  protected $primaryKey = 'id';
  protected $fillable = [
    'id_penghuni', 'jenis', 'dokumen'
  ];
  public $timestamps = true;
}
