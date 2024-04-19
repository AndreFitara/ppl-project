<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Informasi BMW M3</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="icon" href="/logo-departemen.jpg">

<body class="bg-white">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <nav class="navbar navbar-expand-lg bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="/dashboard"><b style="font-family: Arial; color:white">Sistem Informasi Akademik BMW-M3</b></a>
      @auth
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white">
          @if (auth()->user()->level == "mahasiswa")
          Selamat Datang, {{ auth()->user()->mahasiswa->nama }}
          @elseif(auth()->user()->level == "dosenwali")
          Selamat Datang, {{ auth()->user()->dosen_wali->nama }}
          @elseif(auth()->user()->level == "departemen")
          Selamat Datang, Departemen Informatika
          @else
          Selamat Datang, {{ auth()->user()->operator->nama }}
          @endif
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item text-primary" href="/dashboard">Dashboard</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="dropdown-item btn-danger-soft small">LogOut</button>
            </form>
          </li>
        </ul>
      </div>
      @endauth
    </div>
  </nav>
  <div class="container my-4">
    @yield('container')
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script src="/js/script.js"></script>

</body>

</html>