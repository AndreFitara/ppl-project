@extends('templates.main')

@section('container')

<style>
  .card:hover {
    transform: scale(1.05);
  }

  .card {
    transition: transform 0.2s;
  }
</style>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active text-black" aria-current="page">Dashboard</li>
  </ol>
</nav>

<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card bg-body-tertiary text-center">
        <a href="/profile" style="text-decoration: none; color: inherit;" class="position-absolute end-0 m-2">Edit Profile</a>
        <div class="m-4">
          @if (auth()->user()->departemen->foto_profil == null)
          <img src="/showFile/private/profile_photo/default.jpg" alt="" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
          @else
          <img src="/showFile/{{ auth()->user()->departemen->foto_profil }}" alt="" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
          @endif
        </div>
        <div class="m-1">
          <div class="row">
            <h5><b>Departemen Informatika</b></h5>
          </div>
        </div>
        <hr>
        <p>Fakultas Sains dan Matematika</p>
      </div>
    </div>
  </div>

  <div class="row mt-4 justify-content-center">
    <div class="col-md-3">
      <a href="/pencarianProgressStudi" style="text-decoration: none">
        <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
          <h5><b>Pencarian Progress Studi Mahasiswa</b></h5>
          <i class="bi bi-search" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
    <div class="col-md-3">
      <a href="/rekapPKL" style="text-decoration: none">
        <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
          <h5><b>Rekap PKL Mahasiswa</b></h5>
          <i class="bi bi-person-walking text-secondary" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
  </div>
  <div class="row mt-2 justify-content-center">
    <div class="col-md-3">
      <a href="/rekapSkripsi" style="text-decoration: none">
        <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
          <h5><b>Rekap Skripsi Mahasiswa</b></h5>
          <i class="bi bi-mortarboard-fill text-danger" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
    <div class="col-md-3">
      <a href="/rekapStatus" style="text-decoration: none">
        <div class="card bg-body-tertiary justify-content-center d-flex align-items-center text-center py-2 h-100">
          <h5><b>Rekap Status Mahasiswa</b></h5>
          <i class="bi bi-wrench-adjustable-circle text-success" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
  </div>
</div>
</div>
</div>


@endsection