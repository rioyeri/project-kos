@extends('layout.dashboard')

@section('page')
    Lihat Kamar
@endsection

@section('name')
  Kos Ulfa
@endsection

@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Tabel Kamar</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
          <hr>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>NamaKamar</th>
                <th>Blok</th>
                <th>Lantai</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kamars as $kamar)
                <tr>
                  <td>{{ $kamar->id_kamar }}</td>
                  <td>{{ $kamar->namaKamar }}</td>
                  <td>{{ $kamar->blok_id }}</td>
                  <td>{{ $kamar->lantai_id }}</td>
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
