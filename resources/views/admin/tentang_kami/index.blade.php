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
            <a href="{{ url('admin/tentang-kami/create') }}" class="btn btn-primary mb-3">Tambah Item</a>
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
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tentang as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->judul }}</td>
                            <td>{{ $value->deskripsi }}</td>
                            <td width="13%" align="center">
                                <a href="{{ route('tentang-kami.edit', $value->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                <button onclick="destroy(`{{ $value->id }}`, `{{ $value->judul }}`)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('datatable-script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

        function destroy(id, judul) {
            swal({
                title: `Apakah anda yakin ingin menghapus ${judul}?`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    //AJAX DELETE
                    $.ajax({
                        url: `/admin/tentang-kami/${id}`,
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
