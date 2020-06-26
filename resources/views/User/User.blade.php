@extends('layout.dashboard')

@section('page')
    Tambah User
@endsection

@section('user')
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
            @isset($user)
              <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="/user/edit/{{ $user->id }}">
            @else
              <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="/user/create">
            @endisset
              {{ csrf_field() }}
              <div class="form-group ">
                <label for="harga" class="control-label col-lg-2">Username</label>
                <div class="col-lg-10">
                  @isset($user->username)
                    <input class="form-control" id="username" name="username" minlength="3" type="text" placeholder='Username' value="@isset($user->username){{ $user->username }}@endisset" readonly="readonly" required/>
                  @else
                    <input class="form-control" id="username" name="username" minlength="3" type="text" placeholder='Username' required/>
                  @endif
                </div>
              </div>
              <div class="form-group ">
                <label for="namaKamar" class="control-label col-lg-2">Nama</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="nama" name="nama" minlength="3" type="text" placeholder='Nama' value="@isset($user->nama){{ $user->nama }}@endisset" required/>
                </div>
              </div>
              <div class="form-group ">
                <label for="namaKamar" class="control-label col-lg-2">No Handphone</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="noHP" name="noHP" minlength="3" type="text" placeholder='nomor Handphone' value="@isset($user->no_HP){{ $user->no_HP }}@endisset" required/>
                </div>
              </div>
              <div class="form-group ">
                <label for="harga" class="control-label col-lg-2">Password</label>
                <div class="col-lg-10">
                  <input class="form-control" id="password" name="password" minlength="6" type="password" required/>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  @isset($user)
                    <button class="btn btn-theme" type="submit">Simpan</button>
                  @else
                    <button class="btn btn-theme" type="submit">Tambahkan</button>
                  @endif
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
