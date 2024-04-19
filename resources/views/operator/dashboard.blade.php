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
    <li class="text-black breadcrumb-item active" aria-current="page">Dashboard</li>
  </ol>
</nav>

<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card bg-body-tertiary text-center">
        <a href="/profile" class="position-absolute end-0 m-2" style="text-decoration: none; color: inherit;">Edit Profile</a>
        <div class="m-4">
          @if (auth()->user()->operator->foto_profil == null)
          <img src="/showFile/private/profile_photo/default.jpg" alt="" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
          @else
          <img src="/showFile/{{ auth()->user()->operator->foto_profil }}" alt="" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
          @endif
        </div>
        <div class="m-4">
          <h5><b>Operator</b></h5>
          <hr>
          <p>Fakultas Sains dan Matematika</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4 justify-content-center">
    <div class="col-md-3">
      <a href="/akunMHS" style="text-decoration: none">
        <div class="card bg-body-tertiary text-center py-3">
          <h5><b>Akun Mahasiswa</b></h5>
          <i class="bi bi-person-vcard" style="font-size: 3em;"></i>
        </div>
      </a>
    </div>
    <div class="col-md-3">
      <a href="/akunDosenWali" style="text-decoration: none">
        <div class="card bg-body-tertiary text-center py-3">
          <h5><b>Akun Dosen Wali</b></h5>
          <i class="bi bi-person-vcard-fill" style="font-size: 3em;"></i>
        </div>
      </a>
    </div>
  </div>
  <div class="row mt-2 justify-content-center">
    <div class="col-md-3">
      <a href="/akunDepartemen" style="text-decoration: none">
        <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
          <h5><b>Akun Departemen</b></h5>
          <i class="bi bi-building-fill" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
    <div class="col-md-3">
      <a href="/pencarianProgressStudi" style="text-decoration: none">
        <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
          <h5><b>Pencarian Progress Studi Mahasiswa</b></h5>
          <i class="bi bi-search" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
  </div>
  <div class="row mt-2 justify-content-center">
    <div class="col-md-3">
      <a href="/validasiProgress" style="text-decoration: none">
        <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
          <h5><b>Validasi Progress Studi Mahasiswa</b></h5>
          <i class="bi bi-bar-chart-line-fill" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
    <div class="col-md-3">
      <a href="/rekapMhs" style="text-decoration: none">
        <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
          <h5><b>Rekap Mahasiswa</b></h5>
          <i class="bi bi-person-lines-fill" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
  </div>
  <div class="row mt-2 justify-content-center">
    <div class="col-md-6">
      <a href="/entryProgress" style="text-decoration: none">
        <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">
          <h5><b>Entry Progress Studi MHS</b></h5>
          <i class="bi bi-cloud-arrow-up-fill" style="font-size:70px;"></i>
        </div>
      </a>
    </div>
  {{-- <div class="col-md-4 col-sm-6 d-flex flex-column w-100">
    <a href="" style="text-decoration: none">
      <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">      
        <h5><b>Kunci Pengisian Data</b></h5>
        <i class="bi bi-lock-fill" style="font-size:70px;"></i>
      </div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 d-flex flex-column w-100">
    <a href="" style="text-decoration: none">
      <div class="card bg-body-tertiary d-flex justify-content-center align-items-center text-center py-2 h-100">      
        <h5><b>Kirim Notifikasi</b></h5>
        <i class="bi bi-bell-fill" style="font-size:70px;"></i>
      </div>
    </a>
  </div> --}}

</div>
@endsection