<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>RENTAL BUKU | REGISTER</title>
</head>

<style>
  .main {
    height: 100vh;
  }

  .register-box {
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
    @if ($errors->any())
    <div class="alert alert-danger" style="width: 500px">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    @if (session('status') == 'success')
    <div class="alert alert-warning" style="width: 500px">
      {{ session('message') }}
    </div>
    @endif
    
    <div class="register-box">
      <form action="/register" method="POST">
        @csrf
        <div>
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control">
        </div>
        <div>
          <label for="password" class="form-label">Password</label>
          <input type="text" name="password" id="password" class="form-control">
        </div>
        <div>
          <label for="phone" class="form-label">Phone</label>
          <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <div>
          <label for="address" class="form-label">Address</label>
          <textarea name="address" id="address" class="form-control" rows="5"></textarea>
        </div>
        <div>
          <button type="submit" class="btn btn-primary form-control">Register</button>
        </div>
        <div>
          already account? <a href="/login" class="text-decoration-none">Login</a>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
</body>

</html>