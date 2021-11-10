@extends('layouts.admin')

@section('sidebar-menu')
    @include('includes.sidebar-admin')
@endsection

@section('box')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('social-media.update', $socmed->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama Anda">
                            </div>
                            <div class="form-group">
                                <label>Usernam</label>
                                <input type="text" class="form-control" name="username" placeholder="Masukkan username">
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" class="form-control" name="no-wa" placeholder="Masukkan link akun sosmed">
                            </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

