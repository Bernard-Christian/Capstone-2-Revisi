@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Beasiswa</h1>
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
                    <div class="card-body">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{ implode('', $errors->all(':message')) }}
                            </div>
                        @endif
                        @if(Auth::user()->role == 'mahasiswa')
                                <form method="post" action="{{ route('beasiswa_detail-store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="beasiswa-detail-id">ID</label>
                                        <input type="text" class="form-control" id="beasiswa-detail-id"
                                               placeholder="Contoh: Text" name="id_beasiswa_detail" required autofocus
                                               maxlength="100">
                                    </div>
                                    <div class="form-group">
                                        <label for="user-id" class="col-form-label col-sm-2">ID User</label>
                                        <div class="col-sm-8">
                                            <select id="user-id" name="users_id" required class="form-control select2">
                                                @foreach($users as $user)
                                                    <option name="id" value="{{ $user->id }}">{{ $user->id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="beasiswa-id" class="col-form-label col-sm-2">ID Beasiswa</label>
                                            <div class="col-sm-8">
                                                <select id="beasiswa-id" name="beasiswa_id_beasiswa" required class="form-control select2">
                                                    @foreach($bs as $b)
                                                        <option name="id_beasiswa" value="{{ $b->id_beasiswa }}">{{ $b->id_beasiswa }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="beasiswa-detail-jenis" class="col-form-label col-sm-2">Jenis Beasiswa</label>
                                        <div class="col-sm-8">
                                            <select id="beasiswa-detail-jenis" name="jenis_beasiswa_id_jenis_beasiswa" required class="form-control select2">
                                                @foreach($jbs as $jb)
                                                    <option name="id_jenis_beasiswa" value="{{ $b->id_jenis_beasiswa }}">{{ $b->id_jenis_beasiswa }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class ="form-group">
                                        <label for="beasiswa-dokumen" class="col-form-label col-sm-2">Dokumen Beasiswa</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control-file" id="beasiswa-dokumen" name="dokumen_beasiswa" accept="application/pdf" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                        @endif
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
