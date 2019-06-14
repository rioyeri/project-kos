@extends('layout.dashboard')

@section('page')
    Daftar Kamar
@endsection

@section('name')
  GreenHouse
@endsection

@section('kamar')
  active
@endsection

@section('content')
@php
  use App\Models\blok;
  use App\Models\lantai;
@endphp
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Daftar Data Kamar</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
          @if (session('alert'))
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Peringatan!</strong> {{ session('alert') }}
            </div>
          @elseif (session('info'))
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Info!</strong> {{ session('info') }}
            </div>
          @elseif (session('success'))
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Berhasil!</strong> {{ session('success') }}
            </div>
          @endif
          <hr>
          <table class="table">
            <thead>
              <tr>
                <th class="centered" width="10%">#</th>
                <th class="centered" width="30%">NamaKamar</th>
                <th class="centered" width="20%">Blok</th>
                <th class="centered" width="20%">Lantai</th>
                <th class="centered" width="20%"></th>
              </tr>
            </thead>
            <tbody>
              @php ($i=0)
              @foreach ($kamars as $kamar)
                <tr>
                  @php ($i++)
                  <td class="centered">{{ $i }}</td>
                  <td class="centered">{{ $kamar->namaKamar }}</td>
                  <td class="centered">{{ blok::where('id_blok', $kamar->blok_id)->first()->namaBlok }}</td>
                  <td class="centered">{{ lantai::where('id_lantai', $kamar->lantai_id)->first()->namaLantai }}</td>
                  <td>
                      <a href="/editkamar/{{ $kamar->id_kamar}}"><button class="btn btn-primary btn-block btn-sm"><i class="fa fa-pencil"> Update</i></button></a>
                    <form class="" action="/hapuskamar/{{ $kamar->id_kamar }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-block btn-sm"><i class="fa fa-trash-o "> Hapus</i></button></a>
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
