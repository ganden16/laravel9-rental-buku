<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RENTAL BUKU</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<style>
  .main {
    height: 100vh;
    box-sizing: border-box;
  }

  .login-box {
    width: 500px;
    padding: 30px;
    background-color: rgb(243, 254, 253);

  }

  form div {
    margin-bottom: 15px;
  }
</style>

<body>
  <div class="main d-flex flex-column justify-content-center align-items-center">
    @if (session('status') == 'failed')
    <div class="alert alert-danger">
      {{ session('message') }}
    </div>
    @endif
    @if (session('status') == 'non active')
    <div class="alert alert-warning">
      {{ session('message') }}
    </div>
    @endif
    <div class="login-box">
      <form action="" method="POST">
        @csrf
        <div>
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div>
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div>
          <button type="submit" class="btn btn-primary form-control">Login</button>
        </div>
        <div>
          dont have account? <a href="/register" class="text-decoration-none">Sign Up</a>
        </div>
		  <a href="/akses">
			<h3>Lihat Akses Akun</h3>
		  </a>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
</body>

</html>