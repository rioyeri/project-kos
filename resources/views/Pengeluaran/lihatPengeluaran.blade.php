@extends('layout.dashboard')

@section('page')
    Daftar Pengeluaran
@endsection

@section('name')
  GreenHouse
@endsection

@section('pengeluaran')
  active
@endsection

@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Tabel Data Pengeluaran</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
          <hr>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Penanggungjawab</th>
                <th>Jumlah (Rp)</th>
                <th>Tanggal Dana Keluar</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              @php ($i=0)
              @foreach ($pengeluarans as $pengeluaran)
                <tr>
                  @php ($i++)
                  <td>{{ $i }}</td>
                  <td>{{ $pengeluaran->namaPJ }}</td>
                  <td>{{ $pengeluaran->jumlah }}</td>
                  <td>{{ $pengeluaran->tanggal }}</td>
                  <td>{{ $pengeluaran->keterangan }}</td>
                  <td>
                    <a href="/editpengeluaran/{{ $pengeluaran->id_pengeluaran}}"><button class="btn btn-primary btn-block btn-xs"><i class="fa fa-pencil"></i> Edit</button></a>
                    <form class="" action="/hapuspengeluaran/{{ $pengeluaran->id_pengeluaran }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-block btn-xs"><i class="fa fa-trash-o "></i> Hapus</button></a>
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
