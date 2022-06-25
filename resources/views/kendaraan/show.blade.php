@extends('layouts.core')

@section('content')
  <div class="row">
    <div class="col-md-3">
      <div class="card shadow mb-4">
        @if ($kendaraan->blob_gambar)
          <img class="img-preview rounded" src="{{ url('storage/image_preview.png') }}">
        @else
          <img class="img-preview rounded" src="{{ asset('assets/img/no_image.png') }}">
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mb-4 px-3 py-3">
        <div class="card-header py-3">
          <h3 class="card-title mb-0">Deskripsi</h3>
        </div>
        <div class=" card-body table-responsive text-nowrap">
          <table class="table table-bordered">
            <tbody class="table-border-bottom-0" id="table_kendaraan">
              <tr>
                <td style="width: 1px;"><strong>Nopol</strong></td>
                <td>{{ $kendaraan->nopol }}</td>
              </tr>
              <tr>
                <td><strong>Merk</strong></td>
                <td>{{ $kendaraan->merk }}</td>
              </tr>
              <tr>
                <td><strong>Tipe</strong></td>
                <td>{{ $kendaraan->tipe }}</td>
              </tr>
              <tr>
                <td><strong>Tahun Keluaran</strong></td>
                <td>{{ $kendaraan->tahun_keluaran }}</td>
              </tr>
              <tr>
                <td><strong>STNK</strong></td>
                <td>
                  @if ($kendaraan->stnk)
                    <span class="badge bg-success">Ada</span>
                  @else
                    <span class="badge bg-secondary">Tidak ada</span>
                  @endif
                </td>
              </tr>
              <tr>
                <td><strong>No STNK</strong></td>
                <td>{{ $kendaraan->no_stnk }}</td>
              </tr>
              <tr>
                <td><strong>BPKB</strong></td>
                <td>
                  @if ($kendaraan->bpkb)
                    <span class="badge bg-success">Ada</span>
                  @else
                    <span class="badge bg-secondary">Tidak ada</span>
                  @endif
                </td>
              </tr>
              <tr>
                <td><strong>No BPKB</strong></td>
                <td>{{ $kendaraan->no_bpkb }}</td>
              </tr>
              <tr>
                <td><strong>Kategori</strong></td>
                <td>{{ $kendaraan->kategori->nama_kategori }}</td>
              </tr>
              <tr>
                <td><strong>Department</strong></td>
                <td>{{ $kendaraan->department->nama_department }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card mb-4">
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-disabled">
            Opsi
          </li>
          <li class="list-group-item dropdown-item">
            <a href="{{ route('kendaraan.edit', $kendaraan) }}"><span><i class="bx bx-edit"></i></span>&nbsp;&nbsp;
              Edit data</a>
          </li>
          <li class="list-group-item dropdown-item">
            <form action="{{ route('kendaraan.destroy', $kendaraan) }}" method="POST">
              @method('DELETE')
              @csrf
              <Button class="btn btn-link text-danger m-0 p-0" onclick="return confirm('Apakah anda yakin?')">
                <span><i class="bx bx-trash"></i></span>&nbsp;&nbsp; Hapus data
              </Button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
@endsection
