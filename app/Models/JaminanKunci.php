<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JaminanKunci extends Model
{
  protected $table = 'jaminankunci';
  protected $primaryKey = 'id_jaminankunci';
  protected $fillable = [
    'id_jaminankunci', 'penghuni_id','jaminan'
  ];
  public $timestamps = true;
}
