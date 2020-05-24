<div class="card-box">
  <div class="row">
    <div class="col-md-12">
      <h2>Penghuni : {{$penghuni->nama}}</h2>
      <p class="text-muted col-2 font-14 m-b-30">
        <a href="/penghuni/dokumen/{{$penghuni->id_penghuni}}/add" class="btn btn-theme waves-effect waves-light m-b-5">Tambah Dokumen</a>
      </p>
    </div>
    {{-- <table id="datatable" class="table table-bordered"> --}}
    <table id="datatable" class="table" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Jenis Dokumen</th>
          <th>Dokumen</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @php
          $i=0;
      @endphp
      @foreach ($dokumen as $d)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $d->jenis }}</td>
          <td>
            <a href="{{ asset('images/dokumen/'.$penghuni->nama.'/'.$d->dokumen) }}" class="image-popup">
              <img src="{{ asset('images/dokumen/'.$penghuni->nama.'/'.$d->dokumen) }}"  alt="user-img" title="{{ $d->dokumen }}" class="img-thumbnail img-responsive photo">
            </a>
          </td>
          <td>
            <form class="" action="/penghuni/dokumen/{{ $d->id }}/delete" method="post">
              {{ csrf_field() }}
              {{ method_field('delete') }}
                <button type="submit" class="btn btn-danger btn-block btn-sm"><i class="fa fa-trash-o ">Hapus</i></button></a>
            </form>
          </td>
        </tr>
        @php
          $i++;
        @endphp
      @endforeach
      </tbody>
    </table>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
      // Default Datatable
      $('#datatable').DataTable();

      $('.image-popup').magnificPopup({
          type: 'image',
      });
  });
</script>
