@extends('layout.dashboard')

@section('page')
    Tambah User
@endsection

@section('')
  active
@endsection

@section('name')
  GreenHouse
@endsection

@section('content')
<!--main content start-->

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Tambahkan User</h3>

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
            <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="/user/create">
              {{ csrf_field() }}
              <div class="form-group ">
                <label for="namaKamar" class="control-label col-lg-2">Nama</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="nama" name="nama" minlength="3" type="text" placeholder='Nama' required/>
                </div>
              </div>
              <div class="form-group ">
                <label for="namaKamar" class="control-label col-lg-2">No Handphone</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="noHP" name="noHP" minlength="3" type="text" placeholder='nomor Handphone' required/>
                </div>
              </div>
              <div class="form-group ">
                <label for="harga" class="control-label col-lg-2">Username</label>
                <div class="col-lg-10 form-inline">
                  <input class="form-control" id="username" name="username" minlength="3" type="text" placeholder='Username' required/>
                </div>
              </div>
              <div class="form-group ">
                <label for="harga" class="control-label col-lg-2">Password</label>
                <div class="col-lg-10 form-inline">
                  <input class="form-control" id="password" name="password" minlength="6" type="text" placeholder='Password' required/>
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
