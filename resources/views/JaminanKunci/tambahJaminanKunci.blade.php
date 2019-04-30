@extends('layout.dashboard')

@section('page')
    Tambahkan Data Jaminan Kunci
@endsection

@section('name')
  Kos Ulfa
@endsection

@section('jaminankunci')
  active
@endsection

@section('content')
@php
  use App\Models\Pembayaran;
  use App\Models\Penghuni;
  use App\Models\Kamar;
@endphp
<!--main content start-->

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Tambahkan Data Jaminan Kunci</h3>

    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class=" form">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="/tambahjaminankunci">
              {{ csrf_field() }}
              <div class="form-group ">
                <label for="penghuni_id" class="control-label col-lg-2">Pilih Nama Penghuni</label>
                <div class="col-lg-10">
                  <select name="penghuni_id" class="form-control">
                    @foreach ($pembayarans as $pembayaran)
                      <option value="{{ $pembayaran->penghuni_id }}"> {{ Penghuni::where('id_penghuni', $pembayaran->penghuni_id)->first()->nama}} ({{ Kamar::where('id_kamar', $pembayaran->kamar_id)->first()->namaKamar}})</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="jaminan" class="control-label col-lg-2">Jaminan</label>
                <div class="col-lg-10">
                  <input class="form-control" name="jaminan" type="text" placeholder='Masukan Jaminan' required/>
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
