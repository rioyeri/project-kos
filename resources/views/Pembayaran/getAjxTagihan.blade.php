@php
  $i=0;
@endphp
<div class="form-group">
  <label for="tagihan" class="control-label col-lg-2">Tagihan Pembayaran</label>
  <div class="col-lg-10" >
    @foreach ($pembayarandets as $det)
      @php
        $i++;
        $bulan = date("F", mktime(null, null, null, $det->bulan));;
        $tahun = date('Y', strtotime($det->tahun));
      @endphp
      <div class="row col-lg-10">
        <label><input value="{{ $det->id }}" id="tagihan{{ $i }}" type="checkbox" parsley-trigger="change" onclick="changeHarga(this.value,this.id)" name="tagihan{{ $i }}"> {{ $bulan }} {{ $tahun }}</label>
      </div>
    @endforeach
  </div>
</div>
<input type="hidden" value="{{ $i }}" name="ii">

<div class="form-group ">
  <label for="jumlahBayar" class="control-label col-lg-2">Jumlah Pembayaran</label>
  <div class="col-lg-10">
      <input class="form-control" id="number" name="jumlahBayar" type="text" placeholder='Masukan Jumlah Pembayaran' value="0" required/>
  </div>
</div>

<script>
  $("#number").divide();
  function changeHarga(detid,id){
    var checkBox = document.getElementById(id)
    var jml = $("#number").val()
    if(checkBox.checked == true){
      var checked = 1
    }else{
      var checked = 0
    }
      $.ajax({
        url       :   "{{ route('ajxGetHarga')}}",
        data      : {
                      det_id : detid,
                      jumlah : jml,
                      check : checked,
                    },
        type		  :	"GET",
        success		:	function(data){
                    $("#number").val(data)
                    console.log(data);
                    // $('#responsive-datatable').DataTable();
                  }
            });
  }

  function calc(){
    var ii = $("#ii").val()
    for(i=0; i < ii; i++){
      var tagihan = "tagihan"+ii
      if (document.getElementById('').checked){
        document.getElementById('totalCost').value = 10;
      }else {
        calculate();
      }
    }
  }
</script>
