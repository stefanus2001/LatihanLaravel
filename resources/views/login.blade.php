<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Latihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>
  <body>
    <div class="login-page">
        <div class="overlap-wrapper">
          <div class="overlap">
            <img class="background-blur" alt="Background blur" src="image/student/bg3.jpg" />

            <form action="/login" method="post">
                @csrf
                <div class="form-login">

                    <h1 class="selamat">SELAMAT DATANG DI YOGYA AKADEMIK</h1>
                    <h2 class="judul-LOGIN"><b>LOGIN</b></h2>
                    <img class="garis"/>

                    <div class="input-user">
                        <input class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" type="text" placeholder= "User ID" required value="{{ old('user_id') }}">
                        @error('user_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-password">
                        <input class="form-control" name="password" id="password" type="password" placeholder= "Password" required>
                    </div>

                    {{-- Notif --}}
                    <div class="notif">
                        @if (session()->has('success'))
                        <div class="notif-berhasil" role="alert">
                            <b>{{ session('success') }}</b>
                        </div>
                        @endif
                    </div>

                    <div class="notif">
                        @if (session()->has('error'))
                        <div class="notif-alert" role="alert">
                            <b>{{ session('error') }}</b>
                        </div>
                        @endif
                    </div>

                    {{-- <div class="lihat-password">Lihat Password</div>
                    <img class="kotak-ceklis" alt="Kotak ceklis" src="image/student/lihatpw.png" /> --}}
                    <a class="lupapw" href="" style="text-decoration:none">Lupa Password?</a>

                    <button class="btn btn-success button-login" type="submit">LOGIN</button>
                    <div class="atau">atau</div>
                    <input class="btn button-login-with" type="submit" value="Login With Google">

                    <p class="belum-punya-akun">
                        <span class="text-wrapper">Belum punya akun? </span>
                        <a class="span" href="daftar" style="text-decoration:none">Daftar disini</a>
                    </p>

                    <img class="logo-yogya-akademik" alt="Logo yogya akademik" src="image/student/yogyaakademik.png" />

                    <img class="gambar-orang" alt="Gambar orang" src="image/student/wisuda.png" />

            </div>
        </form>
        </div>
      </div>
</body>
</html>


