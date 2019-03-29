<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';
    protected $primarykey = 'id_kamar';
    protected $fillable = [
      'namaKamar', 'lantai_id'. 'blok_id'
    ];
    public $timestamps = false;
}
