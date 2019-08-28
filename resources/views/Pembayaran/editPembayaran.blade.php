@extends('layout.dashboard')

@section('page')
    Detail Data Pembayaran
@endsection

@section('css')
    <!-- Sweet Alert css -->
    <link href="{{ asset('lib/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('name')
  GreenHouse
@endsection

@section('pembayaran')
  active
@endsection

@section('content')
<!--main content start-->
@php
  use App\Models\Mapping;
  use App\Models\Pembayarandets;
  use App\Models\Penghuni;
  use App\Models\Kamar;
@endphp
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
                <div class="col-lg-5">
                  <input class="form-control" name="penghuni_id" id="penghuni_id" value="{{ Penghuni::where('id_penghuni',$pembayaran->penghuni_id)->first()->nama }}" readonly>
                </div>
              </div>
              <div class="form-group ">
                <label for="id_kamar" class="control-label col-lg-2">Pilih Kamar</label>
                <div class="col-lg-5">
                  @php
                    $id_kamar = Mapping::where('id_penghuni', $pembayaran->penghuni_id)->first()->id_kamar;
                    $namakamar = Kamar::where('id_kamar', $id_kamar)->first()->namaKamar;
                  @endphp
                  <input class="form-control" name="kamar_id" id="kamar_id" value="{{ $namakamar }}" disabled>
                </div>
              </div>
              <div class="form-group">
                <label for="tagihan" class="control-label col-lg-2">Periode Pembayaran</label>
                <div class="col-lg-5" id="tagihan">
                  <div class="col-lg-10" >
                    @php
                      $i=0;
                    @endphp
                    <input class="hidden" name="penghuni_id" value="{{ $pembayaran->penghuni_id }}">
                    @php
                      $bulan = date("F", mktime(null, null, null, $pembayarandets->bulan));;
                      $tahun = date('Y', strtotime($pembayarandets->tahun));
                    @endphp
                    <div class="row">
                      @php($i++)
                      <label><input value="{{ $pembayarandets->id }}" type="checkbox" checked disabled name="tagihan{{ $i }}">{{ $bulan }} {{ $tahun }}</label>
                    </div>
                    <input type="hidden" value="{{ $i }}" name="ii">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2">Tanggal Pembayaran</label>
                <div class="col-lg-5">
                  <div data-date-viewmode="years" data-date-format="Y-m-d">
                    <input name="tglPembayaran" type="date" size="16" class="form-control" value="{{ $pembayaran->tglPembayaran }}" placeholder="YYYY-MM-DD" id="tglPembayaran" data-date-format='yyyy-mm-dd' autocomplete="off" required/>
                  </div>
                </div>
              </div>
              <div class="form-group ">
                <label for="jumlahBayar" class="control-label col-lg-2">Jumlah Pembayaran</label>
                <div class="col-lg-5">
                  <input class="form-control number" id="jumlahBayar" name="jumlahBayar" type="text" value="{{ $pembayaran->jumlahBayar }}" placeholder='Masukan Jumlah Pembayaran' required/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2">Upload Bukti Pembayaran</label>
                <div class="controls col-md-9">
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                    @if(empty($pembayaran->buktiBayar))
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" id="buktiBayar" name="buktiBayar" />
                          @if($errors->has('buktiBayar'))
                            <span class="help-block">
                              <strong>{{ $errors->first('buktiBayar') }}</strong>
                            </span>
                          @endif
                      </span>
                    @elseif(!empty($pembayaran->buktiBayar))
                      <img src="{{ asset('storage/'.$pembayaran->buktiBayar) }}"  alt="user-img" class="img-thumbnail img-responsive photo">
                      <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-undo"></i> Change</span>
                          <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                          <input type="file" id="buktiBayar" name="buktiBayar" />
                            @if($errors->has('buktiBayar'))
                              <span class="help-block">
                                <strong>{{ $errors->first('buktiBayar') }}</strong>
                              </span>
                            @endif
                        </span>
                    @endif
                    <span class="fileupload-preview" style="margin-left:5px;"></span>
                    <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                  </div>
                </div>
              </div>
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
@endsection

@section('script-js')
  <script type="text/javascript">
    $(".number").divide();

    function change(id){
      changeTagihan(id);
      changeKamar(id);
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
        // var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
        url       :   "{{ route('ajxDelete')}}",
        data      : {
                      id : id,
                      _token = token,
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
