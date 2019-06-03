@extends('layout.dashboard')

@section('page')
    Dashboard
@endsection

@section('name')
  GreenHouse
@endsection

@section('Dashboard')
  active
@endsection

@section('css')
  <link href="{{ asset('lib/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet" />
@endsection

@section('content')
@php
  use App\Models\Penghuni;
  use App\Models\Kamar;
@endphp
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Dashboard</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
          <hr>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kamar</th>
                <th>Tanggal Jatuh Tempo</th>
              </tr>
            </thead>
            <tbody>
              @php ($i = 0)
              @foreach ($jatuhtempos as $jatuhtempo)
                <tr>
                  @php ($i++)
                  <td>{{ $i }}</td>
                  <td>{{ Penghuni::where('id_penghuni', $jatuhtempo->penghuni_id)->first()->nama }}</td>
                  <td>{{ Kamar::where('id_kamar', $jatuhtempo->kamar_id)->first()->namaKamar }}</td>
                  <td>{{ $jatuhtempo->tglKeluar }}</td>
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
