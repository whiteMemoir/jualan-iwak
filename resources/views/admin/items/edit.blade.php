@extends('layouts.admin')
@section('sidebar-menu')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <a href="{{ url('/admin/dashboard') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/commodity') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Commodities
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/item') }}" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Items
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/carousel') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Carousel
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/social-media') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Social Medias
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/setting') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Settings
          </p>
        </a>
      </li>
    </ul>
  </nav>
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
                    <form method="POST" action="{{ route('item.update', $item->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Item</label>
                                <input type="text" value="{{ $item->nama }}" class="form-control" name="nama" placeholder="Masukkan nama item">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Komoditas</label>
                                <select class="form-control" name="commodity_id">
                                    @foreach ($commodities as $commodity)
                                    <option value="{{ $commodity->id }}">{{ $commodity->nama }}</option>                                        
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" value="{{ $item->gambar }}" class="custom-file-input" id="exampleInputFile" name="gambar">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                      </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="" cols="10" rows="4">{{ $item->deskripsi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" value="{{ $item->harga }}" class="form-control" name="harga" placeholder="Masukkan harga item">
                            </div>
                            <div class="form-group">
                                <label>Diskon</label>
                                <input type="number" value="{{ $item->diskon }}" class="form-control" name="diskon" placeholder="Masukkan diskon item">
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

