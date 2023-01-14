<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="sweetalert2.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <title>Rental Buku | @yield('title')</title>
</head>

<body>
  <div class="main d-flex justify-content-between flex-column">
    <nav class="navbar navbar-dark navbar-expand-lg bg-success">
      <div class="container-fluid">
        <a class="navbar-brand fs-3 fw-bold" href="/dashboard">Rental Buku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
          aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <div class="body-content h-100">
      <div class="row g-0 h-100 ">
        <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo03">
          @if (Auth::user()->role_id == 1 )
          <a href="/dashboard" class="{{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">Dashboard</a>
          <a href="/books" class="{{ request()->segment(1) == 'books' ? 'active' : '' }}">Books</a>
          <a href="/categories" class="{{ request()->segment(1) == 'categories' ? 'active' : '' }}">Categories</a>
          <a href="/users" class="{{ request()->segment(1) == 'users' ? 'active' : '' }}">Users</a>
          <a href="/rents/logs" class="{{ request()->segment(1) == 'rents' ? 'active' : '' }}">Rent Log</a>
          <a href="/" class="{{ request()->segment(1) == '' ? 'active' : '' }}">Book List</a>
          <a href="/rents" class="{{ request()->segment(1) == 'rents' ? 'active' : '' }}">Book Rent</a>
          <a href="/rents/return" class="{{ request()->segment(1) == 'books' ? 'active' : '' }}">Book Return</a>
          <a href="/logout">Logout</a>
          @else
          <a href="/profile" class="{{ request()->segment(1) == 'profile' ? 'active' : '' }}">Profile</a>
          <a href="/" class="{{ request()->segment(1) == '' ? 'active' : '' }}">Book List</a>
          <a href="/logout">Logout</a>
          @endif
        </div>
        <div class="p-5 content col-lg-10">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script src="sweetalert2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.select-multiple').select2();
  });
  </script>
</body>

</html>