@extends('layout.dashboard')

@section('page')
    Tambah Kamar
@endsection

@section('kamar')
  active
@endsection

@section('name')
  GreenHouse
@endsection

@section('content')
<!--main content start-->

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Tambahkan Data Kamar</h3>

    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
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
          <div class=" form">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="/tambahkamar">
              {{ csrf_field() }}
              <div class="form-group ">
                <label for="blok_id" class="control-label col-lg-2">Blok</label>
                <div class="col-lg-10">
                  <select name="id_blok" class="form-control">
                    <option disabled selected>-- Pilih --</option>
                    @foreach ($bloks as $blok)
                      <option value="{{ $blok->id_blok }}"> {{ $blok->namaBlok }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="lantai_id" class="control-label col-lg-2">Lantai</label>
                <div class="col-lg-10">
                  <select name="id_lantai" class="form-control">
                    <option disabled selected>-- Pilih --</option>
                    @foreach ($lantais as $lantai)
                      <option value="{{ $lantai->id_lantai }}"> {{ $lantai->namaLantai }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="namaKamar" class="control-label col-lg-2">Nama Kamar</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="namaKamar" name="namaKamar" minlength="1" type="text" placeholder='Masukan Nama Kamar' required/>
                </div>
              </div>
              <div class="form-group ">
                <label for="harga" class="control-label col-lg-2">Harga Sewa Kamar</label>
                <div class="col-lg-10 form-inline">
                  <label>Rp.</label>
                  <input class="form-control" id="number" name="harga" minlength="2" type="text" placeholder='Masukan Harga Sewa' required/>
                  <label> / Bulan</label>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-theme" type="submit">Tambahkan</button>
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
  <script src="{{ asset('lib/number-divider.min.js') }}"></script>
  <script>
    $("#number").divide();
  </script>
@endsection
