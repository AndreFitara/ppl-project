<link rel="stylesheet" href="/css/style.css">

<style>
  /* Add this CSS to your existing style.css file or create a new one */

  .card {
    border-radius: 10px;
    margin: 1rem;
    padding: 1.5rem;
  }

  .table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
  }

  .table th,
  .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
  }

  .table th {
    background-color: #f8f9fa;
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
  }

  .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
  }

  .table tbody+tbody {
    border-top: 2px solid #dee2e6;
  }

  .table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
  }

  .table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.075);
  }

  .text-center {
    text-align: center;
  }

  .text-white {
    color: #fff;
  }

  .fw-bold {
    font-weight: bold;
  }

  .row {
    margin-right: -15px;
    margin-left: -15px;
  }

  .text-white {
    color: #fff;
  }

  .btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
  }

  .btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    line-height: 1.5;
    border-radius: 0.2rem;
  }

  h4 {
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
  }
</style>

<div class="row text-center text-white fw-bold">
  <h4>List {{ $status }} Lulus PKL Mahasiswa Informatika Angkatan {{ $angkatan }}</h4>
</div>

<div class="card table-responsive px-1 printable" id="list-mhs-pkl-print">
  <table class="table table-stripped m-0" id="tabel-rekap-pkl">
    <tr>
      <th>No</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Angkatan</th>
      <th>Nilai</th>
    </tr>

    @php
    $i = 0;
    @endphp

    @foreach ($data_mhs as $mhs)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $mhs->nim }}</td>
      <td>{{ $mhs->nama }}</td>
      <td>{{ $mhs->angkatan}}</td>
      <td>{{ $mhs->nilai}}</td>
    </tr>
    @endforeach
  </table>
</div>
<div class="row">
  <div class="col-auto ms-auto">
    {{-- <button class="btn btn-secondary btn-sm" id="btn-print-list">Cetak</button> --}}

    <form action="/printListMhsPKL" target="__blank" method="post">
      @csrf
      <input type="hidden" name="objects" value="{{ json_encode($data_mhs) }}">
      <input type="hidden" name="angkatan" value="{{ $angkatan }}">
      <input type="hidden" name="status" value="{{ $status }}">
      {{-- @dump(json_encode($data_mhs)) --}}
      <button class="btn btn-secondary btn-sm mt-2" type="submit">Cetak</button>
    </form>


  </div>
</div>