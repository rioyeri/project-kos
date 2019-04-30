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
          <div class=" form">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="/tambahkamar">
              {{ csrf_field() }}
              <div class="form-group ">
                <label for="namaKamar" class="control-label col-lg-2">Nama Kamar</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="namaKamar" name="namaKamar" minlength="2" type="text" placeholder='Masukan Nama Kamar' required/>
                </div>
              </div>
              <div class="form-group ">
                <label for="blok_id" class="control-label col-lg-2">Blok</label>
                <div class="col-lg-10">
                  <select name="id_blok" class="form-control">
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
                    @foreach ($lantais as $lantai)
                      <option value="{{ $lantai->id_lantai }}"> {{ $lantai->namaLantai }}</option>
                    @endforeach
                  </select>
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
