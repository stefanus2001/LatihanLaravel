@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="css/student.css">
    <div class="form">
        <div class="form-dalam">

            {{-- Button Logout --}}
            @auth
            <form action="/logout" method="post">
                @csrf
                <div >
                    <button type="submit" style="border: none"><img class="logout" src="image/student/logout.png"></button>
                </div>

            </form>

            {{-- Form Update Profile --}}
            <form action="profile/update" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="judul"><b>PROFILE</b></div>
                <img class="garis">

                <div class="name-profile" align="center">
                    <h1><b>{{ auth()->user()->name }}</b></h1>
                </div>

                @if (auth()->user()->image != null)
                    <div class="image-profile" style="height: 100%; width: 100%; overflow:hidden">
                        <img class="image2" src="storage/{{ auth()->user()->image }}">
                    </div>
                @else
                    <div class="image-profile" style="height: 100%; width: 100%; overflow:hidden">
                        <img class="image2" src="image/student/image.png">
                    </div>
                @endif

                <div class="d-flex justify-content-center ganti-image">
                    <div class="btn btn-secondary button-foto">
                        <label class="form-label" for="image"><b>Upload Foto</b></label>
                        <input type="file" class="form-control d-none" name="image" id="image" />
                    </div>
                </div>

                <div class="input-userID">
                    <b>User ID</b> <br>
                    <input readonly type="text" name="user_id" value="{{ auth()->user()->user_id }}">
                </div>

                <div class="input-newpw">
                    <b>Password</b> <br>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#changePassword">
                        <b>Ubah Password</b>
                        </button>
                </div>

                <div class="input-nohp">
                    <b>Nomor HP</b> <br>
                    <input type="text" name="no_hp" value="{{ auth()->user()->no_hp }}">
                </div>

                <div class="input-email">
                    <b>Email</b><br>
                    <input type="text" name="email" value="{{ auth()->user()->email }}">
                </div>

                <div>
                    <div class="notif-profile">
                        @if (session()->has('success'))
                        <div class="notif-berhasil" role="alert">
                            <b>{{ session('success') }}</b>
                        </div>
                        @endif
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn button-tambah btn-primary">
                        <b>SIMPAN</b>
                    </button>
                </div>

                <div>
                    <img class="image-wisuda" src="image/student/wisuda.png">
                </div>
            </form>


            <!-- Ganti Password -->
            <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="/profile/changePassword" method="post">
                            @csrf
                            <div class="modal-header">
                                <div class="judul-modal">
                                    <h3 class="modal-title" id="exampleModalLongTitle">MASUKAN PASSWORD BARU</h3>
                                </div>
                                <img class="garis-modal">
                            </div>
                            <div class="modal-body">
                                <table class="table-modal">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->user_id }}">
                                    <tr>
                                        <td>New password</td>
                                        <td><input type="password" name="password"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <table class="table-modal">
                                    <tr>
                                        <td><button type="button" class="btn btn-secondary button-batal" data-dismiss="modal"><b>BATAL</b></button></td>
                                        <td align="right"><button type="submit" class="btn btn-primary button-simpan"><b>SIMPAN</b></button></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth
@endsection
