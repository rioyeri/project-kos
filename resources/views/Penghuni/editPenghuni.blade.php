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
    <h3><i class="fa fa-angle-right"></i> Tambahkan Data Penghuni</h3>

    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class=" form">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="/editpenghuni/{{ $penghuni->id_penghuni }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="form-group ">
                <label for="noKTP" class="control-label col-lg-2">Nomor KTP</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="noKTP" name="noKTP" minlength="16" maxlength="16" type="text" value="{{ $penghuni->noKTP }}" placeholder='Nomor KTP' required/>
                </div>
              </div>
              <div class="form-group ">
                <label for="namaPenghuni" class="control-label col-lg-2">Nama Penghuni</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="nama" name="nama" minlength="2" type="text" value="{{ $penghuni->nama }}" placeholder='Masukan Nama Penghuni' required/>
                </div>
              </div>
              <div class="form-group ">
                <label for="jenisKelamin" class="control-label col-lg-2">Jenis Kelamin</label>
                <div class="col-lg-10">
                  <select name="jenisKelamin" class="form-control">
                    @if($penghuni->jenisKelamin == "Laki-laki")
                      <option value="Laki-laki" selected>Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    @elseif($penghuni->jenisKelamin == "Perempuan")
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan" selected>Perempuan</option>
                    @endif
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="tempatLahir" class="control-label col-lg-2">Tempat Lahir</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="tempatLahir" name="tempatLahir" minlength="2" type="text" value="{{ $penghuni->tempatLahir }}" placeholder='Tempat Lahir' required/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2">Tanggal Lahir</label>
                <div class="col-lg-10">
                  <div data-date-viewmode="years" data-date-format="Y-m-d" >
                    <input class="form-control default-date-picker" id="tanggalLahir" name="tanggalLahir" size="16" type="text" value="{{ $penghuni->tanggalLahir }}" required/>
                  </div>
                  <span class="help-block">Pilih Tanggal Lahir</span>
                </div>
              </div>
              <div class="form-group ">
                <label for="pekerjaan" class="control-label col-lg-2">Pekerjaan</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="pekerjaan" name="pekerjaan" minlength="2" type="text" value="{{ $penghuni->pekerjaan }}"placeholder='Pekerjaan' required/>
                </div>
              </div>
              <div class="form-group ">
                <label for="alamatAsli" class="control-label col-lg-2">Alamat (Sesuai KTP)</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="alamatAsli" name="alamatAsli" minlength="2" type="text" value="{{ $penghuni->alamatAsli }}" placeholder='Alamat' required/>
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
  <script src="{{ asset('/lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('/lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{ asset('/lib/advanced-form-components.js')}}"></script>
@endsection
