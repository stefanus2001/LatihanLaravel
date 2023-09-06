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

            <div class="notif-gagal">
                @if (session()->has('error'))
                <div role="alert">
                    <b>{{ session('error') }}</b>
                </div>
                @endif
            </div>

            {{-- Button Tambah Enrollment --}}
            @auth
                <div>
                    <button type="button" class="btn button-tambah btn-primary" data-toggle="modal" data-target="#createEnrollment">
                        <b>TAMBAH</b>
                    </button>
                </div>
            @endauth

            {{-- Tampilan Enrollment List --}}
            <div class="judul" ><b>ENROLLMENT LIST</b></div>
            <div class="gambar-orang" ><img alt="Gambar orang" src="image/student/buku.png" /></div>
            <img class="garis">
            <div class="form-table">
                <table class="table-list">
                    <thead class="thead-list">
                        <tr class="td-list">
                            <th>Subject ID</th>
                            <th>Student ID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enrollments as $enrollment)
                            <tr class="td-list">
                                <td class="td-list">{{ $enrollment->subject_id }}</td>
                                <td class="td-list">{{ $enrollment->student_id }}</td>
                                <td class="td-list">{{ $enrollment->enroll_start_date }}</td>
                                <td class="td-list">{{ $enrollment->enroll_end_date }}</td>
                                <td class="td-list">{{ $enrollment->status }}</td>
                                <td class="td-list">{{ $enrollment->grade }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal Create Enrollment -->
            <div class="modal fade" id="createEnrollment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="/enrollment" method="post">
                        @csrf
                        <div class="modal-header">
                            <div class="judul-modal">
                                <h3 class="modal-title" id="exampleModalLongTitle">CREATE ENROLLMENT</h3>
                            </div>
                            <img class="garis-modal">
                        </div>
                        <div class="modal-body">
                            <table class="table-modal">
                                <tr>
                                    <td><b>Subject ID</b></td>
                                    <td>
                                        <select name="subject_id" required>
                                            <option>Pilih</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->subject_id }}"> {{ $subject->subject_id }} - {{ $subject->subject_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Student ID</b></td>
                                    <td>
                                        <select name="student_id" required>
                                            <option>Pilih</option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->student_id }}"> {{ $student->student_id }} - {{ $student->student_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Start Date</b></td>
                                    <td><input type="date" name="enroll_start_date" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><b>End Date</b></td>
                                    <td><input type="date" name="enroll_end_date" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><b>status</b></td>
                                    <td><select name="status" required>
                                        <option value="Passed">Passed</option>
                                        <option value="Fail">Fail</option>
                                    </select>
                                </td></td>
                                </tr>
                                <tr>
                                    <td><b>grade</b></td>
                                    <td><select name="grade" required>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
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
        </div>
    </div>
@endsection
