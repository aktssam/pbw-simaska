@extends('layouts.core')

@section('content')
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <h5 class="mb-0 card-header">Edit department</h5>
        <div class="card-body">

          <form action="{{ route('department.update', $department) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="kode_department">
                Kode Kategori</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <input type="text" class="form-control @error('kode_department') is-invalid @enderror"
                    id="kode_department" name="kode_department" placeholder="KR02" required
                    value="{{ $department->kode_department }}" />
                </div>
                @error('kode_department')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="nama_department">Nama department</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <input type="text" class="form-control @error('nama_department') is-invalid @enderror"
                    id="nama_department" name="nama_department" placeholder="Sepeda Motor" required
                    value="{{ $department->nama_department }}" />
                </div>
                @error('nama_department')
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
