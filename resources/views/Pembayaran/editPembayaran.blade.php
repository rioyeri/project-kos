@extends('layout.dashboard')

@php
  use App\Models\Mapping;
  use App\Models\Pembayarandets;
  use App\Models\Penghuni;
  use App\Models\Kamar;
  use App\Models\blok;
  use App\Models\lantai;
@endphp

@section('page')
    Detail Data Pembayaran
@endsection

@section('css')
    <!-- Sweet Alert css -->
    <link href="{{ asset('lib/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- Select2 --}}
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- form Uploads -->
    <link href="{{ asset('lib/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('name')
  GreenHouse
@endsection

@section('pembayaran')
  active
@endsection

@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Detail Data Pembayaran</h3>

    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class="form">
            <form class="cmxform form-horizontal style-form" enctype="multipart/form-data" id="commentForm" method="post" action="/editpembayaran/{{ $pembayaran->id_pembayaran }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="form-group ">
                <label for="id_penghuni" class="control-label col-lg-2">Pilih Penghuni</label>
                <div class="col-lg-10">
                  <input class="form-control" name="penghuni_id" id="penghuni_id" value="{{ Penghuni::where('id_penghuni',$pembayaran->penghuni_id)->first()->nama }}" readonly>
                </div>
              </div>
              <div class="form-group ">
                <label for="id_kamar" class="control-label col-lg-2">Pilih Kamar</label>
                <div class="col-lg-10">
                  @php
                    $id_kamar = Mapping::where('id_penghuni', $pembayaran->penghuni_id)->first()->id_kamar;
                    $k = Kamar::where('id_kamar', $id_kamar)->first();
                    $blok = blok::where('id_blok', $k['blok_id'])->first()->namaBlok;
                    $lantai = lantai::where('id_lantai', $k['lantai_id'])->first()->namaLantai;
                    $namaKamar = "Blok ".$blok." kamar ".$k['namaKamar']." (lantai ".$lantai.") - Rp ".number_format($k['harga'], 2, ",", ".")."/bulan";
                  @endphp
                  <input class="form-control" name="kamar_id" id="kamar_id" value="{{ $namaKamar }}" disabled>
                </div>
              </div>
              <div class="form-group">
                <label for="tagihan" class="control-label col-lg-2">Periode Pembayaran</label>
                <div id="tagihan">
                  <div class="col-lg-10" >
                    @php
                      $i=0;
                    @endphp
                    <input class="hidden" name="penghuni_id" value="{{ $pembayaran->penghuni_id }}">
                    @foreach ($pembayarandets as $det)
                      @php
                        $i++;
                        $bulan = date("F", mktime(null, null, null, $det['bulan']));;
                        $tahun = date('Y', strtotime($det['tahun']));
                      @endphp
                      <div class="row col-lg-10">
                        <label><input value="{{ $det->id }}" type="checkbox" name="tagihan{{ $i }}" checked disabled>{{ $bulan }} {{ $tahun }}</label>
                      </div>
                    @endforeach
                    <input type="hidden" value="{{ $i }}" name="ii">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2">Tanggal Pembayaran</label>
                <div class="col-lg-10">
                  <div data-date-viewmode="years" data-date-format="Y-m-d">
                    <input name="tglPembayaran" type="text" size="16" class="form-control" value="{{ $pembayaran->tglPembayaran }}" placeholder="YYYY-MM-DD" id="tglPembayaran" data-date-format='yyyy-mm-dd' autocomplete="off" required/>
                  </div>
                </div>
              </div>
              <div class="form-group ">
                <label for="jumlahBayar" class="control-label col-lg-2">Jumlah Pembayaran</label>
                <div class="col-lg-10">
                  <input class="form-control number" id="jumlahBayar" name="jumlahBayar" type="text" value="{{ $pembayaran->jumlahBayar }}" placeholder='Masukan Jumlah Pembayaran' required/>
                </div>
              </div>
              <div class="form-group">
                <label for="metode" class="control-label col-lg-2">Metode Pembayaran</label>
                <div class="col-lg-10">
                  <select name="metode" id="metode" class="form-control select2" parsley-trigger="change" onchange="changeMethod(this.value)">
                    @isset($pembayaran->metode)
                      <option value="#" disabled>-- Pilih Metode Pembayaran --</option>
                      @if($pembayaran->metode == "transfer")
                        <option value="transfer" selected>Transfer</option>
                        <option value="tunai">Tunai</option>
                      @elseif($pembayaran->metode == "tunai")
                        <option value="transfer">Transfer</option>
                        <option value="tunai" selected>Tunai</option>
                      @endif
                    @else
                      <option disabled selected>-- Pilih Metode Pembayaran --</option>
                      <option value="transfer">Transfer</option>
                      <option value="tunai">Tunai</option>
                    @endisset
                  </select>
                </div>
              </div>
              @if($pembayaran->metode == "transfer")
              <div id="bukti_show" style="display:block">
                <div class="form-group row">
                    <label class="control-label col-lg-2">Upload bukti</label>
                    <div class="col-md-9">
                        <input type="file" class="dropify" data-height="100" name="buktitf" id="buktitf" data-default-file="@isset($pembayaran->buktiBayar){{ asset('images/bukti/'.$pembayaran->buktiBayar) }}@endisset">
                    </div>
                </div>
              </div>
              @else
              <div id="bukti_show" style="display:none">
                <div class="form-group row">
                    <label class="control-label col-lg-2">Upload bukti</label>
                    <div class="col-md-9">
                        @php
                            if(!empty($pembayaran->buktiBayar)){
                                $source = $pembayaran->buktiBayar;
                            }else{
                                $source = "noimage.jpg";
                            }
                        @endphp
                        <input type="file" class="dropify" data-height="100" name="buktitf" id="buktitf" data-default-file="@isset($pembayaran->buktiBayar){{ asset('images/bukti/'.$pembayaran->buktiBayar) }}@endisset">
                    </div>
                </div>
              </div>
              @endif
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-theme" type="submit">Simpan</button>
            </form>
            <form action="/hapuspembayaran/{{ $thn }}/{{ $bln }}/{{ $pembayaran->id_pembayaran }}" method="post">
              {{ csrf_field() }}
              {{ method_field('delete') }}
              <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
                </div>
              </div>
            </div>
          </div>
        <!-- /form-panel -->
        </div>
      <!-- /col-lg-12 -->
      </div>
  </section>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
