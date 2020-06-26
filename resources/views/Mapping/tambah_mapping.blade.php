@extends('layout.dashboard')

@section('css')
  <link href="{{ asset('lib/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

  <!--datepicker-->
  <link href="{{ asset('lib/bootstrap-datepicker/css/datepicker.css') }}" rel="stylesheet">
@endsection

@section('page')
    Tambah Mapping Kamar
@endsection

@section('mapping')
  active
@endsection

@section('name')
  GreenHouse
@endsection

@section('content')
<!--main content start-->
@php
    use App\Models\blok;
    use App\Models\lantai;
@endphp
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Tambahkan Data Mapping</h3>
    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class=" form">
            <form class="cmxform form-horizontal style-form" enctype="multipart/form-data" id="commentForm" method="post" action="/mapping/tambah">
              {{ csrf_field() }}
              <div class="form-group ">
                <label for="id_penghuni" class="control-label col-lg-2">Pilih Penghuni</label>
                <div class="col-lg-10">
                  <select name="penghuni_id" class="form-control select2" parsley-trigger="change">
                    <option disabled selected>-- Pilih Nama Penghuni --</option>
                    @foreach ($penghunis as $penghuni)
                      <option value="{{ $penghuni->id_penghuni }}"> {{ $penghuni->nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="id_kamar" class="control-label col-lg-2">Pilih Kamar</label>
                <div class="col-lg-10">
                  <select name="kamar_id" class="form-control select2" id="kamar_id">
                    <option disabled selected>-- Pilih Nama Kamar --</option>
                    @foreach ($kamars as $kamar)
                      <option value="{{ $kamar->id_kamar }}">Blok {{ blok::where('id_blok', $kamar->blok_id)->first()->namaBlok }} kamar {{ $kamar->namaKamar }} (lantai {{ lantai::where('id_lantai',$kamar->lantai_id)->first()->namaLantai }})</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="lamaKontrak" class="control-label col-lg-2">Lama Sewa (/Bulan)</label>
                <div class="col-lg-10">
                  <input class="form-control" name="lamaKontrak" id="lamaKontrak" type="text" placeholder='Masukan Lama Sewa' required/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2">Tanggal Masuk</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" required name="masuk" id="masuk" autocomplete="off" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD" parsley-trigger="change" onchange="changeKeluar()">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2">Jatuh Tempo</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" required name="keluar" id="keluar" autocomplete="off" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-theme" type="submit">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
          <!-- /form-panel -->
      </div>
        <!-- /col-lg-12 -->
    </div>
  </section>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
@endsection

@section('js')
  <script src="{{ asset('lib/number-divider.min.js') }}"></script>
  <script src="{{ asset('lib/select2/js/select2.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript" src="{{ asset('/lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
@endsection

@section('script-js')
<script type="text/javascript">
  $(document).ready(function(){
      $("#number").divide();

      $(".select2").select2();
      // Date Picker
      jQuery('#masuk').datepicker({
          todayHighlight: true,
          autoclose: true,
      }).on('change', function () {
        console.log("lalala lal")
        changeKeluar();
      });

      jQuery('#keluar').datepicker({
          todayHighlight: true,
          autoclose: true,
      });

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

  function changeKeluar(){
      var msk = $("#masuk").val();
      var lama = $("#lamaKontrak").val();
      // console.log("test");
      $.ajax({
        url       : "{{ route('ajxGetKeluar')}}",
        data      : {
                      msk : msk,
                      lamaKontrak : lama,
                    },
        type		  :	"GET",
      }).done(function(data){
        $("#keluar").val(data);
        // console.log(data);
      });
  }
</script>
@endsection
