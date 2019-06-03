@extends('layout.dashboard')

@section('page')
    Daftar Jaminan Kunci
@endsection

@section('name')
  GreenHouse
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
      <div class="col-md-12">
        <div class="content-panel">
          <hr>
          <table class="table">
            <thead>
              <tr>
                <th width="10%">#</th>
                <th width="30%">Nama Penghuni</th>
                <th width="50%">Jaminan</th>
                <th width="10%"></th>
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
                    <a href="/editjaminankunci/{{ $jaminankunci->id_jaminankunci}}"><button class="btn btn-primary btn-block btn-xs"><i class="fa fa-pencil"> Update</i></button></a>
                    <form class="" action="/hapusjaminankunci/{{ $jaminankunci->id_jaminankunci }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-block btn-xs"><i class="fa fa-trash-o "> Hapus</i></button></a>
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
