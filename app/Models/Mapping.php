<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapping extends Model
{
  protected $table = 'mappingkamar';
  protected $primaryKey = 'id_mapping';
  protected $fillable = [
    'id_mapping', 'id_penghuni','id_kamar'
  ];
  public $timestamps = true;
}
