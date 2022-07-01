@extends('layouts.core')

@section('title', 'Edit Kendaraan')

@section('content')
  <form action="{{ route('kendaraan.update', $kendaraan) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Data Kendaraan</h5>
          </div>
          <div class="card-body">
            {{-- NOPOL --}}
            <div class="mb-3">
              <label class="form-label" for="nopol">No Polisi</label>
              <input type="text" class="form-control" id="nopol" name="nopol" placeholder="A 1234 BC"
                value="{{ $kendaraan->nopol }}" required autofocus />
            </div>

            {{-- MEREK --}}
            <div class="mb-3">
              <label class="form-label" for="merk">Merek</label>
              <input type="text" class="form-control" id="merk" name="merk" placeholder="Merek kendaraan"
                value="{{ $kendaraan->merk }}" required />
              <div class="form-text">contoh: Honda, Toyota, Yamaha, Daihatsu, dll</div>
            </div>

            <div class="mb-3">
              <label class="form-label" for="tipe">Tipe</label>
              <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Tipe kendaraan"
                value="{{ $kendaraan->tipe }}" required />
            </div>

            <div class="mb-3">
              <label class="form-label" for="tahun_keluaran">Tahun Keluaran</label>
              <input type="number" class="form-control" id="tahun_keluaran" name="tahun_keluaran"
                placeholder="Tahun Keluaran" value="{{ $kendaraan->tahun_keluaran }}" required />
            </div>

            <div class="mb-3">
              <label class="form-label" for="no_stnk">Nomor STNK</label>
              <input type="text" class="form-control" id="no_stnk" name="no_stnk" placeholder="ABCD1234567"
                value="{{ $kendaraan->no_stnk }}" />
              <div class="form-text">(optional) jika ada</div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="no_bpkb">Nomor BPKB</label>
              <input type="text" class="form-control" id="no_bpkb" name="no_bpkb" placeholder="ABCD1234567"
                value="{{ $kendaraan->no_bpkb }}" />
              <div class="form-text">(optional) jika ada</div>
            </div>

            <div class="mb-3">
              <label class="form-label" for="kategori_id">Kategori Kendaraan</label>
              <select class="form-select" id="kategori_id" name="kategori_id" required>
                <option>Pilih kategori...</option>
                @foreach ($kategori as $ktg)
                  <option value="{{ $ktg->id }}" {{ $kendaraan->kategori_id == $ktg->id ? 'selected' : '' }}>
                    {{ $ktg->nama_kategori }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label" for="department_id">Department</label>
              <select class="form-select" id="department_id" name="department_id" required>
                <option>Pilih department...</option>
                @foreach ($department as $dpt)
                  <option value="{{ $dpt->id }}" {{ $kendaraan->department_id == $dpt->id ? 'selected' : '' }}>
                    {{ $dpt->nama_department }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          {{-- <img class="card-img-top img-preview" src="../assets/img/elements/2.jpg"> --}}

          @if ($kendaraan->blob_gambar)
            <img class="card-img-top img-preview rounded" src="{{ url('storage/image_preview.png') }}">
          @else
            <img class="card-img-top img-preview rounded" src="{{ asset('assets/img/no_image.png') }}">
          @endif
          <div class="card-body">
            <div class="mb-3">
              <label for="blob_gambar" class="form-label">(optional) upload foto kendaraan</label>
              <input class="form-control @error('blob_gambar') is-invalid @enderror" type="file" accept="image/*"
                id="blob_gambar" name="blob_gambar" onchange="previewimg()">
              <small class="form-text @error('blob_gambar') text-danger @enderror">
                @if ($errors->isNotEmpty())
                  @error('blob_gambar')
                    {{ $message }}
                  @enderror
                @else
                  Format jpg/jpeg/png < 500KB @endif
              </small>

              @error('blob_gambar')
                <small class="form-text text-danger"></small>
              @enderror


            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script>
    function previewimg() {
      const image = document.querySelector("input#blob_gambar");
      const preview = document.querySelector(".img-preview");

      //   preview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        preview.src = oFREvent.target.result;
      }
    }
  </script>
@endsection
