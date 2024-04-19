<!-- Modal -->
<style>
  /* Add these styles to your existing stylesheet */

  /* Modal styles */
  .modal-content {
    border-radius: 10px;
  }

  .modal-header {
    background-color: #007bff;
    /* Header background color */
    color: #fff;
    /* Header text color */
    border-bottom: 1px solid #dee2e6;
  }

  .modal-title {
    font-size: 1.5rem;
  }

  .modal-body {
    padding: 20px;
  }

  .modal-footer {
    border-top: 1px solid #dee2e6;
    padding: 10px 20px;
  }

  /* Form styles */
  .form-label {
    font-weight: bold;
    color: #007bff;
    /* Label text color */
  }

  .form-select {
    width: 100%;
  }

  .invalid-feedback {
    color: #dc3545;
    /* Error message text color */
  }

  /* Button styles */
  .btn-secondary {
    background-color: #6c757d;
    /* Close button background color */
    color: #fff;
    /* Close button text color */
  }

  .btn-primary {
    background-color: #007bff;
    /* Submit button background color */
    color: #fff;
    /* Submit button text color */
  }

  /* Close button styles */
  .btn-close {
    color: #fff;
    /* Close button color */
  }

  /* Optional: Hover effect for buttons */
  .btn-secondary:hover,
  .btn-primary:hover {
    opacity: 0.8;
  }
</style>
<div class="modal fade" id="modalGenerate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Generate Akun Departemen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/akunDepartemen" method="POST">
        <div class="modal-body">
          @csrf
          <div class="mb-3">
            <label for="departemen_id" class="form-label">Departemen ID</label>
            <input type="text" class="form-control @error('departemen_id') is-invalid @enderror" name="departemen_id" value="{{ old('departemen_id') }}">
            @error('departemen_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon</label>
            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}">
            @error('no_telp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email_sso" class="form-label">Email SSO</label>
            <input type="text" class="form-control @error('email_sso') is-invalid @enderror" name="email_sso" value="{{ old('email_sso') }}">
            @error('email_sso')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
      </form>
    </div>
  </div>
</div>

@if($errors->has('departemen_id') OR $errors->has('no_telp') OR $errors->has('email_sso'))
<script>
  $(document).ready(function() {
    $('#modalGenerate').modal('show');
  });
</script>
@endif