@extends('layouts.core')

@section('content')
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <h5 class="mb-0 card-header">Edit Kategori</h5>
        <div class="card-body">

          <form action="{{ route('kategori.update', $kategori) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="kode_kategori">
                Kode Kategori</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <input type="text" class="form-control @error('kode_kategori') is-invalid @enderror"
                    id="kode_kategori" name="kode_kategori" placeholder="KR02" required
                    value="{{ $kategori->kode_kategori }}" />
                </div>
                @error('kode_kategori')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="nama_kategori">Kategori
                Kendaraan</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                    id="nama_kategori" name="nama_kategori" placeholder="Sepeda Motor" required
                    value="{{ $kategori->nama_kategori }}" />
                </div>
                @error('nama_kategori')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
