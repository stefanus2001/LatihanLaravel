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

        <div class="judul" ><b>STUDENTS LIST</b></div>
        <div class="gambar-orang" ><img alt="Gambar orang" src="image/student/orang.png" /></div>
        <img class="garis">

        @auth
            <div>
                <button type="button" class="btn button-tambah btn-primary" data-toggle="modal" data-target="#createStudent">
                    <span><b>TAMBAH</b></span>
                </button>
            </div>
        @endauth

        {{-- Tampilan Student List --}}
        <div class="form-table">
            <table class="table-list">
                <thead class="thead-list">
                    <tr class="td-list">
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Birth Date</th>
                        <th>Year Entrance</th>
                        @auth
                            <th>Action</th>
                        @endauth

                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="td-list">
                            <td class="td-list">{{ $student->student_id }}</td>
                            <td class="td-list">{{  $student->student_name }}</td>
                            <td class="td-list">{{  $student->date_of_birth }}</td>
                            <td class="td-list">{{  $student->year_entrance }}</td>
                            @auth
                                <td class="td-list">
                                    <button type="button" class="btn button-list btn-warning" data-toggle="modal" data-target="#editStudent{{ $student->student_id }}">
                                    <b>Edit</b>
                                    </button>
                                    <button type="button" class="btn button-list btn-danger" data-toggle="modal" data-target="#deleteStudent{{ $student->student_id }}">
                                    <b>Hapus</b>
                                    </button>
                                </td>
                            @endauth

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal Create Student -->
        <div class="modal fade" id="createStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/student" method="post">
                    @csrf
                    <div class="modal-header">
                        <div class="judul-modal">
                            <h3 class="modal-title" id="exampleModalLongTitle">CREATE STUDENT</h3>
                        </div>
                        <img class="garis-modal">
                    </div>
                    <div class="modal-body">
                        <table class="table-modal">
                            <tr>
                                <td><b>ID</b></td>
                                <td><input type="text" name="student_id" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td><b>Name</b></td>
                                <td><input type="text" name="student_name" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td><b>Birth Date</b></td>
                                <td><input type="date" name="date_of_birth" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td><b>Year Entrance</b></td>
                                <td><input type="number" name="year_entrance" class="form-control" required></td>
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


        <!-- Modal Edit Student -->
        @foreach ($students as $data)
        <div class="modal fade" id="editStudent{{ $data->student_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/student/update" method="post">
                    @csrf
                    <div class="modal-header">
                        <div class="judul-modal">
                            <h3 class="modal-title" id="exampleModalLongTitle">EDIT STUDENT</h3>
                        </div>
                        <img class="garis-modal">
                    </div>
                    <div class="modal-body">
                        <table class="table-modal">
                            <tr>
                                <td><b>ID</b></td>
                                <td><input type="text" name="student_id" class="form-control" value="{{ $data->student_id }}" required readonly></td>
                            </tr>
                            <tr>
                                <td><b>Name</b></td>
                                <td><input type="text" name="student_name" class="form-control" value="{{ $data->student_name }}" required></td>
                            </tr>
                            <tr>
                                <td><b>Birth Date</b></td>
                                <td><input type="date" name="date_of_birth" class="form-control" value="{{ $data->date_of_birth }}" required></td>
                            </tr>
                            <tr>
                                <td><b>Year Entrance</b></td>
                                <td><input type="number" name="year_entrance" class="form-control" value="{{ $data->year_entrance }}" required></td>
                            </tr>
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

        {{-- Hapus Student --}}
        @foreach ($students as $data)
        <div class="modal fade" id="deleteStudent{{ $data->student_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/student/delete" method="post">
                    @csrf
                    <div class="modal-header">
                        <div class="judul-modal">
                            <h3 class="modal-title" id="exampleModalLongTitle">DELETE STUDENT</h3>
                        </div>
                        <img class="garis-modal">
                    </div>
                    <div class="modal-body">
                        <input type="text" name="student_id" class="form-control" value="{{ $data->student_id }}" hidden>
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
