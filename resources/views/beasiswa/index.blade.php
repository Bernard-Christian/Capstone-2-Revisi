@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Periode Beasiswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Periode Beasiswa</li>
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
                    @if(Auth::user()->role == 'fakultas')
                        <form action="{{ route('periodebs-create') }}" method="get">
                            <button type="submit" class="btn btn-primary">Tambah Periode Beasiswa</button>
                        </form>
                    @endif

                    <br>
                    <br>
                    <table id="table-mk" class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID Beasiswa</th>
                            <th>Periode Awal Beasiswa</th>
                            <th>Periode Akhir Beasiswa</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bs as $b)
                            <tr>
                                <td>{{ $b->id_beasiswa }}</td>
                                <td>{{ $b->periode_awal_beasiswa }}</td>
                                <td>{{ $b->periode_akhir_beasiswa }}</td>
                                <td>
                                    @if(Auth::user()->role == 'fakultas')
                                        <a href="{{ route('periodebs-edit', ['id' => $b->id_beasiswa]) }}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('periodebs-delete', ['id' => $b->id_beasiswa]) }}" class="btn btn-danger del-button" role="button"><i class="fas fa-trash"></i></a>
                                    @endif
                                    @if(Auth::user()->role == 'mahasiswa')
                                        <a href="{{ route('beasiswa_detail-list') }}" class="btn btn-outline-warning" role="button" data-deadline="{{ $b->periode_akhir_beasiswa }}"><i class="fas fa-edit"></i></a>
                                    @endif
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
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}">
@endsection

@section('ExtraJS')
    <script>
        $('.btn-outline-warning').on('click', function(event) {
            var deadline = $(this).data('deadline');
            checkPollingDeadline(event, deadline);
        });
        function checkPollingDeadline(event, deadline) {
            var now = new Date();
            var endPolling = new Date(deadline);

            if (now > endPolling) {
                alert("Waktu polling telah berakhir. Anda tidak bisa mengakses halaman ini lagi.");
                event.preventDefault();
            } else {
                window.location.href = "{{ route('periodebs-list') }}";
            }
        }
    </script>

    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#table-mk').DataTable();
    </script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.js') }}"></script>
@endsection
