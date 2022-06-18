@extends('layouts.core')

@section('content')
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> Departemen</h4>

  @if (session('success'))
    <div class="alert alert-primary alert-dismissible" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="card">
    <div class="card-header">
      <a href="{{ route('departemen.create') }}" class="btn btn-primary"><span
          class="tf-icons bx bx-plus-circle"></span>&nbsp; Tambah data </a>
    </div>

    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Nama Departemen</th>
            <th><i class="bx bx-info-circle"></i></th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($departemen as $dpt)
            <tr>
              <td style="width: 1px;">{{ $loop->index + 1 }}</td>
              <td><strong>{{ $dpt->kode_departemen }}</strong></td>
              <td>{{ $dpt->nama_departemen }}</td>
              <td style="width: 100px;">
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                      Edit</a>
                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                      Delete</a>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
@endsection
