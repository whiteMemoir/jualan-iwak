@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css" integrity="sha512-1fPmaHba3v4A7PaUsComSM4TBsrrRGs+/fv0vrzafQ+Rw+siILTiJa0NtFfvGeyY5E182SDTaF5PqP+XOHgJag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.bot-div {
    height: 45px !important;
}
.bottom-blue {
    padding: 20px 0 0 !important;
    height: 25px !important;
}
</style>
@endsection

@section('content')
<main class="for-card" style="height: auto;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h5><i class="bi bi-cart"></i> Keranjang</h5>
                <hr>
                <div id="table-keranjang"><p class="text-center">Mengambil Data...</p></div>
            </div>
        </div>

        @include('includes.modals.modal-pesan')
        @include('includes.modals.modal-qty-edit')
    </div>
</main>
@section('footer')
    @include('includes.footer')
@endsection
@endsection
@section('owl')
@include('includes.owl-script')
@endsection
@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    /* Session storage
        key adalah id item
        value adalah array dengan :
            index 0 = id
            index 1 = nama item
            index 2 = harga item
            index 3 = qty item
    */

    function getData()
    {
        if(total_items == 0) {
            $('#table-keranjang').html(`<div class="text-center">Belum ada item di keranjang. <br> Silahkan belanja terlebih dahulu. <div>
                <a href="items" class="btn btn-primary btn-sm my-3"><i class="bi bi-box-arrow-in-left"></i> Belanja</a>`);
            return;
        }

        let html = `<table class="table table-bordered table-responsive">
        <tr>
            <td width="15%" align="center">#</td>
            <td>Item</td>
            <td align="right">Harga</td>
            <td align="center" width="8%">Qty</td>
            <td align="right">Subtotal</td>
        </tr>`;

        let total_harga = 0;
        // set session berdasarkan id item
        Object.keys(sessionStorage).forEach((key) => {
            if(key != 'total') {
                let val = sessionStorage.getItem(key);
                let item = val.split(',');
                let subtotal = parseInt(item[2]) * parseInt(item[3])

                html += `<tr>
                    <td width="15%" align="center">
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditQty" onclick="editItem('${key}')" title="Edit Qty"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="removeItem('${key}')" title="Hapus Item"><i class="bi bi-trash"></i></button>
                    </td>
                    <td>${item[1]}</td>
                    <td align="right">${item[2]}</td>
                    <td align="center">${item[3]}</td>
                    <td align="right">${formatRupiah(subtotal)}</td>
                </tr>`;

                total_harga += subtotal;
            }
        });

        html += `<tr>
                    <td colspan="4" align="right" style="font-weight: bold;">Total</td>
                    <td align="right" style="font-weight: bold">${formatRupiah(total_harga)}</td>
                </tr>
                <tr>
                    <td colspan="5" align="right">
                        <a href="items" class="btn btn-primary btn-sm"><i class="bi bi-box-arrow-in-left"></i> Belanja Lagi</a>
                        <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalPesan"><i class="bi bi-whatsapp"></i> Pesan</a>
                    </td>
                </tr>
        </table>`;

        $('#table-keranjang').html(html);
    }

    getData()

    function removeItem(id)
    {
        session_value = sessionStorage.getItem(id).split(',');
        total_items = parseInt(total_items) - parseInt(session_value[3]);

        sessionStorage.removeItem(id)
        getTotalItem();
        getData()
    }

    function editItem(id)
    {
        session_value = sessionStorage.getItem(id).split(',');
        $('#modalEditQty #modalEditQtyLabel').text(`Edit Qty ${session_value[1]}`)
        $('#modalEditQty #qty').val(`${session_value[3]}`)
        $('#modalEditQty #idItemEdit').val(id)

        quantity(id);
        getTotalItem();
        getData();
    }

    function quantity(id)
    {
        let qty = $('#modalEditQty #qty').val();
        $('#minus').click(function(){
            if(qty > 1) {
                qty--;
            }
        })

        $('#plus').click(function(){
            qty++
        });

        $('#qty').val(qty);
    }

    function updateItem()
    {
        let qty = $('#modalEditQty #qty').val();
        let id = $('#modalEditQty #idItemEdit').val();

        session_value = sessionStorage.getItem(id).split(',');
        data_update = [session_value[0], session_value[1], session_value[2], qty];
        sessionStorage.setItem(id, data_update);

        getTotalItem();
        getData();
    }

    function validate()
    {
        let penerima = $('#penerima').val()
        let alamat = $('#alamat').val()

        if(penerima.trim() == "" || alamat == "") {
            swal({
                title: "Peringatan",
                text: "Nama penerima dan alamat tidak boleh kosong",
                icon: "warning",
                button: "Ok",
            });
            return false;
        }

        return true;
    }

    $('#modalPesan #checkout').click(function() {
        let penerima = $('#penerima').val()
        let alamat = $('#alamat').val()

        // validasi
        if(validate() == false) {
            return;
        }

        text = `Penerima : ${penerima.trim()} %0AAlamat Penerima : ${alamat} %0A%0A`;
        text += `Pesanan %0A`;

        let jumlah_total = 0;
        Object.keys(sessionStorage).forEach((key) => {
            if(key != 'total') {
                let val = sessionStorage.getItem(key);
                let item = val.split(',');
                let subtotal = parseInt(item[2] * parseInt(item[3]));

                text += `- ${item[1]} : ${item[2]} x ${item[3]} Rp. ${subtotal} %0A`

                jumlah_total += subtotal;
            }
        });

        text += `%0ATotal Pesanan : Rp. ${jumlah_total}`

        Object.keys(sessionStorage).forEach((key) => {
            // hapus semua data storage
            sessionStorage.removeItem(key);
        });

        getTotalItem();
        getData();

        $(this).attr('href', `https://wa.me/${NO_WA}?text=${text}`);
        $(this).attr('target', `_blank`);



        // swal({
        //     title: "Checkout Pesanan",
        //     text: "Klik Ok, pesanan di keranjang akan kembali kosong.",
        //     icon: "warning",
        //     buttons: true,
        //     dangerMode: true,
        // })
        // .then((willDelete) => {
        //     if (willDelete) {


        //         // prosesData();
        //         getTotalItem();
        //         getData();
        //     }
        // });
    })

</script>
@endsection
