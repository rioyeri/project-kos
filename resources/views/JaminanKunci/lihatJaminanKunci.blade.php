@extends('layout.dashboard')

@section('page')
    Daftar Jaminan Kunci
@endsection

@section('name')
  GreenHouse
@endsection

@section('css')
  <link href="{{ asset('lib/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
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
    <h3><i class="fa fa-angle-right"></i>Daftar Data Jaminan Kunci</h3>
    <div class="row">
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
        <div class="content-panel">
          <div class="col-md-12">
            <p class="text-muted col-2 font-14 m-b-30">
              <a href="/tambahjaminankunci" class="btn btn-theme waves-effect waves-light m-b-5">Tambah Jaminan Kunci</a>
            </p>
          </div>
          <table id="datatable" class="table data-table">
            <thead>
              <tr>
                <th width="10%">#</th>
                <th width="30%">Nama Penghuni</th>
                <th width="50%">Jaminan</th>
                <th width="10%">Actions</th>
              </tr>
            </thead>
            <tbody>
              @php ($i=0)
              @foreach ($jaminankuncis as $jaminankunci)
                <tr>
                  @php ($i++)
                  <td>{{ $i }}</td>
                  <td>{{ Penghuni::where('id_penghuni', $jaminankunci->penghuni_id)->first()->nama}}</td>
                  <td>Rp. <span class="number">{{ $jaminankunci->jaminan }}</span></td>
                  <td>
                    <a href="/editjaminankunci/{{ $jaminankunci->id_jaminankunci}}"><button class="btn btn-primary btn-block btn-xs"><i class="fa fa-pencil"> Update</i></button></a>
                    <form class="" action="/hapusjaminankunci/{{ $jaminankunci->id_jaminankunci }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-block btn-xs"><i class="fa fa-trash-o "> Hapus</i></button></a>
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
  <script src="{{ asset('lib/number-divider.min.js') }}"></script>
  <script>
    $(".number").divide();
  </script>

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

