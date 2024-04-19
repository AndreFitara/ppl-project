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

  .form-control {
    border-radius: 5px;
  }

  .btn-secondary {
    background-color: #6c757d;
    color: #ffffff;
  }

  .btn-secondary:hover {
    background-color: #495057;
  }

  .table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    border-collapse: collapse;
  }

  .table th,
  .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
  }

  .table th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
    background-color: #6c757d;
    color: #ffffff;
  }

  .table tbody+tbody {
    border-top: 2px solid #dee2e6;
  }

  .table tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
  }

  .table tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.075);
  }

  .card {
    border-radius: 10px;
  }

  .card-title {
    color: #007bff;
  }
</style>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active text-white" aria-current="page">Pencarian Progress Studi Mahasiswa</li>
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
      <div id="tabelMHS" class="table-responsive">
        <table class="table table-striped m-0">
          <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>NIM</th>
            <th>Angkatan</th>
            <th>Status</th>
            <th>Action</th>
          </tr>

          @php
          $i = 0;
          @endphp

          @foreach ($data_mhs as $mhs)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $mhs->nama }}</td>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->angkatan}}</td>
            <td>{{ $mhs->status}}</td>
            <td>
              <a class="btn btn-secondary btn-sm" href="/pencarianProgressStudi/{{ $mhs->nim }}">Detail Progress Studi</a>
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