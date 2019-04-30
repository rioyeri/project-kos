@extends('layout.dashboard')

@section('page')
    Lihat Kamar
@endsection

@section('name')
  Kos Ulfa
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
              @php ($i=0)
              @foreach ($kamars as $kamar)
                <tr>
                  @php ($i++)
                  <td>{{ $i }}</td>
                  <td>{{ $kamar->namaKamar }}</td>
                  <td>{{ blok::where('id_blok', $kamar->blok_id)->first()->namaBlok }}</td>
                  <td>{{ lantai::where('id_lantai', $kamar->lantai_id)->first()->namaLantai }}</td>
                  <td>
                      <a href="/editkamar/{{ $kamar->id_kamar}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                    <form class="" action="/hapuskamar/{{ $kamar->id_kamar }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
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
