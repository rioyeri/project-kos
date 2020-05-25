@extends('layout.dashboard')

@section('css')
  <link href="{{ asset('lib/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/DT_bootstrap.css')}}" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('lib/magnific-popup/dist/magnific-popup.css') }}"/>

  <style>
    img.photo{
        display:block; width:50%; height:auto;
    }
  </style>
@endsection

@section('page')
    Galeri
@endsection

@section('name')
  GreenHouse
@endsection

@section('content')
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Pengaturan Gallery</h3>

    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
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

          <div class="col-md-12">
            <p class="text-muted col-2 font-14 m-b-30">
              <a href="{{ route('galeri.create') }}" class="btn btn-theme waves-effect waves-light m-b-5">Tambah Gambar</a>
            </p>
          </div>
          <table id="datatable" class="table">
            <thead>
              <tr>
                <th class="centered" width="10%">#</th>
                <th class="centered" width="40%">Image</th>
                <th class="centered" width="20%">Image Title</th>
                <th class="centered" width="20%">Description</th>
                <th class="centered" width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach ($galeris as $galeri)
                <tr>
                  <td class="centered">{{ $i++ }}</td>
                  <td class="centered">
                    <a href="{{ asset('landingpage/gallery/'.$galeri->image) }}" class="image-popup" alt="user-img" title="{{$galeri->image}}">
                      <img src="{{ asset('landingpage/gallery/'.$galeri->image) }}"  alt="user-img" title="{{ $galeri->image }}" class="img-thumbnail img-responsive photo center">
                    </a>
                  </td>
                  <td class="centered">{{ $galeri->title }}</td>
                  <td class="centered">{{  $galeri->description  }}</td>
                  <td>
                    <a href="{{ route('galeri.edit', ['id' => $galeri->id]) }}"><button class="btn btn-primary btn-block btn-sm"><i class="fa fa-pencil"> Edit</i></button></a>
                    <form class="" action="{{ route('galeri.destroy', ['id' => $galeri->id]) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-block btn-sm"><i class="fa fa-trash-o "> Hapus</i></button></a>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</section>
<!--main content end-->
@endsection

@section('js')
  <script type="text/javascript" language="javascript" src="{{ asset('lib/advanced-datatable/js/jquery.js')}}"></script>
  <script type="text/javascript" language="javascript" src="{{ asset('lib/advanced-datatable/js/jquery.dataTables.js')}}"></script>
  <script type="text/javascript" src="{{asset('lib/advanced-datatable/js/DT_bootstrap.js')}}"></script>
  <!-- Magnific popup -->
  <script type="text/javascript" src="{{ asset('lib/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>

  {{-- <script src="{{ asset('lib/datatables/jquery.dataTables.min.js')}}"></script> --}}

  <script type="text/javascript">
    $(document).ready(function () {

        // Default Datatable
        $('#datatable').DataTable();

        $('.image-popup').magnificPopup({
            type: 'image',
        });

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf']
        });

        // Key Tables

        $('#key-table').DataTable({
            keys: true
        });

        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
