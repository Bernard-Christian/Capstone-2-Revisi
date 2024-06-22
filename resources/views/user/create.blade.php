@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Data Pengguna</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Pengguna</li>
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
                    <div class="card-body">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{ implode('', $errors->all(':message')) }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('user-store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="user-name">Nama</label>
                                <input type="text" class="form-control" id="user-name"
                                       placeholder="Contoh: John Doe" name="name" required autofocus
                                       maxlength="100">
                            </div>
                            <div class="form-group">
                                <label for="user-email">Email</label>
                                <input type="email" class="form-control" id="user-email" placeholder="Contoh: jdoe@domain.com"
                                       required name="email" maxlength="100">
                            </div>
                            <div class="form-group">
                                <label for="user-password">Password</label>
                                <input type="password" class="form-control" id="user-password" placeholder="Contoh: Your Secret Key"
                                       required name="password">
                            </div>
                            <div class="form-group">
                                <label for="user-password-conf">Confirm Password</label>
                                <input type="password" class="form-control" id="user-password-conf" placeholder="Contoh: Retype Your Secret Key"
                                       required name="password_confirmation">
                            </div>
                            <div class="form-group">
                                <label for="user-role">Role</label>
                                <select class="form-control" id="user-role" name="role">
                                    <option value="0" selected>--Select Role--</option>
                                    <option value="admin" name="role">Admin</option>
                                    <option value="prodi" name="role">Program Studi</option>
                                    <option value="mahasiswa" name="role">Mahasiswa</option>
                                    <option value="fakultas" name="role">Fakultas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user-status">Status</label>
                                <input type="text" class="form-control" id="user-status"
                                       placeholder="Contoh: text" name="status" required autofocus
                                       maxlength="45">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')

@endsection

@section('ExtraJS')

@endsection
