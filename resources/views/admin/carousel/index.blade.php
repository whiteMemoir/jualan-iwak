@extends('layouts.admin')

@section('sidebar-menu')
    @include('includes.sidebar-admin')
@endsection

@section('box')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">List Carousel</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <a href="{{ url('admin/carousel/create') }}" class="btn btn-primary mb-3">Tambah Item</a>
    <hr>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th width="5%">No</th>
        <th>Nama</th>
        <th>Gambar</th>
        <th class="text-center">Aksi</th>
      </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endsection
