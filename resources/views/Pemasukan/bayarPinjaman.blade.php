@extends('layout.dashboard')

@section('page')
    Pinjam Uang
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
    <h3><i class="fa fa-angle-right"></i>Edit Data Pinjaman</h3>

    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class=" form">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="/bayarpinjaman/{{ $pinjaman->id_pinjaman }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="form-group ">
                <label for="namaPeminjam" class="control-label col-lg-2">Nama Peminjam</label>
                <div class="col-lg-10">
                  <input class="form-control" name="namaPeminjam" type="text" placeholder='Masukan Nama Peminjam' value="{{ $pinjaman->namaPeminjam }}" readonly/>
                </div>
              </div>
              <div class="form-group ">
                <label for="jumlah" class="control-label col-lg-2">Jumlah (Rp)</label>
                <div class="col-lg-10">
                  <input class="form-control divider" id="number" name="jumlah" type="text" placeholder='Masukan Jumlah yang Dipinjam' value="{{ $pinjaman->jumlah }}" readonly/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2">Tanggal Meminjam</label>
                  <div class="col-lg-10">
                    <div data-date-viewmode="years" data-date-format="Y-m-d">
                      <input name="tglPinjam" type="text" size="16" class="form-control" value="{{ $pinjaman->tglPinjam }}" readonly/>
                    </div>
                </div>
              </div>
              <div class="form-group ">
                <label for="keterangan" class="control-label col-lg-2">Keterangan</label>
                <div class="col-lg-10">
                  <input class="form-control" name="keterangan" type="text" placeholder='Tambahkan Keterangan (jika diperlukan)' value="{{ $pinjaman->keterangan }}"/>
                </div>
              </div>
              <div class="form-group ">
                <label for="jmlKembali" class="control-label col-lg-2">Jumlah yang Dikembalikan (Rp)</label>
                <div class="col-lg-10">
                  <input class="form-control" id="number2" name="jmlKembali" type="text" placeholder='Masukan Jumlah Uang yang Dikembalikan' required/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2">Tanggal Pengembalian</label>
                  <div class="col-lg-10">
                    <div data-date-viewmode="years" data-date-format="Y-m-d">
                      <input name="tglKembali" type="text" size="16" class="form-control default-date-picker" required/>
                    </div>
                  <span class="help-block">Pilih Tanggal Meminjam</span>
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
    $("#number").divide();
  </script>
  <script>
    $("#number2").divide();
  </script>
@endsection
