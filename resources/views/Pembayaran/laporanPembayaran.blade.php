@extends('layout.dashboard')

@section('page')
    Daftar Pembayaran
@endsection

@section('name')
  GreenHouse
@endsection

@section('pembayaran')
  active
@endsection

@section('content')
@php
  use App\Models\Kamar;
  use App\Models\Penghuni;
@endphp
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Daftar Data Pembayaran</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="/laporanpembayaran">
          {{ csrf_field() }}
          {{ method_field('put') }}
          <div class="form-group">
            <label class="control-label col-sm-1">Date Range</label>
              <div class="col-md-4">
                <div class="input-group input-large" data-date="2019/05/01" data-date-format="Y-m-d">
                  <input type="text" class="form-control dpd1" name="from">
                  <span class="input-group-addon">To</span>
                  <input type="text" class="form-control dpd2" name="to">
                </div>
              </div>
              <button class="btn btn-theme" type="submit">Sortir</button>
          </div>



          </form>
          <table class="table">
            <thead>
              <tr>
                <th width="10%">#</th>
                <th width="10%">Kamar</th>
                <th width="20%">Nama Penghuni</th>
                <th width="20%">Jumlah Bayar (Rp)</th>
                <th width="10%" class="centered">Tanggal Pembayaran</th>
                <th width="10%" class="centered">Tanggal Masuk</th>
                <th width="10%" class="centered">Tanggal Keluar</th>
                <th width="10%" class="centered">Bukti Pembayaran</th>
              </tr>
            </thead>
            <tbody>
              @php ($i=0)
              @foreach ($pembayarans as $pembayaran)
                <tr>
                  @php ($i++)
                  <td>{{ $i }}</td>
                  <td>{{ Kamar::where('id_kamar', $pembayaran->kamar_id)->first()->namaKamar}}</td>
                  <td>{{ Penghuni::where('id_penghuni', $pembayaran->penghuni_id)->first()->nama}}</td>
                  <td>{{ $pembayaran->jumlahBayar }}</td>
                  <td>{{ $pembayaran->tglPembayaran }}</td>
                  <td>{{ $pembayaran->tglMasuk }}</td>
                  <td>{{ $pembayaran->tglKeluar }}</td>
                  <td><a href="storage/{{ $pembayaran->buktiBayar}}">{{ $pembayaran->buktiBayar }}</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</section>

<!-- /MAIN CONTENT -->
<!--main content end-->
@endsection

@section('js')
  <script src="{{ asset('lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/bootstrap-daterangepicker/date.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
  <script src="{{ asset('lib/advanced-form-components.js')}}"></script>
  <script src="{{ asset('lib/number-divider.min.js') }}"></script>
  <script>
    $("#number").divide();
  </script>
@endsection

