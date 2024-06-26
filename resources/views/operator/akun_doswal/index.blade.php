@extends('templates.main')

@section('container')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active text-white" aria-current="page">Akun Dosen Wali</li>
  </ol>

</nav>
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show col-md-auto" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show col-md-auto" role="alert">
  <h5>Gagal Melakukan Import Data</h5>
  <table class="w-100">
    <tr>
      <th style="width: 5%">Row</th>
      <th>Error</th>
    </tr>
    @foreach (session('error') as $error)
    <tr>
      <td>{{ $error->row() }}</td>
      <td>{{ $error->errors()[0] }}</td>
    </tr>
    @endforeach
  </table>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('errorDelete'))
<div class="alert alert-danger alert-dismissible fade show col-md-auto" role="alert">
  {{ session('errorDelete') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
  <div class="col-md-4">
    <input type="text" class="form-control" id="search-akun-mhs" onkeyup="updateDoswalTable(this.value)" placeholder="Cari...">
  </div>
</div>
<div class="col-md-auto ms-auto mt-3">
  <a href="/exportAkunDosenWali" type="button" class="btn btn-primary btn-sm">
    Export List Akun
  </a>
  <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalImport">Import Akun</button>
  <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalGenerate">Add Akun</button>
</div>

<div class="row my-4">
  <div class="col">
    <div class="card bg-body-tertiary">
      <div id="tabelDoswal" class="table-responsive">
        <table class="table table-stripped m-0">
          <tr>
            <th>No</th>
            <th>Nama Dosen</th>
            <th>NIP/Username</th>
            <th>No Telepon</th>
            <th>Email SSO</th>
            <th>Action</th>
          </tr>

          @php
          $i = 0;
          @endphp

          @foreach ($data_doswal as $doswal)
          {{-- @dd($doswal->user->password) --}}
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $doswal->nama }}</td>
            <td>{{ $doswal->nip }}</td>
            <td>{{ $doswal->no_telp}}</td>
            <td>{{ $doswal->email_sso}}</td>
            <td>
              <a class="btn btn-warning btn-sm" href="/akunDosenWali/{{ $doswal->nip }}/reset">Reset Password</a>
              <form action="/akunDosenWali/{{ $doswal->nip }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                  Hapus Akun
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>

    </div>
  </div>
</div>

@include('operator.akun_doswal.modal_generate_doswal')
@include('operator.akun_doswal.modal_import_excel')

<script src="/js/ajax.js"></script>

@endsection