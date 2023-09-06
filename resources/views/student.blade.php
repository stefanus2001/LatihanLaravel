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



            {{-- Button Tambah Student --}}
            @auth
                <div>
                    <button type="button" class="btn button-tambah btn-primary" data-toggle="modal" data-target="#createStudent">
                        <span><b>TAMBAH</b></span>
                    </button>
                </div>
            @endauth

            {{-- Tampilan Student List --}}
            <div class="judul" ><b>STUDENTS LIST</b></div>
            <div class="gambar-orang" ><img alt="Gambar orang" src="image/student/orang.png" /></div>
            <img class="garis">
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
                                        <button class="btn button-list btn-warning editStudent" data-toggle="modal" data-s="{{ $student }}" data-target="#editStudent">
                                        <b>Edit</b>
                                        </button>
                                        <button class="btn button-list btn-danger hapusStudent" data-toggle="modal" data-id="{{ $student }}" data-target="#deleteStudent">
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
            <div class="modal fade" id="editStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <td><input type="text" name="student_id" id="student_id" class="form-control" required readonly></td>
                                </tr>
                                <tr>
                                    <td><b>Name</b></td>
                                    <td><input type="text" name="student_name" id="student_name" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><b>Birth Date</b></td>
                                    <td><input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><b>Year Entrance</b></td>
                                    <td><input type="number" name="year_entrance" id="year_entrance" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><input type="number" name="flag_active" class="form-control" hidden></td>
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

            {{-- Hapus Student --}}
            <div class="modal fade" id="deleteStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <input type="hidden" name="student_id" class="form-control" id="studentID">
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
        $('.editStudent').click(function(){
            const data = $(this).data('s');
            $('#student_id').val(data.student_id);
            $('#student_name').val(data.student_name);
            $('#date_of_birth').val(data.date_of_birth);
            $('#year_entrance').val(data.year_entrance);
            $('#flag_active').val(data.flag_active);
        })

        $('.hapusStudent').click(function(){
            const data = $(this).data('id');
            $('#studentID').val(data.student_id);
        })
    </script>
@endsection
