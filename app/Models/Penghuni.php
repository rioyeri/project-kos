<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\dokumenPenghuni;
use App\Models\Mapping;
use App\Models\Pembayarandet;

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

      $mapping = Mapping::join('kamar', 'mappingkamar.id_kamar', 'kamar.id_kamar')->join('blok', 'kamar.blok_id', 'blok.id_blok')->join('lantai', 'kamar.lantai_id', 'lantai.id_lantai')->where('mappingkamar.id_penghuni', $m->id_penghuni)->select('kamar.namaKamar', 'lantai.namaLantai', 'blok.namaBlok', 'mappingkamar.id_mapping')->orderBy('mappingkamar.created_at', 'desc')->first();
      if($mapping){
        $kamar = $mapping['namaKamar']."(Blok ".$mapping['namaBlok']." - Lantai ".$mapping['namaLantai'].")";
        $pembdet = PembayaranDet::where('id_mapping', $mapping['id_mapping'])->where('status', 0)->first();
        if($pembdet == null){
          $detail = PembayaranDet::where('id_mapping', $mapping['id_mapping'])->orderBy('created_at', 'desc')->first();
          $jatuhtempo = $detail->tanggal."-".str_pad($detail->bulan, 2, "0", STR_PAD_LEFT)."-".$detail->tahun;
          $status = "Selesai dibayar";
        }else{
          $jatuhtempo = $pembdet->tanggal."-".str_pad($pembdet->bulan, 2, "0", STR_PAD_LEFT)."-".$pembdet->tahun;
          $status = "Belum dibayar";
        }

      }else{
        $kamar = "Tidak terdaftar";
        $jatuhtempo = "Tidak terdaftar";
        $status = "Tidak Aktif";
      }

      // echo $jatuhtempo;
      $data = array(
        'No'           => $i++,
        'No Identitas' => $m->noKTP,
        'Nama'         => $m->nama,
        'Jenis Kelamin'=> $m->jenisKelamin,
        'Nomor HP'     => $m->noHP,
        'Alamat'       => $m->alamatAsli,
        'Dokumen'      => $dokumen,
        'Kamar'        => $kamar,
        'Jatuh Tempo'  => $jatuhtempo,
        'Status Pembayaran' => $status,

      );
      array_push($result, $data);
    }
    // echo "<pre>";
    // print_r($result);
    // die();

    return $result;
  }
}
