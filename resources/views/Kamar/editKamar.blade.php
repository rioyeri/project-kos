@extends('layout.dashboard')

@section('page')
    Edit Kamar
@endsection

@section('name')
  GreenHouse
@endsection

@section('kamar')
  active
@endsection

@section('content')
<!--main content start-->

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Edit Data Kamar</h3>

    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class=" form">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="/editkamar/{{ $kamar->id_kamar}}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="form-group ">
                <label for="namaKamar" class="control-label col-lg-2">Nama Kamar</label>
                <div class="col-lg-10">
                  <input name="id" type="hidden" value="{{ $kamar->id_kamar}}">
                  <input class="form-control" name="namaKamar" type="text" value="{{ $kamar->namaKamar}}" placeholder="Masukan Nama Kamar" required/>
                </div>
              </div>
              <div class="form-group ">
                <label for="blok_id" class="control-label col-lg-2">Blok</label>
                <div class="col-lg-10">
                  <select name="id_blok" class="form-control">
                    @foreach ($bloks as $blok)
                      @if($blok->id_blok == $kamar->blok_id)
                        <option value="{{ $blok->id_blok }}" selected> {{ $blok->namaBlok }}</option>
                      @else
                        <option value="{{ $blok->id_blok }}"> {{ $blok->namaBlok }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="lantai_id" class="control-label col-lg-2">Lantai</label>
                <div class="col-lg-10">
                  <select name="id_lantai" class="form-control">
                    @foreach ($lantais as $lantai)
                      @if($lantai->id_lantai == $kamar->lantai_id)
                        <option value="{{ $lantai->id_lantai }}" selected> {{ $lantai->namaLantai }}</option>
                      @else
                        <option value="{{ $lantai->id_lantai }}"> {{ $lantai->namaLantai }}</option>
                      @endif
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
