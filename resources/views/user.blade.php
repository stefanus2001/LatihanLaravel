@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="css/student.css">

    <div class="form">
        <div class="form-dalam">

            {{-- Alert --}}
            <div class="notif">
                @if (session()->has('success'))
                <div class="notif-berhasil" role="alert">
                    <b>{{ session('success') }}</b>
                </div>
                @endif
            </div>

            {{-- Alert --}}
            <div class="notif-gagal ">
                @if (session()->has('error'))
                <div role="alert">
                    <b>{{ session('error') }}</b>
                </div>
                @endif
            </div>

            {{-- Button Tambah User --}}
            @auth
                <div>
                    <button type="button" class="btn button-tambah btn-primary" data-toggle="modal" data-target="#createUser">
                        <b>TAMBAH</b>
                    </button>
                </div>
            @endauth

            {{-- Tampilan list User --}}
            <div class="judul" ><b>USER LIST</b></div>
            <div class="gambar-orang" ><img alt="Gambar orang" src="image/student/orang.png" /></div>
            <img class="garis">
            <div class="form-table">
                <table class="table-list">
                    <thead class="thead-list">
                        <tr class="td-list">
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Flag Active</th>
                            @auth
                                <th>Action</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="td-list">
                                <td class="td-list">{{ $user->user_id }}</td>
                                <td class="td-list">{{  $user->name }}</td>
                                @if ($user->flag_active == 1)
                                    <td class="td-list">Active</td>
                                @else
                                    <td class="td-list">Non Active</td>
                                @endif

                                @auth
                                    <td class="td-list">
                                        <button type="button" class="btn button-list btn-warning editUser" data-u="{{ $user }}" data-toggle="modal" data-target="#editUser">
                                        <b>Edit</b>
                                        </button>
                                        <button type="button" class="btn button-list btn-danger hapusUser" data-id="{{ $user }}" data-toggle="modal" data-target="#deleteUser">
                                        <b>Hapus</b>
                                        </button>
                                    </td>
                                @endauth
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal Create User -->
            <div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="/user" method="post">
                        @csrf
                        <div class="modal-header">
                            <div class="judul-modal">
                                <h3 class="modal-title" id="exampleModalLongTitle">CREATE USER</h3>
                            </div>
                            <img class="garis-modal">
                        </div>
                        <div class="modal-body">
                            <table class="table-modal">
                                <tr>
                                    <td><b>User ID</b></td>
                                    <td><input type="text" name="user_id" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><b>Name</b></td>
                                    <td><input type="text" name="name" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td><input type="email" name="email" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><b>Password</b></td>
                                    <td><input type="password" name="password" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><b>Flag Active</b></td>
                                    <td><select name="flag_active">
                                        <option value="1">Active</option>
                                        <option value="0">Non Active</option>
                                    </select></td>
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

            <!-- Modal Edit User -->
            <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="/user/update" method="post">
                        @csrf
                        <div class="modal-header">
                            <div class="judul-modal">
                                <h3 class="modal-title" id="exampleModalLongTitle">EDIT USER</h3>
                            </div>
                            <img class="garis-modal">
                        </div>
                        <div class="modal-body">
                            <table class="table-modal">
                                <tr>
                                    <td><b>User ID</b></td>
                                    <td><input type="text" name="user_id" id="user_id" class="form-control" required readonly></td>
                                </tr>
                                <tr>
                                    <td><b>Name</b></td>
                                    <td><input type="text" name="name" autocomplete="off" id="name" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td><input type="email" name="email" id="email" class="form-control" required></td>
                                </tr>
                                {{-- <tr>
                                    <td><b>Flag Active</b></td>
                                    <td><label class="switch">
                                        <input type="checkbox" name="flag_active" id="flag_active"><span class="slider"></span>
                                    </label></td>
                                </tr> --}}
                                <tr>
                                    <td><b>Flag Active</b></td>
                                    <td><select name="flag_active" id="flag_active">
                                        <option value="1">Active</option>
                                        <option value="0">Non Active</option>
                                    </select></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <table class="table-modal">
                                <tr>
                                    <td><button type="button" class="btn btn-secondary button-batal" data-dismiss="modal"><b>BATAL</b></button></td>
                                    <td align="right"><button type="submit" class="btn btn-primary button-simpan"><b>PERBAHARUI</b></button></td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
                </div>
            </div>


            <!-- Delete User -->
            <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="/user/delete" method="post">
                        @csrf
                        <div class="modal-header">
                            <div class="judul-modal">
                                <h3 class="modal-title" id="exampleModalLongTitle">DELETE USER</h3>
                            </div>
                            <img class="garis-modal">
                        </div>
                        <div class="modal-body">
                            <input type="text" name="user_id" id="userID" class="form-control" hidden>
                            <h4>Apakah yakin ingin menghapus data ini?</h4>
                        </div>
                        <div class="modal-footer">
                            <table class="table-modal">
                                <tr>
                                    <td><button type="button" class="btn btn-secondary button-batal" data-dismiss="modal"><b>BATAL</b></button></td>
                                    <td align="right"><button type="submit" class="btn btn-primary button-simpan"><b>HAPUS</b></button></td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.editUser').click(function(){
            const data = $(this).data('u');
            $('#user_id').val(data.user_id);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#flag_active').val(data.flag_active);
        })

        $('.hapusUser').click(function(){
            const data = $(this).data('id');
            $('#userID').val(data.user_id);
        })
    </script>
@endsection
