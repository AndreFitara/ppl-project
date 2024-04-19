@extends('templates.main')

@section('container')

<style>
  /* Search Input Style */
  #keyword,
  #angkatan {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
  }

  /* Card Style */
  .card {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 5px;
  }

  /* Table Style */
  .table th,
  .table td {
    text-align: center;
  }

  .table th {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #545b62;
    color: white;
  }

  /* Action Button Style */
  .btn-secondary {
    background-color: #6c757d;
    color: white;
  }

  /* Action Button Hover Effect */
  .btn-secondary:hover {
    background-color: #545b62;
    color: white;
  }
</style>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active text-black" aria-current="page">Pencarian Progress Studi Mahasiswa Perwalian</li>
  </ol>
</nav>

<div class="col">
  <div class="col-md-4">
    <input type="text" class="form-control" id="keyword" onkeyup="updateTableProgressMHSPerwalian()" placeholder="Cari Nama/NIM" autocomplete="off">
  </div>
  <div class="col-md-4 mt-3">
    <select name="angkatan" class="form-control" id="angkatan" onchange="updateTableProgressMHSPerwalian()">
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
              <a class="btn btn-secondary btn-sm" href="/pencarianProgressStudiPerwalian/{{ $mhs->nim }}">Detail Progress Studi</a>
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