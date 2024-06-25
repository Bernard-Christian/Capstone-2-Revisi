@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Data Program Studi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Program Studi</li>
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

                                <form method="post" action="{{ route('prodi-update', ['id'=>$ps->id_prodi]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="prodi-id">ID Prodi</label>
                                        <input type="text" class="form-control" id="prodi-id"
                                               placeholder="Contoh: 1" name="id_prodi" required autofocus
                                               maxlength="10" value="{{ $ps->id_prodi}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="prodi">Program Studi</label>
                                        <input type="text" class="form-control" id="prodi"
                                               placeholder="Contoh: Text" name="prodi" required autofocus
                                               maxlength="100" value="{{ $ps->prodi}}">
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
