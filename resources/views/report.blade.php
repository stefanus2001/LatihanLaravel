@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="css/student.css">

    <div class="form">
        <div class="form-dalam">
        <div class="judul" ><b>REPORT LIST</b></div>
        <div class="gambar-orang" ><img alt="Gambar orang" src="image/student/buku.png" /></div>
        <img class="garis">

        @auth
            <div>
                <form action="/report/export" method="get">
                    <input type="text" name="year_entrance" value="{{ $oldYear }}" hidden>
                    <input type="text" name="subject_name" value="{{ $oldSubject }}" hidden>
                    <input type="text" name="student_name" value="{{ $oldStudent }}" hidden>
                    <button type="submit" class="btn button-export btn-secondary" data-toggle="modal" data-target="#createEnrollment">
                        <b>EXPORT</b>
                    </button>
                </form>
            </div>
        @endauth

        <form action="/report" method="get">
            <div class="filter">
                <div class="yearf">
                    <b>Year</b>
                    <select name="year_entrance" id="yearfilter">
                        @if ($oldYear  != null) {
                            <option value="{{ $oldYear }}">{{ $oldYear }}</option>
                        }@endif
                        <option value="">None</option>
                        @foreach ($years as $student)
                            <option value="{{ $student->year_entrance }}">{{ $student->year_entrance }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="subjectf">
                    <b>Subject Name</b>
                    <select name="subject_name" id="subjectfilter">
                        @if ($oldSubject  != null) {
                            <option value="{{ $oldSubject }}">{{ $oldSubject }}</option>
                        }@endif
                        <option value="">None</option>
                        @foreach ($subjects as $subject)
                            <option> {{ $subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="studentf">
                    <b>Student Name</b>
                    <select name="student_name" id="studentfilter" default="Pilih">
                        @if ($oldStudent  != null) {
                            <option value="{{ $oldStudent }}">{{ $oldStudent }}</option>
                        }@endif
                        <option value="">None</option>
                        @foreach ($students as $student)
                            <option> {{ $student->student_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="button-filter">
                    <button class="btn btn-secondary" type="submit"><b>Search</b></button>
                </div>
            </div>
        </form>

        <div class="form-table-report">
            <table class="table-list">
                <thead class="thead-list">
                    <tr class="td-list">
                        <th>Subject ID</th>
                        <th>Subject Name</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Year</th>
                        <th>Grade</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr class="td-list">
                            <td class="td-list">{{ $report->subject_id }}</td>
                            <td class="td-list">{{ $report->subject_name }}</td>
                            <td class="td-list">{{ $report->student_id }}</td>
                            <td class="td-list">{{ $report->student_name }}</td>
                            <td class="td-list">{{ $report->year_entrance }}</td>
                            <td class="td-list">{{ $report->status }}</td>
                            <td class="td-list">{{ $report->grade }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection
