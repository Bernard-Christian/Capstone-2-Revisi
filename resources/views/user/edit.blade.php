@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Data Pengguna</h1>
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
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        {{ implode('', $errors->all(':message')) }}
                                    </div>
                                @endif

                                <form method="post" action="{{ route('user-update', ['user'=>$user->id]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="user-name">Nama</label>
                                        <input type="text" class="form-control" id="user-name"
                                               placeholder="Contoh: John Doe" name="name" required autofocus
                                               maxlength="100" value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="user-role">Role</label>
                                        <select class="form-control" id="user-role" name="role">
                                            <option value="0" selected>--Select Role--</option>
                                            <option value="admin" {{ $user->role }} name="role">Admin</option>
                                            <option value="prodi" {{ $user->role === 'user' }} name="role">Program Studi</option>
                                            <option value="mahasiswa" {{ $user->role }} name="role">Mahasiswa</option>
                                            <option value="fakultas" {{ $user->role }} name="role">Fakultas</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')

@endsection

@section('ExtraJS')

@endsection
