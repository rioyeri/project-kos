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
  <link href="{{ asset('lib/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/DT_bootstrap.css')}}" rel="stylesheet"/>
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
          <table class="table" id="datatable">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kamar</th>
                <th>Status Pembayaran</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 0;
              @endphp
              @foreach ($jatuhtempos as $jatuhtempo)
                <tr>
                  @php
                    $i++;
                    $mapping = Mapping::where('id_penghuni', $jatuhtempo->id_penghuni)->first();
                    $kamar = Kamar::join('blok', 'kamar.blok_id', '=', 'blok.id_blok')->join('lantai', 'kamar.lantai_id', '=', 'lantai.id_lantai')->where('id_kamar', $mapping['id_kamar'])->select('blok.namaBlok', 'lantai.namaLantai','kamar.namaKamar')->first();
                    $namaKamar = $kamar['namaBlok']." ".$kamar['namaKamar']." (lantai ".$kamar['namaLantai'].")";
                  @endphp
                  <td>{{ $i }}</td>
                  <td>{{ Penghuni::where('id_penghuni', $jatuhtempo->id_penghuni)->first()->nama }}</td>
                  <td>{{ $namaKamar }}</td>
                  <td>Belum Membayar</td>
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
  <script type="text/javascript" language="javascript" src="{{ asset('lib/advanced-datatable/js/jquery.js')}}"></script>
  <script type="text/javascript" language="javascript" src="{{ asset('lib/advanced-datatable/js/jquery.dataTables.js')}}"></script>
  <script type="text/javascript" src="{{asset('lib/advanced-datatable/js/DT_bootstrap.js')}}"></script>
  <script src="{{ asset('lib/fullcalendar/fullcalendar.min.js')}}"></script>
@endsection

@section('script-js')
<script type="text/javascript">
  $(document).ready(function () {

      // Default Datatable
      $('#datatable').DataTable();

      //Buttons examples
      var table = $('#datatable-buttons').DataTable({
          lengthChange: false,
          buttons: ['copy', 'excel', 'pdf']
      });

      // Key Tables

      $('#key-table').DataTable({
          keys: true
      });

      table.buttons().container()
          .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
  });

</script>
@endsection
