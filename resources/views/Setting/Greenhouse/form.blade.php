@extends('layout.dashboard')

@section('css')
  <!-- form Uploads -->
  <link href="{{ asset('lib/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page')
    Galeri
@endsection

@section('name')
  GreenHouse
@endsection

@section('content')
<!--main content start-->

<section id="main-content">
  <section class="wrapper">
    @isset($greenhouse)
      <h3><i class="fa fa-angle-right"></i>Edit Data Greenhouse</h3>
    @endisset
    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class=" form">
            @isset($greenhouse)
              <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="{{ route('greenhouse.update', ['id' => $greenhouse->id]) }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
            @endisset
              <div class="form-group ">
                <label for="keterangan" class="control-label col-lg-2">Welcome</label>
                <div class="col-lg-10">
                  <input class="form-control" name="welcome" type="text" placeholder='Welcome' value="@isset($greenhouse->welcome){{$greenhouse->welcome}}@endisset" required/>
                </div>
              </div>
              <div class="form-group">
                <label for="tanggal" class="control-label col-lg-2">Description</label>
                <div class="col-lg-10">
                  <input name="welcome_desc" id="welcome_desc" type="text" placeholder="Keterangan tambahan" class="form-control" value="@isset($greenhouse->welcome_desc){{$greenhouse->welcome_desc}}@endisset" autocomplete="off"/>
                </div>
              </div>
              <div class="form-group ">
                <label for="jumlah" class="control-label col-lg-2">Gallery Description</label>
                <div class="col-md-10">
                  <input name="galeri_desc" id="galeri_desc" type="text" placeholder="Keterangan Galeri" class="form-control" value="@isset($greenhouse->galeri_desc){{$greenhouse->galeri_desc}}@endisset" autocomplete="off"/>
                </div>
              </div>
              <div class="form-group ">
                <label for="jumlah" class="control-label col-lg-2">Alamat</label>
                <div class="col-md-10">
                  <input name="alamat" id="alamat" type="text" placeholder="Alamat" class="form-control" value="@isset($greenhouse->alamat){{$greenhouse->alamat}}@endisset" autocomplete="off"/>
                </div>
              </div>
              <div class="form-group ">
                <label for="jumlah" class="control-label col-lg-2">Kota</label>
                <div class="col-md-10">
                  <input name="kota" id="kota" type="text" placeholder="Kota, dan keterangan tambahan" class="form-control" value="@isset($greenhouse->kota){{$greenhouse->kota}}@endisset" autocomplete="off"/>
                </div>
              </div>
              <div class="form-group ">
                <label for="jumlah" class="control-label col-lg-2">Email</label>
                <div class="col-md-10">
                  <input name="email" id="email" type="text" placeholder="Email" class="form-control" value="@isset($greenhouse->email){{$greenhouse->email}}@endisset" autocomplete="off"/>
                </div>
              </div>
              <div class="form-group ">
                <label for="jumlah" class="control-label col-lg-2">Contact Person</label>
                <div class="col-md-10">
                  <input name="noHP" id="noHP" type="text" placeholder="nomor HP atau Whatsapp" class="form-control" value="@isset($greenhouse->noHP){{$greenhouse->noHP}}@endisset" autocomplete="off"/>
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

  <!-- file uploads js -->
  <script src="{{ asset('lib/fileuploads/js/dropify.min.js') }}"></script>

  <script type="text/javascript" src="{{ asset('lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>

  <script src="{{ asset('lib/advanced-form-components.js')}}"></script>

  <script src="{{ asset('lib/number-divider.min.js') }}"></script>

  <script>
    $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (1M max).'
            }
    });
  </script>
@endsection
