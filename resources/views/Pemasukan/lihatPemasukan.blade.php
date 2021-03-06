@extends('layout.dashboard')

@section('page')
    Daftar Pemasukan Eksternal
@endsection

@section('css')
  <link href="{{ asset('lib/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/DT_bootstrap.css')}}" rel="stylesheet"/>
  {{-- <link href="{{ asset('lib/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" /> --}}
@endsection

@section('name')
  GreenHouse
@endsection

@section('pemasukan')
  active
@endsection

@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Daftar Data Pemasukan Eksternal</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
          <div class="col-md-12">
            <p class="text-muted col-2 font-14 m-b-30">
              <a href="/tambahpemasukan" class="btn btn-theme waves-effect waves-light m-b-5">Tambah Pemasukan</a>
            </p>
          </div>
          <table id="datatable" class="table data-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th class="text-right">Jumlah</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @php ($i=0)
              @foreach ($pemasukans as $pemasukan)
                <tr>
                  @php ($i++)
                  <td>{{ $i }}</td>
                  <td>{{ $pemasukan->tanggal }}</td>
                  <td>{{ $pemasukan->keterangan }}</td>
                  <td class="text-right">Rp {{ number_format($pemasukan->jumlah, 2, ".", ",") }}</td>
                  <td>
                    <a href="/editpemasukan/{{ $pemasukan->id_pemasukan}}"><button class="btn btn-primary btn-block btn-xs"><i class="fa fa-pencil"> Edit</i></button></a>
                    <form class="" action="/hapuspemasukan/{{ $pemasukan->id_pemasukan }}" method="post">
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
  <script type="text/javascript" language="javascript" src="{{ asset('lib/advanced-datatable/js/jquery.js')}}"></script>
  <script type="text/javascript" language="javascript" src="{{ asset('lib/advanced-datatable/js/jquery.dataTables.js')}}"></script>
  <script type="text/javascript" src="{{asset('lib/advanced-datatable/js/DT_bootstrap.js')}}"></script>
  {{-- <script src="{{ asset('lib/datatables/jquery.dataTables.min.js')}}"></script> --}}
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
