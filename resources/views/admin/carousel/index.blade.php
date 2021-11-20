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
          @forelse ($carousels as $i => $carousel)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $carousel->nama }}</td>
                <td><img src="{{ asset('storage/carousels/'.$carousel->gambar.'') }}" alt="gambar" width="150"></td>
                <td width="13%" align="center">
                    <a href="{{ route('carousel.edit', $carousel->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                    <button onclick="destroy(`{{ $carousel->id }}`, `{{ $carousel->nama }}`)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/Javascript">
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
                    url: `/admin/carousel/${id}`,
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
