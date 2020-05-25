<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
  protected $table = 'galeri';
  protected $primaryKey = 'id';
  protected $fillable = [
    'title', 'image', 'description'
  ];
  public $timestamps = true;
}
