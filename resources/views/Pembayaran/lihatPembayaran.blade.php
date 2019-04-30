@extends('layout.dashboard')

@section('page')
    Lihat Pembayaran
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
    <h3><i class="fa fa-angle-right"></i>Tabel Data Pembayaran</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
          <hr>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Kamar</th>
                <th>Nama Penghuni</th>
                <th>Jumlah Bayar (Rp)</th>
                <th>Tanggal Pembayaran</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Bukti Pembayaran</th>
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
                    <a href="/editpembayaran/{{ $pembayaran->id_pembayaran}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                    <form class="" action="/hapuspembayaran/{{ $pembayaran->id_pembayaran }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
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
