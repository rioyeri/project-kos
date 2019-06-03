@extends('layout.dashboard')

@section('css')
  <link href="{{ asset('lib/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/gritter/css/jquery.gritter.css')}}" />
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
@endphp

<!--main content start-->

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Mapping Penghuni <-> Kamar</h3>
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
    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class="form">
            <form class="cmxform form-row style-form" enctype="multipart/form-data" id="commentForm" method="post" action="/mapping/tambah">
              {{ csrf_field() }}
              <div class="form-group col-lg-6">
                <label for="id_penghuni" class="control-label col-lg-3">Pilih Penghuni</label>
                <div class="col-lg-12">
                  <select name="penghuni_id" class="form-control select2" parsley-trigger="change" onchange="changeKamar(this.value)">
                    <option disabled selected>--  Pilih  --</option>
                    @foreach ($penghunis as $penghuni)
                      <option value="{{ $penghuni->id_penghuni }}"> {{ $penghuni->nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group col-lg-6">
                  <label for="id_kamar" class="control-label col-lg-3">Pilih Kamar</label>
                  <div class="col-lg-12">
                    <select name="kamar_id" class="form-control select2" id="kamar_id">
                      <option disabled selected>--  Pilih  --</option>
                      @foreach ($kamars as $kamar)
                          <option value="{{ $kamar->id_kamar }}"> {{ $kamar->namaKamar }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              <div class="form-group">
                <div class="col-lg-offset-12 pull-right">
                  <button class="btn btn-theme" type="submit">Tambahkan</button>
                </div>
              </div>
            </form>
            <table class="table table-primary">
              <hr>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Penghuni</th>
                  <th>Kamar</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @php ($i=0)
                @foreach ($mappings as $mapping)
                <tr>
                  @php ($i++)
                  <td>{{ $i }}</td>
                  <td>{{ Penghuni::where('id_penghuni', $mapping->id_penghuni)->first()->nama }}</td>
                  <td>{{ Kamar::where('id_kamar', $mapping->id_kamar)->first()->namaKamar }}</td>
                  <td>
                    <form class="" action="/mapping/hapus/{{ $mapping->id_mapping }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "> Deactive</i></button></a>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
        <!-- /form-panel -->
      </div>
      <!-- /col-lg-12 -->
    </div>
    </form>
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
@endsection

@section('script-js')
  <script>
    $("#number").divide();
    $(".select2").select2();
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
