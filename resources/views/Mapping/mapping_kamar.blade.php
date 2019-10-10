@extends('layout.dashboard')

@section('css')
  <link href="{{ asset('lib/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/gritter/css/jquery.gritter.css')}}" />
  <link href="{{ asset('lib/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('page')
    Tambahkan Mapping
@endsection

@section('name')
  GreenHouse
@endsection

@section('mapping')
  active
@endsection

@section('content')
@php
  use App\Models\Penghuni;
  use App\Models\Kamar;
  use App\Models\Mapping;
  use App\Models\blok;
  use App\Models\lantai;
@endphp

<!--main content start-->

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Mapping Penghuni <-> Kamar</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
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
            <p class="text-muted col-md-2 font-14 m-b-30">
              <a href="/mapping/tambah" class="btn btn-theme waves-effect waves-light m-b-5">Tambah Mapping</a>
            </p>
          </div>
          <table id="datatable" class="table table-primary">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Penghuni</th>
                <th>Kamar</th>
                <th>Tanggal Masuk</th>
                <th>Jatuh Tempo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @php
                $i=0;
              @endphp
              @foreach ($mappings as $mapping)
                <tr>
                  @php
                    $i++;
                    $kamar = Kamar::where('id_kamar', $mapping->id_kamar)->select('blok_id', 'lantai_id', 'namaKamar')->first();
                    $blok = blok::where('id_blok', $kamar['blok_id'])->first()->namaBlok;
                    $lantai = lantai::where('id_lantai', $kamar['lantai_id'])->first()->namaLantai;
                    $namaKamar = $blok." ".$kamar['namaKamar']." (lantai ".$lantai.")";
                  @endphp
                  <td>{{ $i }}</td>
                  <td>{{ Penghuni::where('id_penghuni', $mapping->id_penghuni)->first()->nama }}</td>
                  <td>{{ $namaKamar }}</td>
                  <td>{{ $mapping->tglMasuk }}</td>
                  <td>{{ $mapping->tglKeluar }}</td>
                  <td>
                    <a href="/mapping/edit/{{ $mapping->id_mapping}}"><button class="btn btn-primary btn-block btn-sm"><i class="fa fa-pencil"> Perpanjang Kontrak</i></button></a>
                    <form class="" action="/mapping/hapus/{{ $mapping->id_mapping }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit" class="btn btn-danger btn-block btn-sm"><i class="fa fa-trash-o "> Deactive</i></button>
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
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
@endsection

@section('js')
  <script src="{{ asset('lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{ asset('lib/advanced-form-components.js')}}"></script>
  <script src="{{ asset('lib/number-divider.min.js') }}"></script>
  <script src="{{ asset('lib/select2/js/select2.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript" src="{{ asset('lib/gritter/js/jquery.gritter.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/gritter-conf.js')}}"></script>
  <script src="{{ asset('lib/datatables/jquery.dataTables.min.js')}}"></script>
@endsection

@section('script-js')
  <script type="text/javascript">
    $(document).ready(function () {
    $('#number').divide();
    $('#datatable').DataTable();
    $('.select2').select2();

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
    function changeKamar(id){
      $.ajax({
        url       :   "{{ route('ajaxGetKamar')}}",
        data      : {
                      id_peng : id,
                    },

        type		  :	"GET",
        success		:	function(data){
                    $("#kamar_id").select2("val", data);
                    // $('#responsive-datatable').DataTable();
                  }
      });
    }
  </script>

@endsection
