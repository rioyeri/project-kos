@extends('layout.dashboard')

@section('page')
    Tambahkan Data Pembayaran
@endsection

@section('name')
  Kos Ulfa
@endsection

@section('pembayaran')
  active
@endsection


@section('content')
<!--main content start-->

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Update Data Pembayaran</h3>

    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class=" form">
            <form class="cmxform form-horizontal style-form" id="commentForm" enctype="multipart/form-data" method="post" action="/editpembayaran/{{ $pembayaran->id_pembayaran }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="form-group ">
                <label for="id_kamar" class="control-label col-lg-2">Pilih Kamar</label>
                <div class="col-lg-10">
                  <select name="kamar_id" class="form-control">
                    @foreach ($kamars as $kamar)
                      @if($pembayaran->kamar_id == $kamar->id_kamar)
                        <option value="{{ $kamar->id_kamar }}" selected> {{ $kamar->namaKamar }}</option>
                      @else
                        <option value="{{ $kamar->id_kamar }}"> {{ $kamar->namaKamar }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="id_penghuni" class="control-label col-lg-2">Pilih Penghuni</label>
                <div class="col-lg-10">
                  <select name="penghuni_id" class="form-control">
                    @foreach ($penghunis as $penghuni)
                      @if($pembayaran->penghuni_id == $penghuni->id_penghuni)
                        <option value="{{ $penghuni->id_penghuni }}" selected> {{ $penghuni->nama }}</option>
                      @else
                        <option value="{{ $penghuni->id_penghuni }}"> {{ $penghuni->nama }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="jumlahBayar" class="control-label col-lg-2">Jumlah Pembayaran</label>
                <div class="col-lg-10">
                  <input class="form-control" id="number" name="jumlahBayar" type="text" placeholder='Masukan Jumlah Pembayaran' value="{{ $pembayaran->jumlahBayar }}" required/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2">Tanggal Pembayaran</label>
                  <div class="col-lg-10">
                    <div data-date-viewmode="years" data-date-format="Y-M-d">
                      <input class="form-control default-date-picker" value="{{ $pembayaran->tglPembayaran }}" id="tglPembayaran" name="tglPembayaran" type="text" size="16" required/>
                    </div>
                  <span class="help-block">Pilih Tanggal Pembayaran</span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2">Tanggal Masuk</label>
                <div class="col-lg-10">
                  <div data-date-viewmode="years" data-date-format="Y-m-d" >
                    <input class="form-control default-date-picker" value="{{ $pembayaran->tglMasuk }}" id="tglMasuk" name="tglMasuk" size="16" type="text" required/>
                  </div>
                  <span class="help-block">Pilih Tanggal Masuk</span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2">Tanggal Keluar</label>
                <div class="col-lg-10">
                  <div data-date-viewmode="years" data-date-format="Y-m-d" >
                    <input class="form-control default-date-picker" value="{{ $pembayaran->tglKeluar }}" id="tglKeluar" name="tglKeluar" size="16" type="text" required/>
                  </div>
                  <span class="help-block">Pilih Tanggal Keluar</span>
                </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-lg-2">Upload Bukti Pembayaran</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-exists" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                          <input type="file" id="buktiBayar" name="buktiBayar" value="{{ $pembayaran->buktiBayar }}" />
                            @if($errors->has('buktiBayar'))
                              <span class="help-block">
                                <strong>{{ $errors->first('buktiBayar') }}</strong>
                              </span>
                            @endif
                      </span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
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
  <script type="text/javascript" src="{{ asset('lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{ asset('lib/advanced-form-components.js')}}"></script>
  <script src="{{ asset('lib/number-divider.min.js') }}"></script>
  <script>
    $("#number").divide();
  </script>
@endsection
