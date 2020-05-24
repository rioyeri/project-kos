@extends('layout.dashboard')


@section('css')
  <link href="{{ asset('lib/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('page')
    Edit Data Jaminan Kunci
@endsection

@section('name')
  GreenHouse
@endsection

@section('jaminankunci')
  active
@endsection

@section('content')
@php
  use App\Models\Kamar;
  use App\Models\lantai;
  use App\Models\blok;
@endphp
<!--main content start-->

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Edit Data Jaminan Kunci</h3>

    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class=" form">
            @if($jenis == "edit")
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="/editjaminankunci/{{ $jaminankunci->id_jaminankunci }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
            @else
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="/tambahjaminankunci">
                @csrf
            @endif
              <div class="form-group ">
                <label for="penghuni_id" class="control-label col-lg-2">Pilih Nama Penghuni</label>
                <div class="col-lg-5">
                  <input type="text" class="form-control" name="penghuni" value="{{ $penghuni->nama }}" disabled>
                  <input type="hidden" name="penghuni_id" value="{{ $penghuni->id_penghuni }}">
                </div>
              </div>
              <div class="form-group ">
                <label for="jaminan" class="control-label col-lg-2">Jaminan</label>
                <div class="col-lg-10 form-inline">
                  <label>Rp.</label>
                  <input class="form-control" id="number" name="jaminan" minlength="2" type="text" value="@isset($jaminankunci->jaminan){{ $jaminankunci->jaminan }}@endisset" placeholder='Masukan Jaminan' required/>
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
    </form>
  </section>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
@endsection

@section('js')
  <script src="{{ asset('lib/select2/js/select2.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('lib/number-divider.min.js') }}"></script>
@endsection

@section('script-js')
  <script>
    $(".select2").select2();
    $("#number").divide();
  </script>
@endsection
