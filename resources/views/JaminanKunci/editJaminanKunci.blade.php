@extends('layout.dashboard')

@section('page')
    Edit Data Jaminan Kunci
@endsection

@section('name')
  GreenHouse
@endsection

@section('jaminankunci')
  active
@endsection

@section('content')
@php
  use App\Models\Penghuni;
@endphp
<!--main content start-->

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Edit Data Jaminan Kunci</h3>

    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class=" form">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="/editjaminankunci/{{ $jaminankunci->id_jaminankunci }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="form-group ">
                <label for="penghuni_id" class="control-label col-lg-2">Pilih Nama Penghuni</label>
                <div class="col-lg-10">
                  <select name="penghuni_id" class="form-control">
                    @foreach ($penghunis as $penghuni)
                      @if($jaminankunci->penghuni_id == $penghuni->id_penghuni)
                        <option value="{{ $penghuni->id_penghuni }}" selected> {{ $penghuni->nama }}</option>
                      @else
                        <option value="{{ $penghuni->id_penghuni }}"> {{ $penghuni->nama }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="jaminan" class="control-label col-lg-2">Jaminan</label>
                <div class="col-lg-10">
                  <input class="form-control" name="jaminan" type="text" placeholder="Masukan Jaminan" value="{{ $jaminankunci->jaminan }}" required/>
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