@endsection

@section('js')
  <script src="{{ asset('lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{ asset('lib/number-divider.min.js') }}"></script>
  <!-- Sweet Alert Js  -->
  <script src="{{ asset('lib/sweet-alert/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
  <!-- file uploads js -->
  <script src="{{ asset('lib/fileuploads/js/dropify.min.js') }}"></script>
@endsection

@section('script-js')
  <script type="text/javascript">
    $(document).ready(function () {
      $(".number").divide();

      // Select2
      $(".select2").select2();

      $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (1M max).'
            }
      });
    });
    function change(id){
      changeTagihan(id);
      changeKamar(id);
    }

    function changeMethod(id){
      console.log(id);
      if(id == 'transfer'){
            document.getElementById("bukti_show").style.display = 'block';
      }else{
            document.getElementById("bukti_show").style.display = 'none';
      }
    }

    function changeKamar(id){
      $.ajax({
        url       :   "{{ route('ajaxGetKamar')}}",
        data      : {
                      id_peng : id,
                    },
        type		  :	"GET",
        success		:	function(data){
                    $("#kamar_id").val(data)
                    console.log(data);
                    // $('#responsive-datatable').DataTable();
                  }
            });
      }

      function changeTagihan(id){
        console.log(id)
        $.ajax({
        url       :   "{{ route('ajxGetTagihan')}}",
        data      : {
                      penghuni : id,
                    },
        type		  :	"GET",
        dataType  : "html",
        success		:	function(data){
                    $("#tagihan").html(data);
                    console.log(data);
                  },
        error     :   function(data){
                    document.getElementById('lamaKontrak').value = 'yayaya';
                  }
            });
      }

      function changeKeluar(id){
        var lama = $("#lamaKontrak").val()
        $.ajax({
        url       :   "{{ route('ajxGetKeluar')}}",
        data      : {
                      msk : id,
                      lamaKontrak : lama,
                    },
        type		  :	"GET",
        success		:	function(data){
                    $("#keluar").val(data)
                    console.log(data);
                    // $('#responsive-datatable').DataTable();
                  }
            });
      }

      function deleteBayar(id){
        console.log(id)
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
        url       :   "{{ route('ajxDelete')}}",
        data      : {
                      id : id,
                      _token : token,
                    },
        type		  :	"post",
        success		:	function(data){
                    console.log(data);
                    // $('#responsive-datatable').DataTable();
                  }
            });
      }

      function deletePembayaran(id){
        console.log(id)
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger m-l-10',
          buttonsStyling: false
        }).then(function () {
              $.ajax({
                  url: "/hapuspembayaran/"+id,
                  type: 'delete',
                  data: {
                      "id": id,
                      "_token": token,
                  },
              }).done(function (data) {
                  swal(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                  )
                  location.reload();
              }).fail(function (msg) {
                  swal(
                      'Failed',
                      'Your imaginary file is safe :)',
                      'error'
                  )
              });

        }, function (dismiss) {
              // dismiss can be 'cancel', 'overlay',
              // 'close', and 'timer'
          if (dismiss === 'cancel') {
            console.log("eh ga kehapus");
            swal(
              'Cancelled',
              'Your imaginary file is safe :)',
              'error'
            )
          }
        })
      }
  </script>
@endsection
