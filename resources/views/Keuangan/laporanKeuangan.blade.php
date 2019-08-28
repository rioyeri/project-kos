@extends('layout.dashboard')

@section('page')
    Laporan Keuangan
@endsection

@section('css')
  <link href="{{ asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/DT_bootstrap.css')}}" rel="stylesheet"/>
  <link href="{{ asset('lib/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('name')
  GreenHouse
@endsection

@section('keuangan')
  active
@endsection

@section('content')
@php
    use App\Models\Pemasukan;
    use App\Models\Pengeluaran;
    use App\Models\Keuangan;
    use App\Models\Pembayaran;
    use App\Models\Penghuni;
@endphp
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Daftar Data Pemasukan Eksternal</h3>
    <div class="row mb">
      <div class="col-md-12">
        <div class="content-panel">

          <table id="datatable" class="table data-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>

              </tr>
            </thead>
            <tbody>
              @php
                $i=0
              @endphp
              @foreach ($keuangans as $keuangan)
                <tr>
                  @php
                    $i++
                  @endphp
                  <td>{{ $i }}</td>
                  @if($keuangan->trx_jenis == 1)
                    <td>{{ Pemasukan::where('id_pemasukan',$keuangan->trx_id)->first()->tanggal}}</td>
                    <td>{{ Pemasukan::where('id_pemasukan',$keuangan->trx_id)->first()->namaSumber }}</td>
                    <td>{{ Pemasukan::where('id_pemasukan',$keuangan->trx_id)->first()->keterangan }}</td>
                    <td>Rp. {{ Pemasukan::where('id_pemasukan',$keuangan->trx_id)->first()->jumlah }}</td>
                    <td>0</td>

                  @elseif($keuangan->trx_jenis == 0)
                    <td>{{ Pengeluaran::where('id_pengeluaran', $keuangan->trx_id)->first()->tanggal }}</td>
                    <td>{{ Pengeluaran::where('id_pengeluaran', $keuangan->trx_id)->first()->namaPJ }}</td>
                    <td>{{ Pengeluaran::where('id_pengeluaran', $keuangan->trx_id)->first()->keterangan }}</td>
                    <td>0</td>
                    <td>Rp. {{ Pengeluaran::where('id_pengeluaran', $keuangan->trx_id)->first()->jumlah }}</td>

                  @elseif($keuangan->trx_jenis == 2)
                    <td>{{ Pembayaran::where('id_pembayaran', $keuangan->trx_id)->first()->tglPembayaran }}</td>
                    @php
                      $data = Pembayaran::where('id_pembayaran', $keuangan->trx_id)->first();
                      $penghuni = Penghuni::where('id_penghuni', $data['penghuni_id'])->first();
                    @endphp
                    <td>{{ $penghuni['nama'] }}</td>
                    <td>Pembayaran Kos</td>
                    <td>Rp. {{ Pembayaran::where('id_pembayaran', $keuangan->trx_id)->first()->jumlahBayar }}</td>
                    <td>0</td>
                  @endif
                </tr>
              @endforeach
            </tbody>
            <tbody>
              <td></td>
              <td>Total Saldo Sekarang</td>
              <td></td>
              <td></td>
              <td></td>
              <td>Rp. {{ Keuangan::latest()->first()->saldo }}</td>
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

@section('script-js')
@endsection
