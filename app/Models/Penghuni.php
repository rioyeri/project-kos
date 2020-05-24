<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\dokumenPenghuni;

class Penghuni extends Model
{
  protected $table = 'penghuni';
  protected $primaryKey = 'id_penghuni';
  protected $fillable = [
    'id_penghuni', 'noKTP', 'nama', 'jenisKelamin', 'tempatLahir', 'tanggalLahir', 'noHP', 'pekerjaan', 'alamatAsli'
  ];
  public $timestamps = true;

  public static function getData(){
    $penghuni = Penghuni::where('status', 1)->get();
    $result = array();
    $i=1;

    foreach($penghuni as $m){
      $dokumen = "";
      $berkas = dokumenPenghuni::where('id_penghuni', $m->id_penghuni)->get();
      foreach($berkas as $b){
        $dokumen .= $b->jenis.", ";
      }

      $data = array(
        'No'           => $i++,
        'No Identitas' => $m->noKTP,
        'Nama'         => $m->nama,
        'Jenis Kelamin'=> $m->jenisKelamin,
        'Nomor HP'     => $m->noHP,
        'Alamat'       => $m->alamatAsli,
        'Dokumen'      => $dokumen
      );
      array_push($result, $data);
    }

    return $result;
  }
}
