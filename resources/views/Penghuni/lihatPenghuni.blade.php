@extends('layout.dashboard')

@section('page')
    Daftar Penghuni
@endsection

@section('css')
  <link href="{{ asset('lib/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
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
    <h3><i class="fa fa-angle-right"></i>Daftar Penghuni</h3>
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
                <a href="/tambahpenghuni" class="btn btn-theme waves-effect waves-light m-b-5">Tambah Penghuni</a>
            </p>
          </div>

          <table id="datatable" class="table">
            <thead>
              <tr>
                <th class="centered" width="5%">#</th>
                <th class="centered" width="10%">No KTP</th>
                <th class="centered" width="10%">Nama</th>
                <th class="centered" width="5%">Jenis Kelamin</th>
                <th class="centered" width="10%">Tempat Lahir</th>
                <th class="centered" width="10%">Tanggal Lahir</th>
                <th class="centered" width="10%">Nomor HP</th>
                <th class="centered" width="10%">Pekerjaan</th>
                <th class="centered" width="10%">Alamat Asli</th>
                <th class="centered" width="10%">KTP</th>
                <th>Action</th>
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
                    if(empty($penghuni->tempatLahir)){
                      $class = "bg-danger";
                    }else{
                      $class = "";
                    }
                  @endphp
                  <td class="{{ $class }}">{{ $penghuni->tempatLahir }}</td>
                  @php
                    if(empty($penghuni->tanggalLahir)){
                      $class = "bg-danger";
                    }else{
                      $class = "";
                    }
                  @endphp
                  <td class="{{ $class }}">{{ $penghuni->tanggalLahir }}</td>
                  @php
                    if(empty($penghuni->noHP)){
                      $class = "bg-danger";
                    }else{
                      $class = "";
                    }
                  @endphp
                  <th class="{{ $class }}">{{ $penghuni->noHP }}</th>
                  @php
                    if(empty($penghuni->pekerjaan)){
                      $class = "bg-danger";
                    }else{
                      $class = "";
                    }
                  @endphp
                  <td class="{{ $class }}">{{ $penghuni->pekerjaan }}</td>
                  @php
                    if(empty($penghuni->alamatAsli)){
                      $class = "bg-danger";
                    }else{
                      $class = "";
                    }
                  @endphp
                  <td class="{{ $class }}">{{ $penghuni->alamatAsli }}</td>
                  @php
                    if(empty($penghuni->ktp)){
                      $class = "bg-danger";
                    }else{
                      $class = "";
                    }
                  @endphp
                  <td class="{{ $class }}">
                    @if($penghuni->ktp=="")
                      KTP belum diupload
                    @else
                      <a href="storage/{{ $penghuni->ktp}}">Buka KTP
                    @endif
                  </td>
                  <td>
                    <a href="/editpenghuni/{{ $penghuni->id_penghuni}}"><button class="btn btn-primary btn-block btn-sm"><i class="fa fa-pencil"> Update</i></button></a>
                    <form class="" action="/hapuspenghuni/{{ $penghuni->id_penghuni }}" method="post">
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

<!-- /MAIN CONTENT -->
<!--main content end-->
@endsection

@section('js')
  <script src="{{ asset('lib/datatables/jquery.dataTables.min.js')}}"></script>

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

</script>
@endsection

