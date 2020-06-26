<!DOCTYPE html>
<html>
<head>
    <title>Surat Perjanjian {{$penghuni->nama}} ({{$tgl}})</title>
    <!-- App css -->
    <link href= "{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link href= "{{ asset('css/style.css')}}" rel="stylesheet"> --}}
    {{-- <link href= "{{ asset('css/style-responsive.css')}}" rel="stylesheet"> --}}
</head>
<body>
	<style type="text/css">
    h5, .h5 {
			line-height: 2px;
		}
    </style>

<div class="row" id="print-area">
  <div class="col-md-12">
    <div class="card-box">
      <div class="panel-body">
        <center><h4>SURAT PERJANJIAN KONTRAK RUMAH “GREEN HOUSE CIPADUNG”</h4></center>
        <div class="row">
          <div class="col-md-12">
            <h5>Saya yang bertanda tangan di bawah ini :</h5>
            {{-- <div class="pull-left col-md-2">
              <h6>Nama</h6>
              <h6>Alamat</h6>
              <h6>No KTP</h6>
              <h6>No Tlp/HP</h6>
              <h6>Pekerjaan</h6>
            </div>
            <div class="col-md-10">
              <h6>&nbsp;:&nbsp;{{$penghuni->nama}}</h6>
              <h6>&nbsp;:&nbsp;{{$penghuni->alamatAsli}}</h6>
              <h6>&nbsp;:&nbsp;{{$penghuni->noKTP}}</h6>
              <h6>&nbsp;:&nbsp;{{$penghuni->noHP}}</h6>
              <h6>&nbsp;:&nbsp;{{$penghuni->pekerjaan}}</h6>
            </div> --}}
            <div class="pull-left col-md-12">
              <h6>Nama &emsp;&ensp;&ensp;: {{$penghuni->nama}}</span></h6>
              <h6>Alamat &emsp;&ensp;: {{$penghuni->alamatAsli}}</h6>
              <h6>No KTP &emsp;: {{$penghuni->noKTP}}</h6>
              <h6>No Tlp/Hp : {{$penghuni->noHP}}</h6>
              <h6>Pekerjaan : {{$penghuni->pekerjaan}}</h6>
            </div>
          </div><!-- end col -->
        </div>
        <!-- end row -->
        <h6>Dalam hal ini, selaku pengontrak  rumah  no .... pada alamat Jln Ds Cipadung RT 06 RW 12. Biaya Kontrak rumah sebesar <b>Rp {{ number_format($amount, 2, ",", ".") }}</b> akan dibayarkan secara tunai untuk masa (1bln/3bln/6bln/1 tahun) dan seterusnya sesuai pilihan.
          Saya sebagai pengontrak bersedia untuk mematuhi hal-hal dibawah ini:
        </h6>
        <div class="clearfix col-md-12">
          <h6>1.	Rumah yang dikontrak untuk kepentingan pribadi dan tidak dapat dialihkan kepada orang lain sebelum masa kontrak berakhir.</h6>
          <h6>2.	Rumah yang dikontrak tersebut sebagai rumah tinggal dan wajib serta taat mematuhi aturan adat istiadat setempat dan tidak melanggar hukum yang berlaku di Indonesia. Apabila di kemudian hari dipergunakan untuk hal-hal yang dapat menyalahi atau melanggar hukum menjadi tanggung jawab <b>pengontrak</b> secara pribadi, di luar tanggung jawab <b>pengelola</b> dan <b>pengontrak</b> dengan sadar diri dapat meninggalkan rumah yang dikontrak.</h6>
          <h6>3.	<b>Pengontrak</b> wajib mengisi formulir dengan lengkap dan memberikan <i>fotocopy</i> <b>kartu identitas</b> yang sah serta wajib menjaga keamanan di lingkungan kontrakan.</h6>
          <h6>4.	<b>Pengontrak</b> wajib memberikan uang jaminan fasilitas sebesar Rp 100.000 yang nantinya akan dikembalikan oleh <b>pengelola</b> saat tidak mengontrak lagi. (Kunci, Kran air, Slot pintu dll)</h6>
          <h6>5.	Pembayaran DP minimum Rp 100.000, berlaku selama satu minggu selebihnya hangus. Jika <b>pengontrak</b> akan masuk melebihi dari tanggal DP dan kondisi kamar masih kosong maka tanggal jatuh tempo yang berlaku adalah tanggal DP tersebut berakhir.</h6>
          <h6>6.	Parkir mobil dikenakan biaya tambahan Rp 100.000 untuk satu mobil, sedangkan motor <b>GRATIS</b> (Max 2 motor untuk tiap kamar) dan mendapatkan sticker “greenhouse cipadung”.</h6>
          <h6>7.	<b>Pengontrak</b> harap memarkir kendaraan pada tempatnya sehingga tidak mengganggu pengontrak lainnya.</h6>
          <h6>8.	<b>Pengontrak</b> berkewajiban untuk memelihara fasilitas – fasilitas yang ada dirumah dengan sebaik – baiknya dan bila terjadi kerusakan maka <b>pengontrak</b> wajib mengganti sesuai dengan kerusakan yang terjadi.</h6>
          <h6>9.	Menjaga kebersihan lingkungan dan tidak membuang sampah sembarangan, harus pada tempat yang telah disediakan oleh pengelola.</h6>
          <h6>10. Apabila perjanjian kontrak rumah ini berakhir, <b>pengontrak</b> harus mengembalikan kunci rumah kepada <b>pengelola</b> dan rumah dalam keadaan kosong serta terpelihara baik.</h6>
          <h6>11. <b>Pengelola</b> berhak mengosongkan rumah tersebut, apabila masa kontrak telah berakhir dan tidak ada Informasi kelanjutannya dari <b>pengontrak</b>.</h6>
          <h6>12. <b>Pengelola</b> tidak bertanggung jawab atas segala bentuk kehilangan barang-barang milik pribadi, semua merupakan tanggung jawab serta resiko dari <b>pengontrak</b>.</h6>
          <h6>13. Setiap unit kamar hanya untuk 2 (dua) orang dewasa, bila dipergunakan lebih maka ada biaya penambahan Rp. 100.000 (max 3 orang).</h6>
          <h6>14. Pada saat mengakhiri kontrakan, pulsa listrik harus terisi sama seperti pada saat masuk kontrakan.</h6>
          <h6>15. Bagi keluarga atau teman yang hendak menginap harus mendapatkan izin dari pengelola kontrakan serta wajib meninggalkan KTP/Identitas lainnya. Jika tanpa izin akan dikenakan biaya Rp 100.000 / orang/malam.</h6>
          <h6>16. Apabila ada ketidakcocokan antara data yang diberikan oleh <b>pengontrak</b>, maka pengelola berhak mengambil tindakan antara lain mengeluarkan <b>pengontrak</b> tanpa kompensasi apapun.</h6>
        </div>
        <h6>Demikian perjanjian ini dibuat untuk digunakan sebagai mana mestinya</h6>
        <div class="row">

            <div class="pull-right m-t-30">
              <h5>Bandung, {{ $tgl }}</h5>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="pull-left m-t-30">
              <h5 class="text-center">Pengelola Kontrakan</h5>
              <br><br><br>
              <h5 class="text-center">( . . . . . . . . . . . . . . . )</h5>
            </div>
            <div class="pull-right m-t-30">
              <h5 class="text-center">Pengontrak</h5>
              <br><br><br>
              <h5 class="text-center">( {{ $penghuni->nama }} )</h5>
            </div>
          </div><!-- end col -->
        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html>
