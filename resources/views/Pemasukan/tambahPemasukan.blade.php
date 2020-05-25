@extends('layout.dashboard')

@section('page')
    Pemasukan Eksternal
@endsection

@section('name')
  GreenHouse
@endsection

@section('pemasukan')
  active
@endsection

@section('content')
<!--main content start-->

<section id="main-content">
  <section class="wrapper">
    @if($jenis == "create")
      <h3><i class="fa fa-angle-right"></i>Tambahkan Data Pemasukan Dana Eksternal</h3>
    @elseif($jenis=="edit")
      <h3><i class="fa fa-angle-right"></i>Edit Data Pemasukan Dana Eksternal</h3>
    @endif
    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class=" form">
            @if($jenis=="create")
              <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="/tambahpemasukan">
              {{ csrf_field() }}
            @elseif($jenis=="edit")
              <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="/editpemasukan/{{ $pemasukan->id_pemasukan }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
            @endif
              {{-- <div class="form-group ">
                <label for="namaSumber" class="control-label col-lg-2">Nama Sumber</label>
                <div class="col-lg-10">
                  <input class="form-control" name="namaSumber" type="text" placeholder='Masukan Nama Sumber Pemasukan' value="@isset($pemasukan->namaSumber){{$pemasukan->namaSumber}}@endisset" required/>
                </div>
              </div> --}}
              <div class="form-group ">
                <label for="keterangan" class="control-label col-lg-2">Uraian</label>
                <div class="col-lg-10">
                  <input class="form-control" name="keterangan" type="text" placeholder='Uraian Pemasukan Eksternal' value="@isset($pemasukan->keterangan){{$pemasukan->keterangan}}@endisset"/>
                </div>
              </div>
              <div class="form-group">
                <label for="tanggal" class="control-label col-lg-2">Tanggal Dana Masuk</label>
                  <div class="col-lg-10">
                    <div data-date-viewmode="years" data-date-format="Y-m-d">
                      <input name="tanggal" id="tanggal" type="text" placeholder="YYYY-MM-DD" size="16" class="form-control default-date-picker" data-date-format='yyyy-mm-dd' value="@isset($pemasukan->tanggal){{$pemasukan->tanggal}}@endisset" autocomplete="off" required/>
                    </div>
                  <span class="help-block">Pilih Tanggal Dana tersebut Masuk</span>
                </div>
              </div>
              <div class="form-group ">
                <label for="jumlah" class="control-label col-lg-2">Jumlah (Rp)</label>
                <div class="col-lg-10">
                  <input class="form-control" id="number" name="jumlah" type="text" placeholder='Masukan Jumlah yang Dipinjam' value="@isset($pemasukan->jumlah){{$pemasukan->jumlah}}@endisset" required/>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-theme" type="submit">Save</button>
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
  <script src="{{ asset('lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{ asset('lib/advanced-form-components.js')}}"></script>
  <script src="{{ asset('lib/number-divider.min.js') }}"></script>
  <script>
    jQuery('#tanggal').datepicker();
    $("#number").divide();
  </script>
@endsection
