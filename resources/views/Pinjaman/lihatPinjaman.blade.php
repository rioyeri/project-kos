@extends('layout.dashboard')

@section('page')
    Lihat Pinjaman
@endsection

@section('name')
  GreenHouse
@endsection

@section('pinjaman')
  active
@endsection

@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Tabel Data Pinjaman</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
          <hr>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Peminjam</th>
                <th>Jumlah (Rp)</th>
                <th>Tanggal Pinjam</th>
                <th>Keterangan</th>
                <th>Jumlah Kembali</th>
                <th>Tanggal Pengembalian</th>
                <th>Status Peminjaman</th>
              </tr>
            </thead>
            <tbody>
              @php ($i=0)
              @foreach ($pinjamans as $pinjaman)
                <tr>
                  @php ($i++)
                  <td>{{ $i }}</td>
                  <td>{{ $pinjaman->namaPeminjam }}</td>
                  <td>{{ $pinjaman->jumlah }}</td>
                  <td>{{ $pinjaman->tglPinjam }}</td>
                  <td>{{ $pinjaman->keterangan }}</td>
                  <td>{{ $pinjaman->jmlKembali }}</td>
                  <td>{{ $pinjaman->tglKembali }}</td>
                  <td>{{ $pinjaman->statusPinjaman }}</td>
                  <td>
                    <form class="" action="/hapuspinjaman/{{ $pinjaman->id_pinjaman }}" method="post">
                      <a href="/bayarpinjaman/{{ $pinjaman->id_pinjaman}}"><button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>
                      <a href="/editpinjaman/{{ $pinjaman->id_pinjaman}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
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
