<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';
    protected $primaryKey = 'id_kamar';
    protected $fillable = [
      'namaKamar', 'lantai_id'. 'blok_id'
    ];
    public $timestamps = true;
}
