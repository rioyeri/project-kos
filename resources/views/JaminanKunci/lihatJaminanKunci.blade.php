@extends('layout.dashboard')

@section('page')
    Lihat Pembayaran
@endsection

@section('name')
  Kos Ulfa
@endsection

@section('jaminankunci')
  active
@endsection

@section('content')
@php
  use App\Models\Penghuni;
@endphp
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Tabel Data Jaminan Kunci</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
          <hr>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Penghuni</th>
                <th>Jaminan</th>
              </tr>
            </thead>
            <tbody>
              @php ($i=0)
              @foreach ($jaminankuncis as $jaminankunci)
                <tr>
                  @php ($i++)
                  <td>{{ $i }}</td>
                  <td>{{ Penghuni::where('id_penghuni', $jaminankunci->penghuni_id)->first()->nama}}</td>
                  <td>{{ $jaminankunci->jaminan }}</td>
                  <td>
                    <a href="/editjaminankunci/{{ $jaminankunci->id_jaminankunci}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                    <form class="" action="/hapusjaminankunci/{{ $jaminankunci->id_jaminankunci }}" method="post">
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
