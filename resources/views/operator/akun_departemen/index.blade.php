@extends('templates.main')

@section('container')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active text-black" aria-current="page">Akun Departemen</li>
  </ol>
</nav>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show col-md-auto" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="col-md-auto ms-auto">
  <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalGenerate">Generate Akun</button>
</div>

<div class="row my-4">
  <div class="col">
    <div class="card bg-body-tertiary">
      <div id="tabelDepartemen" class="table-responsive">
        <table class="table table-striped m-0">
          <thead>
            <tr>
              <th>No</th>
              <th>Departemen ID</th>
              <th>No Telepon</th>
              <th>Email SSO</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @php
            $i = 0;
            @endphp

            @foreach ($data_departemen as $departemen)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $departemen->departemen_id }}</td>
              <td>{{ $departemen->no_telp}}</td>
              <td>{{ $departemen->email_sso}}</td>
              <td>
                <a class="btn btn-warning btn-sm" href="/akunDepartemen/{{ $departemen->departemen_id }}/reset">Reset Password</a>
                <form action="/akunDepartemen/{{ $departemen->departemen_id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                    Hapus Akun
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

@include('operator.akun_departemen.modal_generate_departemen')

<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    /* Background color for the body */
  }

  .alert {
    border-radius: 5px;
  }

  .alert-success {
    background-color: #d4edda;
    color: #155724;
  }

  .alert-danger {
    background-color: #f8d7da;
    color: #721c24;
  }

  .btn-secondary {
    background-color: #6c757d;
    color: #ffffff;
  }

  .btn-warning,
  .btn-danger {
    margin-right: 5px;
  }

  .btn-action:hover {
    opacity: 0.8;
  }

  .card {
    border-radius: 10px;
  }

  .card-title {
    color: #007bff;
  }
</style>

@endsection