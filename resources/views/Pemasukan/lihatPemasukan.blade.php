@extends('layout.dashboard')

@section('page')
    Daftar Pemasukan Eksternal
@endsection

@section('css')
  <link href="{{ asset('lib/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
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
          <hr>
          <table id="datatable" class="table data-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Sumber</th>
                <th>Jumlah (Rp)</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @php ($i=0)
              @foreach ($pemasukans as $pemasukan)
                <tr>
                  @php ($i++)
                  <td>{{ $i }}</td>
                  <td>{{ $pemasukan->namaSumber }}</td>
                  <td>{{ $pemasukan->jumlah }}</td>
                  <td>{{ $pemasukan->tanggal }}</td>
                  <td>{{ $pemasukan->keterangan }}</td>
                  <td>
                    <a href="/editpemasukan/{{ $pemasukan->id_pemasukan}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                    <form class="" action="/hapuspemasukan/{{ $pemasukan->id_pemasukan }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
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
