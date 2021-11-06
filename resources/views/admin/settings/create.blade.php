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
        <a href="{{ url('/admin/item') }}" class="nav-link">
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
        <a href="{{ url('/admin/setting') }}" class="nav-link active">
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
                    <form method="POST" action={{ url('/admin/item') }}>
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>No WA</label>
                                <input type="text" class="form-control" name="no-wa" placeholder="Masukkan nomor WA">
                            </div>
                            <div class="form-group">
                                <label>Tentang</label>
                                <textarea class="form-control" name="tentang" id="" cols="10" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="Alamat" id="" cols="10" rows="4"></textarea>
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

