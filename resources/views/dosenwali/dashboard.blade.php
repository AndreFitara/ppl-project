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
        <a href="/profile" class="position-absolute end-0 m-2" style="text-decoration: none; color: inherit;">Edit Profile</a>
        <div class="m-4">
          @if (auth()->user()->dosen_wali->foto_profil == null)
          <img src="/showFile/private/profile_photo/default.jpg" alt="" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
          @else
          <img src="/showFile/{{ auth()->user()->dosen_wali->foto_profil }}" alt="" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
          @endif
        </div>
        <div class="m-1">
          <div class="row">
            <h5><b>{{ auth()->user()->dosen_wali->nama }}</b></h5>
          </div>
        </div>
        <hr>
        <p>NIP : {{ auth()->user()->dosen_wali->nip }}</p>
      </div>
    </div>
  </div>

  <div class="row mt-4 justify-content-center">
    <div class="col-md-6">
      <a href="/pencarianProgressStudiPerwalian" style="text-decoration: none">
        <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
          <h5><b>Pencarian Progress Studi Mahasiswa Perwalian</b></h5>
          <i class="bi bi-search" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
  </div>

  <div class="row mt-2 justify-content-center">
    <div class="col-md-6">
      <a href="/rekapMhsPerwalian" style="text-decoration: none">
        <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
          <h5><b>Rekap Mahasiswa Perwalian</b></h5>
          <i class="bi bi-person-lines-fill" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
  </div>

  <div class="row mt-2 justify-content-center">
    <div class="col-md-3">
      <a href="/irsPerwalian" style="text-decoration: none">
        <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
          <h5><b>IRS Mahasiswa Perwalian</b></h5>
          <i class="bi bi-file-earmark-bar-graph-fill text-primary" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
    <div class="col-md-3">
      <a href="/khsPerwalian" style="text-decoration: none">
        <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
          <h5><b>KHS Mahasiswa Perwalian</b></h5>
          <i class="bi bi-card-checklist text-success" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
  </div>

  <div class="row mt-2 justify-content-center">
    <div class="col-md-3">
      <a href="/pklPerwalian" style="text-decoration: none">
        <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
          <h5><b>PKL Mahasiswa Perwalian</b></h5>
          <i class="bi bi-person-walking text-secondary" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
    <div class="col-md-3">
      <a href="/skripsiPerwalian" style="text-decoration: none">
        <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
          <h5><b>Skripsi Mahasiswa Perwalian</b></h5>
          <i class="bi bi-mortarboard-fill text-danger" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
  </div>
  
  

  
</div>


@endsection