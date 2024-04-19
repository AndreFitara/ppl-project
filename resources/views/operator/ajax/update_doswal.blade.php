<table class="table table-striped m-0" id="tabel-dosen-wali">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Dosen</th>
      <th>NIP/Username</th>
      <th>No Telepon</th>
      <th>Email SSO</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @php $i = 0; @endphp

    @foreach ($data_doswal as $doswal)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $doswal->nama }}</td>
      <td>{{ $doswal->nip }}</td>
      <td>{{ $doswal->no_telp}}</td>
      <td>{{ $doswal->email_sso}}</td>
      <td>
        <a class="btn btn-warning btn-sm btn-action" href="/akunDosenWali/{{ $doswal->nip }}/reset">Reset Password</a>
        <form action="/akunDosenWali/{{ $doswal->nip }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="btn btn-danger btn-sm btn-action" onclick="return confirm('Are you sure?')">
            Hapus Akun
          </button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>