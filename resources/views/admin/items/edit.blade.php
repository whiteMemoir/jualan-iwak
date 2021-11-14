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
                        <h3 class="card-title">Edit Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('item.update', $item->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Item</label>
                                <input type="text" value="{{ $item->nama }}" class="form-control" name="nama" placeholder="Masukkan nama item" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Jenis</label>
                                <select class="form-control" name="commodity_id" required>
                                    @foreach ($commodities as $commodity)
                                    <option value="{{ $commodity->id }}">{{ $commodity->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File Gambar</label>
                                <div class="input-group">
                                    {{-- <div class="custom-file">
                                        <input type="file" value="{{ $item->gambar }}" class="custom-file-input" id="exampleInputFile" name="gambar" required>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div> --}}
                                    <input type="file" class="form-control" name="gambar">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="" cols="10" rows="4">{{ $item->deskripsi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" value="{{ $item->harga }}" class="form-control" name="harga" placeholder="Masukkan harga item" required>
                            </div>
                            <div class="form-group">
                                <label>Diskon</label>
                                <input type="number" value="{{ $item->diskon }}" class="form-control" name="diskon" placeholder="Masukkan diskon item" required>
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

