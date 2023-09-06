<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/daftar.css">
</head>
<body>
    <div class="daftar-page">
        <div class="overlap-wrapper">
            <div class="overlap">
                <img class="background-blur" alt="Background blur" src="image/student/bg3.jpg" />
                <img class="logo-yogya-akademik" alt="Logo yogya akademik" src="image/student/yogyaakademik.png" />

                {{-- Form Daftar Akun --}}
                <form action="/daftar" method="post">
                    @csrf
                    <div class="form-daftar-akun">

                        <div class="judul-DAFTAR"><b>DAFTAR AKUN</b></div>
                        <img class="garis"/>
                        <div class="text-wrapper">Ayo daftarkan akunmu sekarang!!!</div>

                        <div class="input-nama">
                            <input class="form-control" name="name" id="name" type="text" placeholder= "Name" required value="{{ old('name') }}">
                        </div>

                        <div class="input-userID">
                            <input class="form-control" name="user_id" id="user_id" type="text" placeholder= "User ID" required value="{{ old('user_id') }}">
                        </div>

                        <div class="input-email">
                            <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="email" placeholder= "Email" required value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="input-password">
                            <input class="form-control @error('password') is-invalid @enderror" name="password" id="password" type="password" placeholder= "Password" required value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div>
                            <input type="text" name="flag_active" value="1" hidden>
                        </div>

                        {{-- Button Daftar --}}
                        <input class="button-daftar" type="submit" value="DAFTAR">
                        <a class="cancel" href="login" style="text-decoration:none">X</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

