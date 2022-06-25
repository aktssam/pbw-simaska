@extends('layouts.core')

@section('title', 'Dashboard')

@section('content')
  <div class="row">
    <div class="col-lg-8 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">Welcome, {{ Auth::user()->name }} 👋</h5>
              <p class="mb-4">
                Selamat datang di <span class="fw-bold">Simaska</span>, Aplikasi sistem manajemen aset kendaraan berbasis
                website
              </p>
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="./assets/img/illustrations/man-with-laptop-light.png" height="132" alt="View Badge User"
                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                data-app-light-img="illustrations/man-with-laptop-light.png" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class=" col-md-4 order-1">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <a href="{{ route('kendaraan.index') }}">
                    <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-car"></i></span></a>
                </div>

              </div>
              <span class="d-block">Kendaraan</span>
              <h3 class="card-title text-nowrap mb-1">{{ $counted_kendaraan }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <a href="{{ route('department.index') }}">
                    <span class="avatar-initial rounded bg-label-success"><i class="bx bx-buildings"></i></span>
                  </a>
                </div>
              </div>
              <span class="d-block">Department</span>
              <h3 class="card-title text-nowrap mb-1">{{ $counted_department }}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
