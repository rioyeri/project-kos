@extends('layout.dashboard')

@section('page')
    Laporan Keuangan
@endsection

@section('css')
  <link href="{{ asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
  <link href="{{ asset('lib/advanced-datatable/css/DT_bootstrap.css')}}" rel="stylesheet"/>
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
@endphp
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Daftar Data Pemasukan Eksternal</h3>
    <div class="row mb">
      <div class="col-md-12">
        <div class="content-panel">
          <div class="adv-table">
          <hr>
          <div class="row-fluid">
            <div class="span6">
              <div id="hidden-table-info_length" class="dataTables_length">
                <label><select size="1" name="hidden-table-info_length" aria-controls="hidden-table-info">
                  <option value="10" selected="selected">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select> records per page</label>
              </div>
            </div>
            <div class="span6">
              <div class="dataTables_filter" id="hidden-table-info_filter">
                <label>Search: <input type="text" aria-controls="hidden-table-info"></label>
              </div>
            </div>
          </div>
          <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
              <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Saldo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @php ($i=0)
              @foreach ($keuangans as $keuangan)
                <tr>
                  @php ($i++)
                  <td>{{ $i }}</td>
                  @if($keuangan->trx_jenis == 1)
                    <td>{{ Pemasukan::where('id_pemasukan',$keuangan->trx_id)->first()->tanggal}}</td>
                    <td>{{ Pemasukan::where('id_pemasukan',$keuangan->trx_id)->first()->namaSumber }}</td>
                    <td>{{ Pemasukan::where('id_pemasukan',$keuangan->trx_id)->first()->keterangan }}</td>
                    <td>{{ Pemasukan::where('id_pemasukan',$keuangan->trx_id)->first()->jumlah }}</td>
                    <td>0</td>
                    <td>{{ $keuangan->saldo }}</td>
                  @elseif($keuangan->trx_jenis == 0)
                    <td>{{ Pengeluaran::where('id_pengeluaran', $keuangan->trx_id)->first()->tanggal }}</td>
                    <td>{{ Pengeluaran::where('id_pengeluaran', $keuangan->trx_id)->first()->namaPJ }}</td>
                    <td>{{ Pengeluaran::where('id_pengeluaran', $keuangan->trx_id)->first()->keterangan }}</td>
                    <td>0</td>
                    <td>{{ Pengeluaran::where('id_pengeluaran', $keuangan->trx_id)->first()->jumlah }}</td>
                    <td>{{ $keuangan->saldo }}</td>
                  @endif
                </tr>
              @endforeach
            </tbody>
            <tbody>
                <td></td>
                <td>Saldo Sekarang</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ Keuangan::latest()->first()->saldo }}</td>
            </tbody>
          </table>
          <div class="row-fluid">
            <div class="span6">
              <div class="dataTables_info" id="hidden-table-info_info"></div>
            </div>
            <div class="span6">
              <div class="dataTables_paginate paging_bootstrap pagination">
                <ul><li class="prev"><a href="#">← Previous</a></li><li><a href="#">1</a></li><li class="active"><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul>
              </div>
            </div>
          </div>
          </div>
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
@endsection

@section('script-js')
<script type="text/javascript">
  /* Formating function for row details */
  function fnFormatDetails(oTable, nTr) {
    var aData = oTable.fnGetData(nTr);
    var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
    sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
    sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
    sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
    sOut += '</table>';

    return sOut;
  }

  $(document).ready(function() {
    /*
     * Insert a 'details' column to the table
     */
    var nCloneTh = document.createElement('th');
    var nCloneTd = document.createElement('td');
    nCloneTd.innerHTML = '<img src="lib/advanced-datatable/images/details_open.png">';
    nCloneTd.className = "center";

    $('#hidden-table-info thead tr').each(function() {
      this.insertBefore(nCloneTh, this.childNodes[0]);
    });

    $('#hidden-table-info tbody tr').each(function() {
      this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
    });

    /*
     * Initialse DataTables, with no sorting on the 'details' column
     */
    var oTable = $('#hidden-table-info').dataTable({
      "aoColumnDefs": [{
        "bSortable": false,
        "aTargets": [0]
      }],
      "aaSorting": [
        [1, 'asc']
      ]
    });

    /* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */
    $('#hidden-table-info tbody td img').live('click', function() {
      var nTr = $(this).parents('tr')[0];
      if (oTable.fnIsOpen(nTr)) {
        /* This row is already open - close it */
        this.src = "lib/advanced-datatable/media/images/details_open.png";
        oTable.fnClose(nTr);
      } else {
        /* Open this row */
        this.src = "lib/advanced-datatable/images/details_close.png";
        oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
      }
    });
  });
</script>
@endsection
