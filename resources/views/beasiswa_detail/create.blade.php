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
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="user-id" name="users_id" value="{{ Auth::user()->id }}" readonly>
                                            </div>
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
                                    <div class ="form-group">
                                        <label for="beasiswa-dokumen" class="col-form-label col-sm-2">Dokumen Beasiswa</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control-file" id="beasiswa-dokumen" name="dokumen_beasiswa" accept="application/pdf" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="beasiswa-detail-ipk">IPK</label>
                                        <input type="text" class="form-control" id="beasiswa-detail-ipk"
                                               placeholder="Contoh: 3" name="ipk" required autofocus
                                               maxlength="100">
                                    </div>
                                    <div class="form-group">
                                        <label for="beasiswa-detail-porto">Poin Portofolio</label>
                                        <input type="text" class="form-control" id="beasiswa-detail-porto"
                                               placeholder="Contoh: Text" name="poin_portofolio" required autofocus
                                               maxlength="100">
                                    </div>
                                    <div class="form-group">
                                        <label for="beasiswa-detail-jenis-beasiswa" class="col-form-label col-sm-2">Jenis Beasiswa</label>
                                        <div class="col-sm-8">
                                            <select id="beasiswa-detail-jenis-beasiswa" name="jenis_beasiswa" required class="form-control select2">
                                                @foreach($jbs as $jb)
                                                    <option name="jenis_beasiswa" value="{{ $jb->jenis_beasiswa }}">{{ $jb->jenis_beasiswa }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="beasiswa-detail-semester">Semester</label>
                                        <input type="text" class="form-control" id="beasiswa-detail-semester"
                                               placeholder="Contoh: Text" name="semester" required autofocus
                                               maxlength="45">
                                    </div>
                                    <div class="form-group">
                                        <label for="beasiswa-detail-prodi">Prodi</label>
                                        <input type="text" class="form-control" id="beasiswa-detail-prodi"
                                               placeholder="Contoh: Text" name="prodi" required autofocus
                                               maxlength="100">
                                    </div>
                                    <div class="form-group">
                                        <label for="beasiswa-detail-fakultass">Fakultas</label>
                                        <input type="text" class="form-control" id="beasiswa-detail-fakultas"
                                               placeholder="Contoh: Text" name="fakultas" required autofocus
                                               maxlength="100">
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
