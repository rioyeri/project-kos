<select name="kamar_id" class="form-control">
    <option disabled>-- Pilih Nama Kamar --</option>
    @foreach ($kamars as $kamar)
      @if ($kamar->id_kamar == $getKamar->id_kamar)
        <option value="{{ $kamar->id_kamar }}" selected> {{ $kamar->namaKamar }}</option>
      @else
        <option value="{{ $kamar->id_kamar }}"> {{ $kamar->namaKamar }}</option>
      @endif
    @endforeach
  </select>
