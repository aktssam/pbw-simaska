@extends('layouts.core')

@section('title', 'Data Departemen')

@section('content')
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> department</h4>

  @if (session('success'))
    <div class="alert alert-primary alert-dismissible" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if (session('warning'))
    <div class="alert alert-warning alert-dismissible" role="alert">
      {{ session('warning') }}
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
      <a href="{{ route('department.create') }}" class="btn btn-primary"><span
          class="tf-icons bx bx-plus-circle"></span>&nbsp; Tambah data </a>
    </div>

    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Nama Department</th>
            <th>Timestamp</th>
            <th><i class="bx bx-info-circle"></i></th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($department as $dpt)
            <tr>
              <td style="width: 1px;">{{ $loop->index + 1 }}</td>
              <td><strong>{{ $dpt->kode_department }}</strong></td>
              <td>{{ $dpt->nama_department }}</td>
              <td>{{ $dpt->created_at }}</td>
              <td style="width: 100px;">
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('department.edit', $dpt) }}"><i
                        class="bx bx-edit-alt me-1"></i>
                      Edit</a>
                    <form action="{{ route('department.destroy', $dpt) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button class="dropdown-item text-danger" onclick="return confirm('Apakah anda yakin?')">
                        <i class="bx bx-trash me-1"></i>
                        Hapus
                      </button>
                    </form>
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
