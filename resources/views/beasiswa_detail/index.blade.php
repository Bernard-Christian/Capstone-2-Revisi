@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Beasiswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Beasiswa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

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
                            @if($hasApplied)
                                <div class="alert alert-info">
                                    You have already applied for a scholarship.
                                </div>
                            @else
                                <form action="{{ route('beasiswa_detail-create') }}">
                                    <button type="submit" class="btn btn-primary">Tambah Beasiswa</button>
                                </form>
                            @endif
                        @endif
                    <br>
                    <div class="table-responsive">
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
                                <th>Semester</th>
                                <th>Prodi</th>
                                <th>Fakultas</th>
                                @if(Auth::user()->role == 'mahasiswa')
                                    <th>Aksi</th>
                                @endif
                                <th>Approve by Prodi</th>
                                <th>Approve by Fakultas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bds as $bd)
                                <tr>
                                    <td>{{ $bd->id_beasiswa_detail }}</td>
                                    <td>{{ $bd->users_id }}</td>
                                    <td>{{ $bd->beasiswa_id_beasiswa }}</td>
                                    <td>{{ $bd->jenis_beasiswa }}</td>
                                    <td>{{ $bd->ipk }}</td>
                                    <td>{{ $bd->poin_portofolio }}</td>
                                    <td><a href="{{ Storage::url($bd->dokumen_beasiswa) }}" target="_blank">View Dokumen</a></td>
                                    <td>{{ $bd->semester }}</td>
                                    <td>{{ $bd->prodi }}</td>
                                    <td>{{ $bd->fakultas }}</td>
                                    @if(Auth::user()->role == 'mahasiswa')
                                        <td>
                                            @if(!$bd->prodi_approved)
                                                <a href="{{ route('beasiswa_detail-edit', ['id' => $bd->id_beasiswa_detail]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('beasiswa_detail-delete', ['id' => $bd->id_beasiswa_detail]) }}" class="btn btn-danger del-button"><i class="fas fa-trash"></i></a>
                                            @else
                                                <span class="badge badge-secondary">Action not allowed</span>
                                            @endif
                                        </td>
                                    @endif
                                    <td>
                                        @if(!$bd->prodi_approved)
                                            @if(Auth::user()->role == 'prodi')
                                                <form action="{{ route('beasiswa_detail-approve-prodi', ['id' => $bd->id_beasiswa_detail]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Approve Prodi</button>
                                                </form>
                                            @endif
                                        @else
                                            <span class="badge badge-success">Approved by Prodi</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($bd->prodi_approved && !$bd->fakultas_approved)
                                            @if(Auth::user()->role == 'fakultas')
                                                <form action="{{ route('beasiswa_detail-approve-fakultas', ['id' => $bd->id_beasiswa_detail]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Approve Fakultas</button>
                                                </form>
                                            @endif
                                        @elseif($bd->fakultas_approved)
                                            <span class="badge badge-success">Approved by Fakultas</span>
                                        @else
                                            <span class="badge badge-warning">Pending Approval</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}">
    <style>
        .table-responsive {
            overflow-x: auto;
        }

        table.dataTable thead th, table.dataTable tbody td {
            white-space: nowrap;
            padding: 5px 10px;
        }
    </style>
@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#table-mk').DataTable({
            responsive: true
        });
    </script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.js') }}"></script>
@endsection
