@extends('layout.dashboard')

@section('page')
    Daftar Penghuni
@endsection

@section('name')
  GreenHouse
@endsection

@section('penghuni')
  active
@endsection

@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Daftar Penghuni</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
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
          <hr>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>No KTP</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Pekerjaan</th>
                <th>Alamat Asli</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @php ($i = 0)
              @foreach ($penghunis as $penghuni)
                <tr>
                  @php ($i++)
                  <td>{{ $i }}</td>
                  <td>{{ $penghuni->noKTP }}</td>
                  <td>{{ $penghuni->nama }}</td>
                  <td>{{ $penghuni->jenisKelamin }}</td>
                  <td>{{ $penghuni->tempatLahir }}</td>
                  <td>{{ $penghuni->tanggalLahir }}</td>
                  <td>{{ $penghuni->pekerjaan }}</td>
                  <td>{{ $penghuni->alamatAsli }}</td>
                  <td>{{ $penghuni->tglMasuk }}</td>
                  <td>{{ $penghuni->tglKeluar }}</td>
                  <td>
                    <a href="/editpenghuni/{{ $penghuni->id_penghuni}}"><button class="btn btn-primary btn-block btn-sm"><i class="fa fa-pencil"> Update</i></button></a>
                    <form class="" action="/hapuspenghuni/{{ $penghuni->id_penghuni }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-block btn-sm"><i class="fa fa-trash-o "> Hapus</i></button></a>
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
