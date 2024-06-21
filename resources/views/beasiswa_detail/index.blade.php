@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Beasiswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Beasiswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    @if(session('alert'))
                        <div class="alert alert-danger">
                            {{ session('alert') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        @if(Auth::user()->role == 'mahasiswa')
                            <form action="{{ route('beasiswa_detail-create') }}">
                                <button type="submit" class="btn btn-primary">Tambah Beasiswa</button>
                            </form>
                        @endif
                    <br>
                    <br>
                    <table id="table-mk" class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID Beasiswa Detail</th>
                            <th>ID User</th>
                            <th>ID Beasiswa</th>
                            <th>Jenis Beasiswa</th>
                            <th>IPK</th>
                            <th>Poin Portofolio</th>
                            <th>Dokumen Beasiswa</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bds as $bd)
                            <tr>
                                <td>{{ $bd->id_beasiswa_detail }}</td>
                                <td>{{ $bd->users_id }}</td>
                                <td>{{ $bd->id_beasiswa }}</td>
                                @foreach($bds as $bd)
                                    <td>{{ $jb->jenis_beasiswa}}</td>
                                @endforeach
                                <td>{{ $bd->ipk }}</td>
                                <td>{{ $bd->poin_portofolio }}</td>
                                <td><a href="{{ Storage::url($bd->dokumen_beasiswa) }}" target="_blank">Download Dokumen</a></td>
                                <td>
                                    <a href="{{ route('beasiswa_detail-edit', ['id' => $bd->id_beasiswa_detail]) }}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('beasiswa_detail-delete', ['id' => $bd->id_beasiswa_detail]) }}" class="btn btn-danger del-button" role="button"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}">
@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#table-user').DataTable();
    </script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.js') }}"></script>
@endsection
