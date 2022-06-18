@extends('layouts.core')

@section('content')
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <h5 class="mb-0 card-header">Tambah Kategori</h5>
        <div class="card-body">

          <form action="{{ route('kategori.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="kode_kategori">
                Kode Kategori</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <input type="text" class="form-control @error('kode_kategori') is-invalid @enderror"
                    id="kode_kategori" name="kode_kategori" placeholder="KR02" required />
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
                  <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                    placeholder="Sepeda Motor" required />
                </div>
              </div>
            </div>

            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
