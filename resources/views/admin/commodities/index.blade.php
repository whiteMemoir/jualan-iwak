@extends('layouts.admin')

@section('sidebar-menu')
    @include('includes.sidebar-admin')
@endsection

@section('css')
<style>
    #example1_filter,
    #example1_paginate ul {
        float: right !important;
    }
</style>
@endsection

@section('box')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">List Jenis</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <a href="{{ url('admin/commodity/create') }}" class="btn btn-primary mb-3">Tambah Item</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
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
        @forelse ($commodities as $commodity)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $commodity->nama }}</td>
          <td><img src="{{ url('storage/commodities/'.$commodity->gambar.'') }}" width="50"></td>
          <td width="12%" align="center">
            <a href="{{ route('commodity.edit', $commodity->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
            <button onclick="destroy(`{{ $commodity->id }}`, `{{ $commodity->nama }}`)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
          </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">Data tidak ada</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endsection
@section('datatable-script')
<script src={{ asset("adminlte/plugins/datatables/jquery.dataTables.min.js") }}></script>
<script src={{ asset("adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}></script>
<script src={{ asset("adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}></script>
<script src={{ asset("adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}></script>
<script src={{ asset("adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js") }}></script>
<script src={{ asset("adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") }}></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

    function destroy(id, nama) {
        swal({
            title: `Apakah anda yakin ingin menghapus ${nama}?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                //AJAX DELETE
                $.ajax({
                    url: `/admin/commodity/${id}`,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            mes = 'Data berhasil dihapus';
                            icon = 'success';
                        } else {
                            mes = 'Data gagal dihapus';
                            icon = 'error';
                        }
                        swal(mes, {icon: icon}).then(() => {
                            location.reload();
                        });
                    },
                    error: function(err) {
                        console.log(err)
                    }
                });
            }
        });
    }
</script>
@endsection

