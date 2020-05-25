@extends('layout.dashboard')

@section('page')
    Tambahkan Data Pembayaran
@endsection

@section('css')
  <link href="{{ asset('lib/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- form Uploads -->
  <link href="{{ asset('lib/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
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
  use App\Models\lantai;
  use App\Models\blok;
@endphp
<!--main content start-->

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Tambahkan Data Pembayaran</h3>

    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class=" form">
            <form class="cmxform form-horizontal style-form" enctype="multipart/form-data" id="commentForm" method="post" action="/tambahpembayaran">
              {{ csrf_field() }}
              <div class="form-group ">
                <label for="id_penghuni" class="control-label col-lg-2">Pilih Penghuni</label>
                <div class="col-lg-10">
                  <select name="penghuni_id" id="penghuni" class="form-control select2" parsley-trigger="change" onchange="change(this.value)">
                    <option disabled selected>-- Pilih Nama Penghuni --</option>
                    @foreach ($penghunis as $penghuni)
                      <option value="{{ $penghuni->id_penghuni }}"> {{ $penghuni->nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label for="id_kamar" class="control-label col-lg-2">Pilih Kamar</label>
                <div class="col-lg-10">
                  <select name="kamar_id" class="form-control" id="kamar_id" disabled>
                    <option disabled selected>-- Pilih Nama Kamar --</option>
                    @foreach ($kamars as $kamar)
                      @php
                        $k = Kamar::where('id_kamar', $kamar->id_kamar)->first();
                        $blok = blok::where('id_blok', $k['blok_id'])->first()->namaBlok;
                        $lantai = lantai::where('id_lantai', $k['lantai_id'])->first()->namaLantai;
                        $namaKamar = "Blok ".$blok." kamar ".$k['namaKamar']." (lantai ".$lantai.") - Rp ".number_format($k['harga'], 2, ",", ".")."/bulan";
                      @endphp
                      <option value="{{ $kamar->id_kamar }}"> {{ $namaKamar }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div id="tagihan"></div>

              <div class="form-group">
                <label class="control-label col-lg-2">Tanggal Pembayaran</label>
                  <div class="col-lg-10">
                    <div data-date-viewmode="years" data-date-format="Y-m-d">
                      <input name="tglPembayaran" type="text" size="16" class="form-control" placeholder="YYYY-MM-DD" id="tglPembayaran" data-date-format='yyyy-mm-dd' autocomplete="off" required/>
                    </div>
                  <span class="help-block">Pilih Tanggal Pembayaran</span>
                </div>
              </div>

              <div class="form-group ">
                <label for="metode" class="control-label col-lg-2">Metode Pembayaran</label>
                <div class="col-lg-10">
                  <select name="metode" id="metode" class="form-control select2" parsley-trigger="change" onchange="changeMethod(this.value)">
                    <option disabled selected>-- Pilih Metode Pembayaran --</option>
                    <option value="transfer">Transfer</option>
                    <option value="tunai">Tunai</option>
                  </select>
                </div>
              </div>

              <div id="bukti_show" style="display:none">
                {{-- <div class="form-group">
                  <label class="control-label col-lg-2">Upload Bukti Pembayaran</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                          <input type="file" id="buktiBayar" name="buktiBayar">
                            @if($errors->has('buktiBayar'))
                              <span class="help-block">
                                <strong>{{ $errors->first('buktiBayar') }}</strong>
                              </span>
                            @endif
                      </span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div> --}}
                <div class="form-group row">
                  <label class="control-label col-lg-2">Upload bukti</label>
                  <div class="col-md-9">
                      <input type="file" class="dropify" data-height="100" name="buktitf" id="buktitf" data-default-file="{{ asset('bukti/') }}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-theme" type="submit">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /form-panel -->
      </div>
      <!-- /col-lg-12 -->
    </div>
    </form>
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
  <script src="{{ asset('lib/advanced-form-components.js')}}"></script>
  <script src="{{ asset('lib/number-divider.min.js') }}"></script>
  <script src="{{ asset('lib/select2/js/select2.min.js') }}" type="text/javascript"></script>
  <!-- file uploads js -->
  <script src="{{ asset('lib/fileuploads/js/dropify.min.js') }}"></script>
  <script>
    jQuery('#tglPembayaran').datepicker();
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
                    document.getElementById('buktiBayar').value = 'yayaya';
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

      function changeMethod(id){
        // console.log(id)
        if(id == 'transfer'){
            document.getElementById("bukti_show").style.display = 'block';
        }else{
            document.getElementById("bukti_show").style.display = 'none';
        }
      }
  </script>
@endsection
