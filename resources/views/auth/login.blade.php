<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> 
</head>
<body>
    <div class="container text-capitalize "><br>
        <div class="col-md-4 col-md-offset-4 "> 
            <h2 class="text-center"><b>Catatan Penjualan</h2>
                <hr>
                @if(session('error'))
                <div class="alert alert-danger">                 
                    <b>Opps!</b> {{session('error')}}             
                </div>             
                @endif
                <form action="{{ route('actionlogin') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="password2" required autocomplete="current-password">
                                <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="togglePassword2" aria-label="Tampilkan password">
                                <span class="glyphicon glyphicon-eye-open" id="eyeIcon2"></span>
                            </button>
                                </span>
                         </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </hr>
                    <p class="text-center">Belum punya akun? <a href="{{ route('register') }}">Register</a> sekarang!</p>
                </form>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const pwd2 = document.getElementById('password2');
  const btn2 = document.getElementById('togglePassword2');
  const eye2 = document.getElementById('eyeIcon2');

  btn2.addEventListener('click', function () {
    const show = pwd2.getAttribute('type') === 'password';
    pwd2.setAttribute('type', show ? 'text' : 'password');
    btn2.setAttribute('aria-label', show ? 'Sembunyikan password' : 'Tampilkan password');

    if (show) {
      eye2.innerHTML = '<path d="M3 3l18 18"/><path d="M10.58 10.58A3 3 0 0 0 13.42 13.42"/><path d="M2.5 12S6 5 12 5s9.5 7 9.5 7-3.5 7-9.5 7S2.5 12 2.5 12z"/>';
    } else {
      eye2.innerHTML = '<path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/>';
    }
  });
});
</script>
</body>
</html>