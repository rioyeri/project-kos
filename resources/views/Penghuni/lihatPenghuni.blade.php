@extends('layout.dashboard')

@section('page')
    Lihat Penghuni
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
                    <a href="/editpenghuni/{{ $penghuni->id_penghuni}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                    <form class="" action="/hapuspenghuni/{{ $penghuni->id_penghuni }}" method="post">
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
