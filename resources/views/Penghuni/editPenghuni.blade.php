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
            <form class="cmxform form-horizontal style-form" id="commentForm" enctype="multipart/form-data" method="POST" action="/editpenghuni/{{ $penghuni->id_penghuni }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="form-group ">
                <label for="noKTP" class="control-label col-lg-2">Nomor Identitas</label>
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
                    @if(strtolower($penghuni->jenisKelamin) == "laki-laki")
                      <option value="Laki-laki" selected>Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    @elseif(strtolower($penghuni->jenisKelamin) == "perempuan")
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan" selected>Perempuan</option>
                    @else
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    @endif
                  </select>
                </div>
              </div>
              {{-- <div class="form-group ">
                <label for="tempatLahir" class="control-label col-lg-2">Tempat Lahir</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="tempatLahir" name="tempatLahir" minlength="2" type="text" value="{{ $penghuni->tempatLahir }}" placeholder='Tempat Lahir' required/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2">Tanggal Lahir</label>
                <div class="col-lg-10">
                  <div data-date-viewmode="years" data-date-format="Y-m-d" >
                    <input class="form-control" id="tanggalLahir" name="tanggalLahir" size="16" type="text" value="{{ $penghuni->tanggalLahir }}" data-date-format='yyyy-mm-dd' autocomplete="off" required/>
                  </div>
                  <span class="help-block">Pilih Tanggal Lahir</span>
                </div>
              </div> --}}
              <div class="form-group ">
                <label for="noHP" class="control-label col-lg-2">Nomor Handphone</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="noHP" name="noHP" minlength="10" type="text" value="{{ $penghuni->noHP }}" placeholder='08xxxxxxxx' required/>
                </div>
              </div>
              {{-- <div class="form-group ">
                <label for="pekerjaan" class="control-label col-lg-2">Pekerjaan</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="pekerjaan" name="pekerjaan" minlength="2" type="text" value="{{ $penghuni->pekerjaan }}"placeholder='Pekerjaan' required/>
                </div>
              </div> --}}
              <div class="form-group ">
                <label for="alamatAsli" class="control-label col-lg-2">Alamat (Sesuai KTP)</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="alamatAsli" name="alamatAsli" minlength="2" type="text" value="{{ $penghuni->alamatAsli }}" placeholder='Alamat' required/>
                </div>
              </div>
              {{-- <div class="form-group">
                <label class="control-label col-lg-2">Upload Foto KTP</label>
                <div class="controls col-md-9">
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                    @if(empty($penghuni->ktp))
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" id="ktp" name="ktp" />
                          @if($errors->has('ktp'))
                            <span class="help-block">
                              <strong>{{ $errors->first('ktp') }}</strong>
                            </span>
                          @endif
                      </span>
                    @elseif(!empty($penghuni->ktp))
                      <img src="{{ asset('storage/'.$penghuni->ktp) }}"  alt="user-img" title="{{ $penghuni->nama }}" class="img-thumbnail img-responsive photo">
                      <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-undo"></i> Change</span>
                          <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                          <input type="file" id="ktp" name="ktp" />
                            @if($errors->has('ktp'))
                              <span class="help-block">
                                <strong>{{ $errors->first('ktp') }}</strong>
                              </span>
                            @endif
                        </span>
                    @endif
                    <span class="fileupload-preview" style="margin-left:5px;"></span>
                    <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                  </div>
                </div>
              </div> --}}
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
  <script type="text/javascript" src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
  <script src="{{ asset('/lib/advanced-form-components.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      jQuery('#tanggalLahir').datepicker();
    });
  </script>
@endsection
