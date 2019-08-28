@extends('layout.dashboard')

@section('css')
  <link href="{{ asset('lib/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('page')
    Daftar Pembayaran
@endsection

@section('name')
  GreenHouse
@endsection

@section('pembayaran')
  active
@endsection

@section('content')
@php
  use App\Models\Kamar;
  use App\Models\Penghuni;
@endphp
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Pembayaran</h3>
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
          <p class="text-muted col-md-2 font-14 m-b-30">
            <a href="/tambahpembayaran" class="btn btn-theme waves-effect waves-light m-b-5">Tambah Pembayaran</a>
          </p>
          <div class="row">
            <div class="col-md-12">
              <h4><i class="fa fa-angle-right"></i>Daftar Data Pembayaran</h4>
            </div>
            <div class="row mt">
              <div class="col-lg-12">
                <div class="form-check">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label class="col-lg-2 control-label">Choose Period</label>
                      <div class="col-md-3">
                        <input type="month" class="form-control" parsley-trigger="change" required name="period" id="period">
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="id_kamar" class="control-label col-lg-2">Pilih Status Pembayaran</label>
                      <div class="col-md-3">
                        <select name="status" class="form-control" id="status">
                          <option disabled selected>-- Pilih Status Pembayaran --</option>
                          @foreach ($status as $stt)
                            <option value="{{ $stt }}"> {{ $stt }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-offset-2 col-lg-10">
                        <button class="btn btn-theme" type="submit" onclick="showtabel()">Tampilkan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="tabel">
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
  <script src="{{ asset('lib/datatables/jquery.dataTables.min.js')}}"></script>

  <script type="text/javascript">
    $(document).ready(function () {

        // Default Datatable
        $('#datatable').DataTable();
    });

    function showtabel(){
            var period = $("#period").val()
            var status = $("#status").val()
            $.ajax({
                url         :   "{{route('AjxShowTable')}}",
                data        :   {
                    date : period,
                    stat : status,
                },
                type		:	"GET",
                dataType    :   "html",
                success		:	function(data){
                    $("#tabel").html(data);
                },
                error       :   function(data){
                    document.getElementById('period').value = '2000-06';
                }
            });
    }
</script>
@endsection

