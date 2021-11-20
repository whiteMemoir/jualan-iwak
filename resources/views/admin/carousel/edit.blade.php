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
                    <form method="POST" action="{{ route('carousel.update', $carousel->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Banner</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama gambar" value="{{ $carousel->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File Gambar</label>
                                {{-- <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div> --}}
                                <input type="file" class="form-control" name="gambar">
                                <input type="hidden" name="gambar_lama" value="{{ $carousel->gambar }}">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="" cols="10" rows="4">{{ $carousel->keterangan }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="url" class="form-control" name="link" placeholder="Masukkan link" value="{{ $carousel->link }}">
                            </div>
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

