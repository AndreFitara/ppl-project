@extends('templates.main')

@section('container')

<style>
  /* Add this CSS to your existing style.css file or create a new one */

  /* Basic Reset */
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
  }

  /* Improved Card Style */
  .card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-top: 20px;
    background-color: #ffffff;
  }

  .card .card-header {
    background-color: #007bff;
    color: #fff;
    padding: 15px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
  }

  .card .card-body {
    padding: 20px;
  }

  .card h5 {
    margin-bottom: 20px;
    color: #007bff;
  }

  .row.d-flex.justify-content-center {
    margin-bottom: 20px;
  }

  /* Add more styles as needed for customization */
</style>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/rekapMhsPerwalian">Rekap Mahasiswa Perwalian</a></li>
    <li class="breadcrumb-item active" aria-current="page">Rekap Status Mahasiswa</li>
  </ol>
</nav>

<div class="row text-center mb-2">
  <h4>Rekap Status Mahasiswa Perwalian</h4>
</div>

<div class="row mb-2">
  <div class="col-auto">
    {{-- <button class="btn btn-secondary btn-sm" id="btn-print-rekap">Cetak</button> --}}
    <form action="/printRekapStatus" target="__blank" method="post">
      @csrf
      <input type="hidden" name="rekap_status" value="{{ json_encode($rekap_status) }}">
      <input type="hidden" name="current_year" value="{{ $current_year }}">
      <button class="btn btn-secondary btn-sm mt-2" type="submit">Cetak</button>
    </form>
  </div>
</div>

<div class="mb-2">
  @for ($i = $current_year-6; $i <= $current_year; $i++) <div class="col w-100 mb-4" data-bs-toggle="modal" data-bs-target="#modalListStatus">
    {{-- <a href="/showListMhsStatus/{{ $i }}" style="text-decoration: none"> --}}
    <div class="point rekap-status" data-angkatan="{{ $i }}">
      <div class="card bg-body-tertiary py-2">
        <div class="row text-center ">
          <h5>Angkatan {{ $i }}</h5>
        </div>

        <div class="row d-flex justify-content-center my-1">
          @if (isset($rekap_status[$i]['Aktif']))
          <div class="col-4 border-end"><span class="tab">Aktif</span> : {{ $rekap_status[$i]['Aktif'] }}</div>
          @else
          <div class="col-4 border-end"><span class="tab">Aktif</span> : 0</div>
          @endif

          @if (isset($rekap_status[$i]['Lulus']))
          <div class="col-4"><span class="tab">Lulus</span> : {{ $rekap_status[$i]['Lulus'] }}</div>
          @else
          <div class="col-4"><span class="tab">Lulus</span> : 0</div>
          @endif
        </div>

        <div class="row d-flex justify-content-center my-1">
          @if (isset($rekap_status[$i]['Cuti']))
          <div class="col-4 border-end"><span class="tab">Cuti</span> : {{ $rekap_status[$i]['Cuti'] }}</div>
          @else
          <div class="col-4 border-end"><span class="tab">Cuti</span> : 0</div>
          @endif

          @if (isset($rekap_status[$i]['Mangkir']))
          <div class="col-4"><span class="tab">Mangkir</span> : {{ $rekap_status[$i]['Mangkir'] }}</div>
          @else
          <div class="col-4"><span class="tab">Mangkir</span> : 0</div>
          @endif
        </div>

        <div class="row d-flex justify-content-center my-1">
          @if (isset($rekap_status[$i]['DO']))
          <div class="col-4 border-end"><span class="tab">Drop Out</span> : {{ $rekap_status[$i]['DO'] }}</div>
          @else
          <div class="col-4 border-end"><span class="tab">Drop Out</span> : 0</div>
          @endif

          @if (isset($rekap_status[$i]['Undur Diri']))
          <div class="col-4"><span class="tab">Undur Diri</span> : {{ $rekap_status[$i]['Undur Diri'] }}</div>
          @else
          <div class="col-4"><span class="tab">Undur Diri</span> : 0</div>
          @endif
        </div>
        <div class="row text-center my-1">
          @if (isset($rekap_status[$i]['Meninggal Dunia']))
          <div class="col">Meninggal Dunia : {{ $rekap_status[$i]['Meninggal Dunia'] }}</div>
          @else
          <div class="col">Meninggal Dunia : 0</div>
          @endif
        </div>


      </div>
    </div>
    {{-- </a> --}}
</div>
@endfor
</div>


<div class="modal fade" id="modalListStatus" tabindex="-1" aria-labelledby="modalListStatusLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-custom">
    <div class="modal-content">
      <div class="data-angkatan"></div>
      <div class="list-mhs-status">

      </div>
    </div>
  </div>
</div>

<script src="/js/rekap.js"></script>

@endsection