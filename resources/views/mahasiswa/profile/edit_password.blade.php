@extends('templates.main')

@section('container')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/profile">Profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Password</li>
  </ol>
</nav>

<div class="card">
  <!-- Card header START -->
  <div class="card-header d-sm-flex text-center align-items-center justify-content-between border-0 pb-0">
    <h1 class="card-title h5">Change Password</h1>
  </div>
  <div class="card-body">
    {{-- <div class="row d-flex justify-content-center"> --}}
    <div class="card-body">
      <form action="/profile/edit-password" method="POST" class="needs-validation">
        @csrf
        @method('put')
        <div class="row mb-1">
          <label for="password_lama" class="col-sm-2 col-form-label text-dark">Password Lama:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control @error('password_lama') is-invalid @enderror" id="password_lama" name="password_lama" value="{{ old('password_lama') }}" placeholder="Password Lama" required>
            @error('password_lama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>

        <div class="row mb-1">
          <label for="password_baru" class="col-sm-2 col-form-label text-dark">Password Baru:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control @error('password_baru') is-invalid @enderror" id="password_baru" name="password_baru" value="{{ old('password_baru') }}" placeholder="Password Baru" required>
            @error('password_baru')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>

        <div class="row mb-1">
          <label for="konfirmasi_password" class="col-sm-2 col-form-label text-dark">Verifikasi Password Baru:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control @error('konfirmasi_password') is-invalid @enderror" id="konfirmasi_password" name="konfirmasi_password" value="{{ old('konfirmasi_password') }}" placeholder="Verifikasi Password Baru" required>
            @error('konfirmasi_password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>

        <div class="col-12 text-end">
          <button type="submit" class="btn btn-success">Save</button>
          <a href="/profile" class="btn btn-danger">Cancel</a>
        </div>
    </div>
  </div>
  {{-- </div> --}}
</div>
@endsection