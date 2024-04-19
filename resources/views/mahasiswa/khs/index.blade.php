@extends('templates.main')

@section('container')

<style>
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
    @if (auth()->user()->level == 'operator')
    <li class="breadcrumb-item"><a href="/entryProgress">Entry Progress Studi</a></li>
    @endif
    <li class="breadcrumb-item active text-black" aria-current="page">KHS</li>
  </ol>
</nav>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (auth()->user()->level == 'operator')
<div class="card p-2 ps-3 mb-2 bg-body-tertiary">
  <div>Nama: {{ $mahasiswa->nama }}</div>
  <div>NIM: {{ $mahasiswa->nim }}</div>
</div>
@endif

<div class="card transparent-card text-black mb-3">
  <div class="row d-flex justify-content-center mt-3">
    <div class="col-auto">
      <h5>Data KHS</h5>
    </div>
  </div>

  <div class="row mx-3">
    <div class="col-auto">
      <p>Semester Aktif: {{ $semester }}</p>
    </div>
    <div class="col-auto ms-auto">
      SKSk: {{ $SKSk }}
    </div>
    <div class="col-auto">
      IPk: {{ number_format($IPk, 2) }}
    </div>
  </div>

  @for ($i = 1; $i <= $semester; $i++) <div class="row mx-3 mb-3">
    <div class="col rounded border">
      <div class="row">
        <div class="col-2 border-end d-flex justify-content-center align-items-center">
          Semester {{ $i }}
        </div>
        <div class="col-2 py-4 d-flex justify-content-center align-items-center flex-column">
          <div>
            @if (!isset($khs[$i-1]))
            SKS: ~
            @else
            SKS: {{ $khs[$i-1]->sks }}
            @endif
          </div>
          <div>
            @if (!isset($khs[$i-1]))
            SKSk: ~
            @else
            SKSk: {{ $khs[$i-1]->sksk }}
            @endif
          </div>
        </div>

        <div class="col-2 py-4 d-flex justify-content-center align-items-center flex-column">
          <div>
            @if (!isset($khs[$i-1]))
            IPs: ~
            @else
            IPs: {{ number_format($khs[$i-1]->ips,2) }}
            @endif
          </div>
          <div>
            @if (!isset($khs[$i-1]))
            IPk: ~
            @else
            IPk: {{ number_format($khs[$i-1]->ipk,2) }}
            @endif
          </div>
        </div>

        <div class="col-2 py-4 text-center">
          @if (!isset($khs[$i-1]))
          Scan KHS : <span class="text-danger">belum</span>
          @else
          Scan KHS : <span class="text-success">sudah</span>
          @endif
        </div>

        <div class="col-3 py-4 text-center">
          @if (!isset($khs[$i-1]))
          Validasi : <span class="text-danger">belum</span>
          @else
          @if ($khs[$i-1]->validasi == 0)
          Validasi : <span class="text-danger">belum</span>
          @else
          Validasi : <span class="text-success">sudah</span>
          @endif
          @endif
        </div>

        <div class="col-1 bg-body-secondary text-center py-4">
          @if (($i == 1 || isset($khs[$i-2])) && isset($irs[$i-1]))
          @if (!isset($khs[$i-1]))
          <div class="modalKHSButton" type="button" data-bs-toggle="modal" data-bs-target="#modalKHS" data-smt="{{ $i }}">
            <h4 class="m-0">
              <i class="bi bi-pencil-square text-black"></i>
            </h4>
          </div>
          @else
          @if ($khs[$i-1]->validasi == 0)
          <div class="modalKHSButton" type="button" data-bs-toggle="modal" data-bs-target="#modalKHS" data-smt="{{ $i }}" data-scan-khs="{{ $khs[$i-1]->scan_khs }}" data-sks="{{ $khs[$i-1]->sks }}" data-ips="{{ $khs[$i-1]->ips }}" data-sksk="{{ $khs[$i-1]->sksk }}" data-ipk="{{ $khs[$i-1]->ipk }}">
            <h4 class="m-0">
              <i class="bi bi-pencil-square text-black"></i>
            </h4>
          </div>
          @else
          <div>
            <h4 class="m-0">
              <i class="bi bi-check-square"></i>
            </h4>
          </div>
          @endif
          @endif
          @else
          <div class="modalAlert" type="button" data-bs-toggle="modal" data-bs-target="#modalAlert">
            <h4 class="m-0">
              <i class="bi bi-pencil-square text-black"></i>
            </h4>
          </div>
          @endif
        </div>
      </div>
    </div>
</div>

@endfor

</div>

@include('mahasiswa.khs.modal_alert')
@include('mahasiswa.khs.modal_edit_khs')
<script src="/js/modal.js"></script>

@endsection