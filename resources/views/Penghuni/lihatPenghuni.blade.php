@extends('layout.dashboard')

@section('page')
    Daftar Penghuni
@endsection

@php
  use App\Models\dokumenPenghuni;
  use App\Models\JaminanKunci;
@endphp

@section('css')
  <link href="{{ asset('lib/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/DT_bootstrap.css')}}" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('lib/magnific-popup/dist/magnific-popup.css') }}"/>
  {{-- <link href="{{ asset('lib/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" /> --}}
@endsection

@section('name')
  GreenHouse
@endsection

@section('penghuni')
  active
@endsection

@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    @if($jenis==1)
      <h3><i class="fa fa-angle-right"></i>Daftar Penghuni</h3>
    @elseif($jenis==0)
      <h3><i class="fa fa-angle-right"></i>Daftar Penghuni Nonaktif</h3>
    @endif
    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Dokumen Penghuni</h4>
                </div>
                <div class="modal-body" id="modalView">
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
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
          @if($jenis==1)
            <div class="col-md-12">
              <p class="text-muted col-2 font-14 m-b-30">
                  <a href="/tambahpenghuni" class="btn btn-theme waves-effect waves-light m-b-5">Tambah Penghuni</a>
                  <a href="/penghuni/history" class="btn btn-danger waves-effect waves-light m-b-5">History Penghuni</a>
                  <form class="form-horizontal" role="form" action="{{ route('exportPenghuni') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="text-right m-b-0">
                      <button class="btn btn-success waves-effect waves-light w-xs m-b-5">
                          <span class="mdi mdi-file-excel">
                              Export to Excel
                          </span>
                      </button>
                    </div>
                  </form>
                  <form class="form-horizontal" role="form" action="{{ route('pindahDokumen') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="text-right m-b-0">
                      <button class="btn btn-success waves-effect waves-light w-xs m-b-5">
                          <span class="mdi mdi-file-excel">
                              Pindah Dokumen
                          </span>
                      </button>
                    </div>
                  </form>
              </p>
            </div>
          @endif
          <table id="datatable" class="table">
            <thead>
              <tr>
                <th class="centered" width="5%">#</th>
                <th class="centered" width="10%">No Identitas</th>
                <th class="centered" width="10%">Nama</th>
                <th class="centered" width="5%">Jenis Kelamin</th>
                <th class="centered" width="10%">Nomor HP</th>
                <th class="centered" width="10%">Alamat</th>
                <th class="centered" width="10%">Lihat Dokumen</th>
                <th class="centered" width="10%">Jaminan Kunci</th>
                <th class="centered" width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 0;
                $class="";
              @endphp
              @foreach ($penghunis as $penghuni)
                <tr>
                  @php
                    $i++;
                  @endphp
                  <td>{{ $i }}</td>
                  @php
                    if(empty($penghuni->noKTP)){
                      $class = "bg-danger";
                    }else{
                      $class = "";
                    }
                  @endphp
                  <td class="{{ $class }}">{{ $penghuni->noKTP }}</td>
                  @php
                    if(empty($penghuni->nama)){
                      $class = "bg-danger";
                    }else{
                      $class = "";
                    }
                  @endphp
                  <td class="{{ $class }}">{{ $penghuni->nama }}</td>
                  @php
                    if(empty($penghuni->jenisKelamin)){
                      $class = "bg-danger";
                    }else{
                      $class = "";
                    }
                  @endphp
                  <td class="{{ $class }}">{{ $penghuni->jenisKelamin }}</td>
                  @php
                    if(empty($penghuni->noHP)){
                      $class = "bg-danger";
                    }else{
                      $class = "";
                    }
                  @endphp
                  <th class="{{ $class }}">{{ $penghuni->noHP }}</th>
                  @php
                    if(empty($penghuni->alamatAsli)){
                      $class = "bg-danger";
                    }else{
                      $class = "";
                    }
                  @endphp
                  <td class="{{ $class }}">{{ $penghuni->alamatAsli }}</td>
                  @php
                    $dokumen = dokumenPenghuni::where('id_penghuni', $penghuni->id_penghuni)->count();
                    if($dokumen == 0){
                      $class = "bg-danger";
                    }else{
                      $class = "";
                    }
                  @endphp
                  <td class="{{ $class }}">
                    <button class="btn btn-theme02 btn-xs" onclick="getDokumen('{{$penghuni->id_penghuni}}')" data-toggle="modal" data-target="#myModal">
                      Lihat Dokumen
                    </button>
                  </td>
                  @php
                    $jaminan = JaminanKunci::where('penghuni_id', $penghuni->id_penghuni)->first();
                    if($jaminan){
                      $jaminankunci = "Rp ".number_format($jaminan['jaminan'], 2, ".", ",");
                    }else{
                      $jaminankunci = "Tambah Jaminan";
                    }
                  @endphp
                  <td class="{{ $class }}">
                    <a href="/editjaminankunci/{{ $penghuni->id_penghuni}}"><button class="btn btn-success btn-block btn-sm">{{ $jaminankunci }}</button></a>
                  </td>
                  @if($jenis==1)
                    <td>
                      <a href="/editpenghuni/{{ $penghuni->id_penghuni}}"><button class="btn btn-primary btn-block btn-sm"><i class="fa fa-pencil"> Update</i></button></a>
                      <form class="" action="/hapuspenghuni/{{ $penghuni->id_penghuni }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                          <button type="submit" class="btn btn-danger btn-block btn-sm"><i class="fa fa-trash-o "> Hapus</i></button></a>
                      </form>
                    </td>
                  @elseif($jenis==0)
                    <td>
                      <form class="" action="/restorepenghuni/{{ $penghuni->id_penghuni }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                          <button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fa fa-mail-forward "> Restore</i></button></a>
                      </form>
                      <form class="" action="/hapuspenghuni/{{ $penghuni->id_penghuni }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                          <button type="submit" class="btn btn-danger btn-block btn-sm"><i class="fa fa-trash-o "> Hapus Permanen</i></button></a>
                      </form>
                    </td>
                  @endif
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</section>

<!-- /MAIN CONTENT -->
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

    function getDokumen(id){
        $.ajax({
            url : '/penghuni/dokumen/'+id+'/get',
            type : "get",
            dataType: 'json',
            data:{
                id:id,
            },
        }).done(function (data) {
          // console.log(data)
          $('#modalView').html(data);
          $('#myModal').modal("show");
        }).fail(function (msg) {
          alert('Gagal menampilkan data, silahkan refresh halaman.');
        });
    }

</script>
@endsection

