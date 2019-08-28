@php
    use App\Models\Mapping;
    use App\Models\Kamar;
    use App\Models\Penghuni;
    use App\Models\Pembayarandet;
    $bulan = date("F", mktime(null, null, null, $bln));;
@endphp
  <h3><i class="fa fa-angle-right"></i>Daftar Data Pembayaran di bulan {{ $bulan }} {{ $thn }}</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
          <table id="datatable" class="table">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th width="20%">Nama Penghuni</th>
                  <th width="10%">Kamar</th>
                  <th width="10%">Status</th>
                  <th width="10%">Detail</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i=0;
                @endphp
                  @foreach($pembayarandets as $pby)
                    <tr>
                      @php
                        $i++;
                        $mapping = Mapping::where('id_penghuni', $pby->id_penghuni)->first();
                        $kamar = Kamar::where('id_kamar', $mapping['id_kamar'])->first();
                        $penghuni = Penghuni::where('id_penghuni',$pby->id_penghuni)->first();
                        $bayar = Pembayarandet::where('tahun',$thn)->where('bulan',$bln)->where('id_penghuni',$pby->id_penghuni)->first();
                        if($bayar->status==0){
                          $stt = "Belum Terbayar";
                        }elseif($bayar->status==1){
                          $stt = "Sudah Terbayar";
                        }
                      @endphp
                      <td>{{ $i }}</td>
                      <td>{{ $penghuni['nama']}}</td>
                      <td>{{ $kamar['namaKamar'] }}</td>
                      <td>{{ $stt }}</td>
                      <td>
                        @if($bayar->status == 1)
                      <a href="/editpembayaran/{{ $bayar->tahun }}/{{ $bayar->bulan }}/{{ $pby->id_pembayaran }}">detail</a>
                        @endif
                      </td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
