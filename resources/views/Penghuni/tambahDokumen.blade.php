@extends('layout.dashboard')

@section('page')
    Tambah Penghuni
@endsection

@section('name')
  GreenHouse
@endsection

@section('penghuni')
  active
@endsection

@section('content')
<!--main content start-->

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Tambahkan Dokumen Penghuni {{$penghuni->nama}}</h3>

    <!-- FORM VALIDATION -->
  <form method="post" action="/penghuni/dokumen/{{$penghuni->id_penghuni}}/add" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
            <div class="form-group ">
              <br>
              <input type="hidden" name="nama" value="{{$penghuni->nama}}">
              <label for="jenis" class="control-label col-lg-2">Jenis Dokumen</label>
              <div class="col-lg-5">
                <select name="jenis" class="form-control">
                  <option selected disabled>-- Pilih --</option>
                  <option value="KTP">KTP</option>
                  <option value="SIM">SIM</option>
                  <option value="Surat Perjanjian">Surat Perjanjian</option>
                  <option value="Lain">Lainnya</option>
                </select>
              </div>
              <br>
            </div>
            <br>
            <div class="form-group">
              <label for="file" class="control-label col-lg-2">Upload Dokumen</label>
              <div class="col-lg-10">
                  <input type="file" class="form-control-file" name="file">
              </div>
              <br>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-theme" type="submit">Simpan</button>
              </div>
            </div>
            <br><br>
        </div>
      </div>
    </div>
  </form>
  </section>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
@endsection

@section('js')
  <script src="{{ asset('/lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('/lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
  <script src="{{ asset('/lib/advanced-form-components.js')}}"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      jQuery('#tanggalLahir').datepicker();
    });
  </script>
@endsection
