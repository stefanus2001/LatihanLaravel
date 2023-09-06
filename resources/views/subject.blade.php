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

            {{-- Button Tambah Subject --}}
            @auth
                <div>
                    <button type="button" class="btn button-tambah btn-primary" data-toggle="modal" data-target="#createSubject">
                        <span><b>TAMBAH</b></span>
                    </button>
                </div>
            @endauth

            {{-- Tampilan Subject List --}}
            <div class="judul" ><b>SUBJECT LIST</b></div>
            <div class="gambar-orang" ><img alt="Gambar orang" src="image/student/orang.png" /></div>
            <img class="garis">
            <div class="form-table">
                <table class="table-list">
                    <thead class="thead-list">
                        <tr class="td-list">
                            <th>Subject ID</th>
                            <th>Name</th>
                            <th>Credit</th>
                            <th>Pre Required</th>
                            @auth
                                <th>Action</th>
                            @endauth

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr class="td-list">
                                <td class="td-list">{{ $subject->subject_id }}</td>
                                <td class="td-list">{{ $subject->subject_name }}</td>
                                <td class="td-list">{{ $subject->credit }}</td>
                                <td class="td-list">{{ $subject->subject_pre_required }}</td>
                                @auth
                                    <td class="td-list">
                                        <button type="button" class="btn button-list btn-warning editSubject" data-toggle="modal" data-target="#editSubject" data-s="{{ $subject }}">
                                        <b>Edit</b>
                                        </button>
                                        <button type="button" class="btn button-list btn-danger hapusSubject" data-id="{{ $subject }}" data-toggle="modal" data-target="#deleteSubject">
                                        <b>Hapus</b>
                                        </button>
                                    </td>
                                @endauth

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal Create Subject -->
            <div class="modal fade" id="createSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="/subject" method="post">
                            @csrf
                            <div class="modal-header">
                                <div class="judul-modal">
                                    <h3 class="modal-title" id="exampleModalLongTitle">CREATE SUBJECT</h3>
                                </div>
                                <img class="garis-modal">
                            </div>
                            <div class="modal-body">
                                <table class="table-modal">
                                    <tr>
                                        <td><b>Subject ID</b></td>
                                        <td><input type="text" name="subject_id" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><b>Subject Name</b></td>
                                        <td><input type="text" name="subject_name" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><b>Credit</b></td>
                                        <td><input type="number" name="credit" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><b>Pre Required</b></td>
                                        <td><select name="subject_pre_required">
                                            <option value="-">Pilih</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->subject_id }}">{{ $subject->subject_id }} - {{ $subject->subject_name }}</option>
                                            @endforeach
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

                <!-- Modal Edit Subject -->
                <div class="modal fade" id="editSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="subject/update" method="post">
                            @csrf
                            <div class="modal-header">
                                <div class="judul-modal">
                                    <h3 class="modal-title" id="exampleModalLongTitle">EDIT SUBJECT</h3>
                                </div>
                                <img class="garis-modal">
                            </div>
                            <div class="modal-body">
                                <table class="table-modal">
                                    <tr>
                                        <td><b>Subject ID</b></td>
                                        <td><input type="text" name="subject_id"  id="subject_id" class="form-control"  readonly required></td>
                                    </tr>
                                    <tr>
                                        <td><b>Subject Name</b></td>
                                        <td><input type="text" name="subject_name"  id="subject_name" class="form-control"  required></td>
                                    </tr>
                                    <tr>
                                        <td><b>Credit</b></td>
                                        <td><input type="number" name="credit" id="credit" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><b>Pre Required</b></td>
                                        <td><select name="subject_pre_required"  id="subject_pre_required">
                                            <option value="-">Tidak ada</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->subject_id }}">{{ $subject->subject_id }} - {{ $subject->subject_name }}</option>
                                            @endforeach
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

                {{-- Hapus Subject --}}
                <div class="modal fade" id="deleteSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="/subject/delete" method="post">
                            @csrf
                            <div class="modal-header">
                                <div class="judul-modal">
                                    <h3 class="modal-title" id="exampleModalLongTitle">DELETE SUBJECT</h3>
                                </div>
                                <img class="garis-modal">
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="subject_id" class="form-control" id="subjectID">
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
        $('.editSubject').click(function(){
            const data = $(this).data('s');
            $('#subject_id').val(data.subject_id);
            $('#subject_name').val(data.subject_name);
            $('#credit').val(data.credit);
            $('#subject_pre_required').val(data.subject_pre_required);
        })

        $('.hapusSubject').click(function(){
            const data = $(this).data('id');
            $('#subjectID').val(data.subject_id);
        })
    </script>
@endsection
