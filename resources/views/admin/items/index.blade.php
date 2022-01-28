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
            <h3 class="card-title">List Item</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="{{ url('admin/item/create') }}" class="btn btn-primary mb-3">Tambah Item</a>
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
                        <th>Komoditas</th>
                        <th>Harga</th>
                        <th>Harga Coret</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td><img src="{{ asset('storage/items/'.$item->gambar.'') }}" width="50"></td>
                            <td>{{ $item->commodity ? $item->commodity->nama : '' }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->diskon }}</td>
                            <td width="13%" align="center">
                                <a href="{{ route('item.edit', $item->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                <button onclick="destroy(`{{ $item->id }}`, `{{ $item->nama }}`)" id="{{ $item->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('datatable-script')
    <script src={{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}></script>
    <script src={{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}></script>
    <script src={{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}></script>
    <script src={{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}></script>
    <script src={{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}></script>
    <script src={{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
                        url: `/admin/item/${id}`,
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

                            swal(mes, {icon: icon})
                            .then(() => {
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
