@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Fakultas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Fakultas</li>
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
                        <form method="post" action="{{ route('fakultas-store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="fakultas-id">ID Fakultas</label>
                                <input type="text" class="form-control" id="fakultas-id"
                                       placeholder="Contoh: 1" name="id_fakultas" required autofocus
                                       maxlength="10">
                            </div>
                            <div class="form-group">
                                <label for="fakultas">Fakultas</label>
                                <input type="text" class="form-control" id="fakultas"
                                       placeholder="Contoh: Text" name="fakultas" required autofocus
                                       maxlength="100">
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
