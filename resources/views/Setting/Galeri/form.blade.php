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
    @isset($galeri)
      <h3><i class="fa fa-angle-right"></i>Edit Data Galeri</h3>
    @else
      <h3><i class="fa fa-angle-right"></i>Tambahkan Data Galeri</h3>
    @endisset
    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class=" form">
            @isset($galeri)
              <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="{{ route('galeri.update', ['id' => $galeri->id]) }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
            @else
              <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="{{ route('galeri.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
            @endisset
              <div class="form-group ">
                <label for="keterangan" class="control-label col-lg-2">Title</label>
                <div class="col-lg-10">
                  <input class="form-control" name="title" type="text" placeholder='Judul Gambar' value="@isset($galeri->title){{$galeri->title}}@endisset"/>
                </div>
              </div>
              <div class="form-group">
                <label for="tanggal" class="control-label col-lg-2">Description</label>
                <div class="col-lg-10">
                  {{-- <textarea name="description" id="description" placeholder="Keterangan tambahan" class="form-control">@isset($galeri->description){{$galeri->description}}@endisset</textarea> --}}
                  <input name="description" id="description" type="text" placeholder="Keterangan tambahan" class="form-control" value="@isset($galeri->description){{$galeri->description}}@endisset" autocomplete="off" required/>
                </div>
              </div>
              <div class="form-group ">
                <label for="jumlah" class="control-label col-lg-2">Upload Image</label>
                <div class="col-md-10">
                  <input type="file" class="dropify" data-height="100" name="image" id="image" data-default-file="@isset($galeri->image){{ asset('landingpage/gallery/'.$galeri->image) }}@endisset" value="@isset($galeri->image){{ asset('landingpage/gallery/'.$galeri->image) }}@endisset">
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
