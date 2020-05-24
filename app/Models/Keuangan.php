<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Pembayarandet;

class Keuangan extends Model
{
  protected $table = 'keuangan';
  protected $primaryKey = 'id_keuangan';
  protected $fillable = [
    'id_keuangan', 'trx_jenis', 'trx_id', 'saldo'
  ];
  public $timestamps = true;

  public static function getKeuangan($sort){
    $pemasukan = Pemasukan::all();
    $pengeluaran = Pengeluaran::all();
    $pembayaran = Pembayaran::all();
    $result = array();

    foreach($pemasukan as $m){
      $tgl = $m->tanggal;
      $nama = $m->namaSumber;
      $uraian = $m->keterangan." (".$nama.")";
      $masuk = $m->jumlah;
      $keluar = "";

      $data = array(
        'Tanggal'     => $tgl,
        'Uraian'      => $uraian,
        'Pemasukan'   => $masuk,
        'Pengeluaran' => $keluar,
      );
      array_push($result, $data);
    }

    foreach($pengeluaran as $k){
      $tgl = $k->tanggal;
      $nama = $k->namaPJ;
      $uraian = $k->keterangan." (".$nama.")";
      $masuk = "";
      $keluar = $k->jumlah;

      $data = array(
        'Tanggal'     => $tgl,
        'Uraian'      => $uraian,
        'Pemasukan'   => $masuk,
        'Pengeluaran' => $keluar,
      );
      array_push($result, $data);
    }

    foreach($pembayaran as $bayar){
      $penghuni = Penghuni::where('id_penghuni', $bayar->penghuni_id)->first()->nama;
      $tgl = $bayar->tglPembayaran;
      $nama = $penghuni;
      $det = Pembayarandet::where('id_pembayaran', $bayar->id_pembayaran)->where('status', 1)->select('bulan')->get();
      if($det->count()>1){
        $bulan1 = date("F", mktime(null, null, null, $det[0]['bulan']));
        $bulan2 = date("F", mktime(null, null, null, $det[$det->count()-1]['bulan']));
        $bayarbulan = $bulan1."-".$bulan2;
      }else{
        $bayarbulan = date("F", mktime(null, null, null, $det[0]['bulan']));
      }
      $uraian = "[".$bayar->metode."] Pembayaran Kos bulan ".$bayarbulan." (".$nama.")";
      $masuk = $bayar->jumlahBayar;
      $keluar = "";

      $data = array(
        'Tanggal'     => $tgl,
        'Uraian'      => $uraian,
        'Pemasukan'   => $masuk,
        'Pengeluaran' => $keluar,
      );
      array_push($result, $data);
    }

    $date = array();
    foreach ($result as $key => $row){
        $date[$key] = $row['Tanggal'];
    }

    if($sort == "asc"){
      array_multisort($date, SORT_ASC, $result);
    }else{
      array_multisort($date, SORT_DESC, $result);
    }

    return $result;
  }
}
