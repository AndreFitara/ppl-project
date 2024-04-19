@extends('templates.main')

@section('container')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active text-black" aria-current="page">Akun Mahasiswa</li>
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
    <input type="text" class="form-control" id="search-akun-mhs" onkeyup="updateMhsTable(this.value)" placeholder="Cari...">
  </div>
</div>
<div class="col-md-auto ms-auto mt-3">
  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalExport">Export List Akun</button>
  <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalImport">Import Akun</button>
  <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalGenerate">Add Akun</button>
</div>

<div class="row my-4">
  <div class="col">
    <div class="card bg-light">
      <div class="card-body">
        <h5 class="card-title">Informasi Mahasiswa</h5>
        <div id="tabelMHS" class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Student ID</th>
                <th>Grade</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              {{-- Load data dynamically using Blade syntax --}}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


@include('operator.akun_mhs.modal_generate_mhs')
@include('operator.akun_mhs.modal_import_excel')
@include('operator.akun_mhs.modal_export_excel')
@include('operator.akun_mhs.modal_edit_data')

<script src="/js/ajax.js"></script>
<script>
  updateMhsTable("");
</script>

@endsection