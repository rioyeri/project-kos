@extends('layout.dashboard')

@section('page')
    Dashboard
@endsection

@section('name')
  GreenHouse
@endsection

@section('dash')
  active
@endsection

@section('css')
  <link href="{{ asset('lib/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet" />
@endsection

@section('content')
@php
  use App\Models\Penghuni;
  use App\Models\Kamar;
  use App\Models\Mapping;
@endphp
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Dashboard</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i>Yang Belum Membayar Uang Kos pada bulan {{ $namabulan }} {{ $tahun }}</h4>
          <hr>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kamar</th>
                <th>Status Pembayaran</th>
              </tr>
            </thead>
            <tbody>
              @php ($i = 0)
              @foreach ($jatuhtempos as $jatuhtempo)
                <tr>
                  @php ($i++)
                  <td>{{ $i }}</td>
                  <td>{{ Penghuni::where('id_penghuni', $jatuhtempo->id_penghuni)->first()->nama }}</td>
                  @php($idkamar = Mapping::where('id_penghuni', $jatuhtempo->id_penghuni)->first()->id_kamar)
                  <td>{{ Kamar::where('id_kamar', $idkamar)->first()->namaKamar }}</td>
                  <td>Belum Membayar</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <section class="panel">
    <div class="panel-body">
      <div id="calendar" class="has-toolbar"></div>
    </div>
  </section>
</section>

<!-- /MAIN CONTENT -->
<!--main content end-->
@endsection

@section('js')
  <script src="{{ asset('lib/fullcalendar/fullcalendar.min.js')}}"></script>
@endsection
