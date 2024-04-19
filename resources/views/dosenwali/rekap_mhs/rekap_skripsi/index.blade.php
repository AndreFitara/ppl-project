@extends('templates.main')

@section('container')

<style>
  /* Add this CSS to your existing style.css file or create a new one */

  #rekap-skripsi-main {
    border-radius: 10px;
    margin: 1rem;
    padding: 1.5rem;
  }

  .table-bordered {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
  }

  .table-bordered th,
  .table-bordered td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #6c757d;
  }

  .table-bordered th {
    background-color: #f8f9fa;
    vertical-align: bottom;
    border-bottom: 2px solid #6c757d;
  }

  .table-bordered thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
  }

  .table-bordered tbody+tbody {
    border-top: 2px solid #dee2e6;
  }

  .table-bordered tr {
    background-color: #ffffff;
  }

  .point {
    cursor: pointer;
  }

  .row {
    margin-right: -15px;
    margin-left: -15px;
  }

  .text-center {
    text-align: center;
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

  .justify-content-between {
    justify-content: space-between;
  }

  .col-auto {
    flex: 0 0 auto;
    width: auto;
  }

  .rekap-pkl {
    background-color: #d1ecf1;
  }
</style>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/rekapMhsPerwalian">Rekap Mahasiswa Perwalian</a></li>
    <li class="breadcrumb-item active" aria-current="page">Rekap Skripsi Mahasiswa</li>
  </ol>
</nav>

<div class="row text-center mb-3">
  <h4>Rekap Progress Skripsi Mahasiswa Perwalian Informatika</h4>
</div>

<div class="card bg-body-tertiary table-responsive" id="rekap-skripsi-main">
  <div class="row d-flex justify-content-center m-0">
    <div class="col-auto">
      <h5>Angkatan</h5>
    </div>
  </div>

  <table class="table-bordered text-center rounded">
    <tr>
      @for ($i = $current_year - 6; $i <= $current_year; $i++) <td colspan="2">{{ $i }}</td>
        @endfor
    </tr>

    <tr>
      @for ($i = $current_year - 6; $i <= $current_year; $i++) @if (isset($rekap_skripsi[$i])) <td class="point rekap-pkl rekap-skripsi" data-angkatan="{{ $i }}" data-status="Sudah">Sudah</td>
        <td class="point rekap-pkl rekap-skripsi" data-angkatan="{{ $i }}" data-status="Belum">Belum</td>
        @else
        <td class="point rekap-pkl" data-angkatan="{{ $i }}" data-status="Sudah">Sudah</td>
        <td class="point rekap-pkl" data-angkatan="{{ $i }}" data-status="Belum">Belum</td>
        @endif
        @endfor
    </tr>

    <tr>
      @for ($i = $current_year - 6; $i <= $current_year; $i++) @if (isset($rekap_skripsi[$i])) <td class="point rekap-pkl rekap-skripsi" data-angkatan="{{ $i }}" data-status="Sudah">{{ $rekap_skripsi[$i]["sudah_skripsi"] }}</td>
        <td class="point rekap-pkl rekap-skripsi" data-angkatan="{{ $i }}" data-status="Belum">{{ $rekap_skripsi[$i]["belum_skripsi"] }}</td>
        @else
        <td class="point rekap-pkl" data-angkatan="{{ $i }}" data-status="Sudah">0</td>
        <td class="point rekap-pkl" data-angkatan="{{ $i }}" data-status="Belum">0</td>
        @endif
        @endfor
    </tr>
  </table>
</div>

<div class="row justify-content-between">
  <div class="col-auto">
    {{-- <button class="btn btn-secondary btn-sm" id="btn-print-rekap">Cetak</button> --}}
    <form action="/printRekapSkripsi" target="__blank" method="post">
      @csrf
      <input type="hidden" name="rekap_skripsi" value="{{ json_encode($rekap_skripsi) }}">
      <input type="hidden" name="current_year" value="{{ $current_year }}">
      <button class="btn btn-secondary btn-sm mt-2" type="submit">Cetak</button>
    </form>
  </div>
</div>

<div class="row mt-4 mb-3">
  <div class="col list-mhs-skripsi">
  </div>
</div>

<script src="/js/rekap.js"></script>
@endsection