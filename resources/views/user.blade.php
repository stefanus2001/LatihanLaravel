@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="css/student.css">

    <div class="form">
        <div class="form-dalam">

        <div class="notif">
            @if (session()->has('success'))
            <div class="notif-berhasil" role="alert">
                <b>{{ session('success') }}</b>
            </div>
            @endif
        </div>

        <div class="judul" ><b>USER LIST</b></div>
        <div class="gambar-orang" ><img alt="Gambar orang" src="image/student/orang.png" /></div>
        <img class="garis">


        @auth
            <div>
                <button type="button" class="btn button-tambah btn-primary" data-toggle="modal" data-target="#createUser">
                    <b>TAMBAH</b>
                </button>
            </div>
        @endauth



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
                            <td class="td-list">{{ $user->flag_active }}</td>

                            @auth
                                <td class="td-list">
                                    <button type="button" class="btn button-list btn-warning" data-toggle="modal" data-target="#editUser{{ $user->user_id }}">
                                    <b>Edit</b>
                                    </button>
                                    <button type="button" class="btn button-list btn-danger" data-toggle="modal" data-target="#deleteUser{{ $user->user_id }}">
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
                                <td><label class="switch">
                                    <input type="checkbox" name="flag_active" value="1"><span class="slider"></span>
                                  </label></td>
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
        @foreach ($users as $data)
        <div class="modal fade" id="editUser{{ $data->user_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                <td><input type="text" name="user_id" class="form-control" value="{{ $data->user_id }}" required readonly></td>
                            </tr>
                            <tr>
                                <td><b>Name</b></td>
                                <td><input type="text" name="name" class="form-control" value="{{ $data->name }}" required></td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td><input type="email" name="email" class="form-control" value="{{ $data->email }}" required></td>
                            </tr>
                            {{-- <tr>
                                <td><b>Flag Active</b></td>
                                <td><label class="switch">
                                    <input type="checkbox" name="flag_active" value={{ $data->flag_active }}><span class="slider"></span>
                                  </label></td>
                            </tr> --}}
                            <tr>
                                <td><input type="number" name="flag_active" class="form-control" value="{{ $data->flag_active }}" hidden></td>
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
        @endforeach


        <!-- Delete User -->
        @foreach ($users as $data)
        <div class="modal fade" id="deleteUser{{ $data->user_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <input type="text" name="user_id" class="form-control" value="{{ $data->user_id }}" hidden>
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
        @endforeach
        </div>
    </div>
@endsection
