@extends('layout.dashboard')

@section('page')
    Laporan Keuangan
@endsection

@section('css')
  <link href="{{ asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/DT_bootstrap.css')}}" rel="stylesheet"/>
  {{-- <link href="{{ asset('lib/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" /> --}}
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
    use App\Models\Pembayarandet;
    $total = 0;
@endphp
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Laporan Keuangan</h3>
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
                    @php
                      $data1 = Pemasukan::where('id_pemasukan',$keuangan->trx_id)->first();
                      $total = $total + $data1['jumlah'];
                    @endphp
                    <td>{{ $data1['tanggal']}}</td>
                    <td>{{ $data1['namaSumber'] }}</td>
                    <td>{{ $data1['keterangan'] }}</td>
                    <td>Rp. <span class="number">{{ $data1['jumlah'] }}</span></td>
                    <td>0</td>

                  @elseif($keuangan->trx_jenis == 0)
                    @php
                      $data0 = Pengeluaran::where('id_pengeluaran', $keuangan->trx_id)->first();
                      $total = $total - $data0['jumlah'];
                    @endphp
                    <td>{{ $data0['tanggal'] }}</td>
                    <td>{{ $data0['namaPJ'] }}</td>
                    <td>{{ $data0['keterangan'] }}</td>
                    <td>0</td>
                    <td>Rp. <span class="number">{{ $data0['jumlah'] }}</span></td>

                  @elseif($keuangan->trx_jenis == 2)
                    @php
                      $data2 = Pembayaran::where('id_pembayaran', $keuangan->trx_id)->first();
                      $penghuni = Penghuni::where('id_penghuni', $data2['penghuni_id'])->first();
                      $total = $total + $data2['jumlahBayar'];
                      $det = Pembayarandet::where('id_pembayaran', $keuangan->trx_id)->where('status', 1)->select('bulan')->get();
                      if($det->count()>1){
                        $bulan1 = date("F", mktime(null, null, null, $det[0]['bulan']));
                        $bulan2 = date("F", mktime(null, null, null, $det[$det->count()-1]['bulan']));
                        $bayarbulan = $bulan1."-".$bulan2;
                      }else{
                        $bayarbulan = date("F", mktime(null, null, null, $det[0]['bulan']));
                      }
                    @endphp
                    <td>{{ $data2['tglPembayaran'] }}</td>
                    <td>{{ $penghuni['nama'] }}</td>
                    <td>Pembayaran Kos bulan {{ $bayarbulan }}</td>
                    <td>Rp. <span class="number">{{ $data2['jumlahBayar'] }}</span></td>
                    <td>0</td>
                  @endif
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="content-panel">
          <h3><i class="fa fa-angle-right"></i><b>Total Saldo Sekarang :  Rp.  <input class="number" value="{{ $total }}" readonly></b></h3>
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
  <script src="{{ asset('lib/number-divider/dist/number-divider.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function () {

        // Default Datatable
        $('#datatable').DataTable();

        $(".number").divide();

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
