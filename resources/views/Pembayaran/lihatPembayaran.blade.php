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
      @if (session('alert'))
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Warning!</strong> {{ session('alert') }}
        </div>
      @elseif (session('info'))
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Berhasil!</strong> {{ session('info') }}
        </div>
      @elseif (session('success'))
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Berhasil!</strong> {{ session('success') }}
        </div>
      @endif
      <div class="col-md-12">
        <div class="content-panel">
          <hr>
          <table class="table">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th width="10%">Kamar</th>
                <th width="20%">Nama Penghuni</th>
                <th width="20%">Jumlah Bayar (Rp)</th>
                <th width="10%" class="centered">Tanggal Pembayaran</th>
                <th width="10%" class="centered">Tanggal Masuk</th>
                <th width="10%" class="centered">Tanggal Keluar</th>
                <th width="15%" class="centered">Bukti Pembayaran</th>
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
                  <td>
                    <a href="/editpembayaran/{{ $pembayaran->id_pembayaran}}"><button class="btn btn-primary btn-block btn-xs"><i class="fa fa-pencil"> Update</i></button></a>
                    <form class="" action="/hapuspembayaran/{{ $pembayaran->id_pembayaran }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-block btn-xs"><i class="fa fa-trash-o "> Hapus</i></button></a>
                    </form>
                  </td>
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
