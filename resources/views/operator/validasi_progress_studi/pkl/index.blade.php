@extends('templates.main')

@section('container')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/validasiProgress">Validasi Progress Studi</a></li>
    <li class="breadcrumb-item active text-white" aria-current="page">Validasi PKL</li>
  </ol>
</nav>

<div class="text-white">
  <div class="row my-3 mx-2">
    <div class="col-auto">
      <h5>Angkatan</h5>
    </div>
  </div>

  @foreach ($data_mhs as $angkatan => $jumlah_mhs)
  <a href="/validasiProgress/validasiPKL/{{ $angkatan }}" class="text-decoration-none" style="color:inherit;">
    <div class="row mx-3 mb-3">
      <div class="col rounded border">
        <div class="row">
          <div class="col-2 py-4 text-center">
            <h6 class="m-0 p-0">
              <b>{{ $angkatan }}</b>
            </h6>
          </div>
          <div class="col-10 text-center py-4 d-flex gap-2 flex-wrap">
            <div>
              <h5 class="m-0 p-0">
                <span class="badge p-4 text-bg-primary">
                  Mahasiswa: {{ $jumlah_mhs }}
                </span>
              </h5>
            </div>
            <div>
              @if (isset($rekap_pkl[$angkatan]["sudah"]))
              <h5 class="m-0 p-0">
                <span class="badge p-4 text-bg-secondary">
                  Sudah Validasi: {{ $rekap_pkl[$angkatan]["sudah"] }}
                </span>
              </h5>
              @else
              <h5 class="m-0 p-0">
                <span class="badge p-4 text-bg-secondary">
                  Sudah Validasi: 0
                </span>
              </h5>
              @endif
            </div>
            <div>
              @if (isset($rekap_pkl[$angkatan]["belum"]))
              <h5 class="m-0 p-0">
                <span class="badge p-4 text-bg-danger">
                  Belum Validasi: {{ $rekap_pkl[$angkatan]["belum"] }}
                </span>
              </h5>
              @else
              <h5 class="m-0 p-0">
                <span class="badge p-4 text-bg-danger">
                  Belum Validasi: 0
                </span>
              </h5>
              @endif
            </div>
            <div>
              @if (isset($rekap_pkl[$angkatan]["belum_entry"]))
              <h5 class="m-0 p-0">
                <span class="badge p-4 text-bg-warning">
                  Belum Entry Data: {{ $rekap_pkl[$angkatan]["belum_entry"] }}
                </span>
              </h5>
              @else
              <h5 class="m-0 p-0">
                <span class="badge p-4 text-bg-warning">
                  Belum Entry Data: 0
                </span>
              </h5>
              @endif
            </div>

          </div>
        </div>
      </div>
    </div>
  </a>
  @endforeach



</div>

<script src="/js/modal.js"></script>

@endsection