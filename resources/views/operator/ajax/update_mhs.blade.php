<style>
  #tabel-akun-mhs {
    background-color: #343a40;
    /* Set the background color to dark */
    color: white;
    /* Set the text color to white */
  }

  #tabel-akun-mhs th,
  #tabel-akun-mhs td {
    border: 1px solid white;
    /* Set border color to white */
  }

  #tabel-akun-mhs th {
    background-color: #6c757d;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    /* Set the header background color to a darker shade */
  }
</style>
<table class="table table-striped m-0" id="tabel-akun-mhs">
  <thead>
    <tr class="text-white">
      <th>No</th>
      <th>Nama Mahasiswa</th>
      <th>NIM/Username</th>
      <th>Angkatan</th>
      <th>Dosen Wali</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @php $i = 0; @endphp

    @foreach ($data_mhs as $mhs)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $mhs->nama }}</td>
      <td>{{ $mhs->nim }}</td>
      <td>{{ $mhs->angkatan}}</td>
      <td>{{ $mhs->dosenwali->nama}}</td>
      <td>{{ $mhs->status}}</td>
      <td>
        <a class="btn btn-warning btn-sm btn-action" href="/akunMHS/{{ $mhs->nim }}/reset">Reset Password</a>
        <form action="/akunMHS/{{ $mhs->nim }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="btn btn-danger btn-sm btn-action" onclick="return confirm('Are you sure?')">
            Hapus Akun
          </button>
        </form>
        <div class="btn btn-sm btn-secondary btn-action btn-edit-data" data-bs-toggle="modal" data-bs-target="#modalEdit" data-nama="{{ $mhs->nama }}" data-nim="{{ $mhs->nim }}" data-angkatan="{{ $mhs->angkatan }}" data-status="{{ $mhs->status }}" data-doswal="{{ $mhs->dosen_wali }}" data-smt-akhir="{{ $mhs->semester_akhir }}">
          Edit Data
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<script src="/js/akun.js"></script>