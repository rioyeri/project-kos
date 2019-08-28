@extends('layout.dashboard')

@section('css')
  <link href="{{ asset('lib/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('page')
    Perpanjang Masa Sewa
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
  use App\Models\Penghuni;
  use App\Models\Kamar;
@endphp
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Perpanjang Masa Sewa</h3>
    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class=" form">
            <form class="cmxform form-horizontal style-form" enctype="multipart/form-data" id="commentForm" method="post" action="/mapping/edit">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="form-group ">
                <label for="id_penghuni" class="control-label col-lg-2">Pilih Penghuni</label>
                <div class="col-lg-10">
                  <select name="penghuni_id" class="form-control" parsley-trigger="change" onchange="changeKamar(this.value)">
                    <option value="{{ $mapping->id_penghuni }}" selected> {{ Penghuni::where('id_penghuni', $mapping->id_penghuni)->first()->nama }}</option>
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="id_kamar" class="control-label col-lg-2">Pilih Kamar</label>
                <div class="col-lg-10">
                  <select name="kamar_id" class="form-control" id="kamar_id">
                    <option value="{{ $mapping->id_kamar }}" selected disabled> {{ Kamar::where('id_kamar', $mapping->id_kamar)->first()->namaKamar }}</option>
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
                <label class="control-label col-lg-2">Mulai Masuk awal bulan</label>
                <div class="col-lg-10">
                  <div data-date-viewmode="month" data-date-format="Y-m-d">
                    <input name="masuk" type="month" size="16" class="form-control" parsley-trigger="change" onchange="changeKeluar(this.value)" placeholder="YYYY-MM" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2">Waktu Keluar di akhir bulan</label>
                <div class="col-lg-10">
                  <div data-date-viewmode="month" data-date-format="Y-m-d">
                    <input name="keluar" id="keluar" type="month" size="16" class="form-control" placeholder="YYYY-MM" required/>
                  </div>
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

    function changeKeluar(id){
        var lama = $("#lamaKontrak").val()
        $.ajax({
        url       :   "{{ route('ajxGetKeluar')}}",
        data      : {
                      msk : id,
                      lamaKontrak : lama,
                    },
        type		  :	"GET",
        success		:	function(data){
                    $("#keluar").val(data)
                    console.log(data);
                    // $('#responsive-datatable').DataTable();
                  }
            });
      }
  </script>
@endsection
