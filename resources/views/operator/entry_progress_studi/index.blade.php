@extends('templates.main')

@section('container')

<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
  }

  .breadcrumb-item.active {
    color: #fff;
  }

  .card {
    border-radius: 10px;
    margin: 1rem;
    padding: 1.5rem;
  }

  .card-header {
    background-color: #6c757d;
    color: #fff;
    border-radius: 10px 10px 0 0;
  }

  .form-control {
    border-radius: 5px;
  }

  .btn-container {
    margin-top: 1.5rem;
  }

  .btn-sm {
    margin-bottom: 0.5rem;
  }

  .btn-info {
    background-color: #17a2b8;
    color: #fff;
  }

  .btn-primary {
    background-color: #007bff;
    color: #fff;
  }

  .btn-warning {
    background-color: #ffc107;
    color: #fff;
  }

  .btn-success {
    background-color: #28a745;
    color: #fff;
  }
</style>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active text-white" aria-current="page">Entry Progress Studi</li>
  </ol>

</nav>

<div class="col">
  <div class="col-md-4">
    <input type="text" class="form-control" id="keyword" onkeyup="updateTableProgressMHS()" placeholder="Cari Nama/NIM" autocomplete="off">
  </div>
  <div class="col-md-4 mt-3">
    <select name="angkatan" class="form-control" id="angkatan" onchange="updateTableProgressMHS()">
      <option value="" selected>Angkatan</option>
      @foreach ($data_angkatan as $angkatan)
      <option value="{{ $angkatan }}">{{ $angkatan }}</option>
      @endforeach
    </select>
  </div>
</div>

<div class="row my-4">
  <div class="col">
    <div class="card bg-body-tertiary">
      <div id="tabelMHS">
        <table class="table table-stripped m-0">
          <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>NIM</th>
            <th>Angkatan</th>
            <th>Status</th>
            <th>Action (Entry)</th>
          </tr>

          @php
          $i = 0;
          @endphp

          @foreach ($data_mhs as $mhs)
          {{-- @dd($mhs->user->password) --}}
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $mhs->nama }}</td>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->angkatan}}</td>
            <td>{{ $mhs->status}}</td>
            <td>
              <a class="btn btn-info btn-sm mb-1" href="/entryProgress/entryIRS/{{ $mhs->nim }}">IRS</a>
              <a class="btn btn-primary btn-sm mb-1" href="/entryProgress/entryKHS/{{ $mhs->nim }}">KHS</a>
              <a class="btn btn-warning btn-sm mb-1" href="/entryProgress/entryPKL/{{ $mhs->nim }}">PKL</a>
              <a class="btn btn-success btn-sm mb-1" href="/entryProgress/entrySkripsi/{{ $mhs->nim }}">Skripsi</a>
            </td>
          </tr>
          @endforeach
        </table>
      </div>

    </div>
  </div>
</div>

<script src="/js/ajax.js"></script>

@endsection