@extends('templates.main')

@section('container')

<style>
  .card:hover {
    transform: scale(1.05);
  }

  .card {
    transition: transform 0.2s;
  }

  .card {
    border: 1px solid #fff;
    /* Set the white border for the card */
    border-radius: 10px;
    /* Set the border-radius for the card */
    box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
    /* Set a box shadow for the card */
    margin-bottom: 20px;
    /* Adjust the margin between cards as needed */
  }

  /* Style for the transparent card */
  .transparent-card {
    background-color: rgba(255, 255, 255, 0.2);
    /* Set the background color with transparency */
  }

  /* Style for the card title */
  .card h4 {
    color: #ffffff;
    /* Set the text color for the card title */
  }

  /* Style for the card body */
  .card-body {
    background-color: rgba(255, 255, 255, 0.1);
    /* Set the background color for the card body with transparency */
  }

  /* Style for the buttons inside the card */
  .card a.btn {
    margin-top: 10px;
    /* Adjust the top margin for the buttons */
  }

  /* Style for the date and status badge */
  .card .col-4.text-center h6,
  .card .col-4.border-start.border-end.text-center h5 {
    color: #ffffff;
    /* Set the text color for the date and status */
  }

  /* Style for the status badge */
  .col-auto.bg-success.rounded.border.text-white h3 {
    background-color: #28a745;
    /* Set the background color for the success status */
  }

  /* Style for the semester and nilai */
  .card .col-4.border-start.border-end.text-center h4,
  .card .col-4.text-center h5 {
    color: #ffffff;
    /* Set the text color for the semester and nilai */
  }

  /* Style for the nilai badge */
  .col-auto.bg-body-secondary.rounded.border h3 {
    background-color: rgba(255, 255, 255, 0.2);
    /* Set the background color for the nilai badge with transparency */
  }

  /* Style for the link in the file name */
  .card a[href^="/showFile"] {
    color: #007bff;
    /* Set the text color for the file name link */
  }

  /* Style for the validation status */
  .card h6 {
    color: #ffffff;
    /* Set the text color for the validation status */
  }

  /* Style for the text color of "Sudah" in validation status */
  .card .text-success {
    color: #28a745;
    /* Set the text color for the "Sudah" status */
  }

  /* Style for the text color of "Belum" in validation status */
  .card .text-danger {
    color: #dc3545;
    /* Set the text color for the "Belum" status */
  }
</style>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active text-black" aria-current="page">Validasi Progress Studi</li>
  </ol>
</nav>

<div class="row mb-2 justify-content-center">
  <div class="col-md-6 col-lg-3">
    <a href="/validasiProgress/validasiIRS" style="text-decoration: none">
      <div class="card transparent-card text-black d-flex justify-content-center align-items-center text-center py-2 h-100">
        <h5><b>IRS Mahasiswa</b></h5>
        <i class="bi bi-file-earmark-bar-graph-fill text-primary" style="font-size:70px;"></i>
      </div>
    </a>
  </div>
  <div class="col-md-6 col-lg-3">
    <a href="/validasiProgress/validasiKHS" style="text-decoration: none">
      <div class="card transparent-card text-black d-flex justify-content-center align-items-center text-center py-2 h-100">
        <h5><b>KHS Mahasiswa</b></h5>
        <i class="bi bi-card-checklist text-success" style="font-size:70px;"></i>
      </div>
    </a>
  </div>
</div>
<div class="row mb-3 justify-content-center">
  <div class="col-md-6 col-lg-3">
    <a href="/validasiProgress/validasiPKL" style="text-decoration: none">
      <div class="card transparent-card text-black d-flex justify-content-center align-items-center text-center py-2 h-100">
        <h5><b>PKL Mahasiswa</b></h5>
        <i class="bi bi-person-walking text-secondary" style="font-size:70px;"></i>
      </div>
    </a>
  </div>
  <div class="col-md-6 col-lg-3">
    <a href="/validasiProgress/validasiSkripsi" style="text-decoration: none">
      <div class="card transparent-card text-black d-flex justify-content-center align-items-center text-center py-2 h-100">
        <h5><b>Skripsi Mahasiswa</b></h5>
        <i class="bi bi-mortarboard-fill text-danger" style="font-size:70px;"></i>
      </div>
    </a>
  </div>
</div>

@endsection