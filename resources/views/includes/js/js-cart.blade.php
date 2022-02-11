<script type="text/Javascript">

    /* Session storage
          key adalah id item
          value adalah array dengan :
             index 0 = id
             index 1 = nama item
             index 2 = harga item
             index 3 = qty item
     */

    var qty = 1;

    function modalItem()
    {
        $('.item-click').click(function(){
            let data = $(this).data('json');
            let string = JSON.stringify(data)
            let json = JSON.parse(string);
            let text_wa = `- Nama Item: ${json.nama}%0A - Jumlah : `;

            html = `<div class="modal-body">
                <img src="${BASE_URL+'/storage/items/modals/'+json.gambar_modal}" class="img-fluid">
                <hr>
                <h5>${json.nama}</h5>
                <p>${json.deskripsi}</p>
                <div class="price-amount">Rp. ${json.harga}/${json.satuan ?? 'Kg'}</div>
            <div class="input-group">
                <span class="input-group-btn">
                    <button type="button" id="minus" class="btn btn-success" data-type="minus">-</button>
                </span>
                <input type="text" step="1" class="form-control text-center" onkeyup="return notNull(this.value)" onkeypress="return numberOnly(event)" id="qty" value="1" style="width: 20%; flex: none !important;">
                <span class="input-group-btn">
                    <button type="button" id="plus" class="btn btn-success" data-type="plus">+</button>
                </span>
            </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" id="btn-beli-langsung">Beli Langsung</a>
                <a href="javascript:void(0)" data-id="${json.id}" data-nama="${json.nama}" data-harga="${json.harga}" class="btn btn-primary" id="btn-add-cart" data-bs-dismiss="modal">Tambah Ke Keranjang</button>
            </div>`;

            $('#modalItem .modal-title').text(json.nama)
            $('#modalItem #content-modal').html(html)

            beliLangsung(json)
            quantity()
            addToCart()
        });
    }

    modalItem();

    function quantity()
    {
         $('#minus').click(function(){
             if(qty > 1) {
                 qty--;
             }
             $('#qty').val(qty);

         })

         $('#plus').click(function(){
             qty++
             $('#qty').val(qty);
         })
    }

    function addToCart()
    {
         $('#modalItem #btn-add-cart').click(function(){
             let id = $(this).data('id')
             let nama = $(this).data('nama')
             let harga = $(this).data('harga')
             let qty = $('#qty').val()

             // urutan array ga boleh ketukar guys
             let data = [id, nama, harga, qty];

             // jika di keranjang sudah ada item dengan id tersebut
             // maka update saja
             data = checkCartToUpdate(id, data)

             // set session berdasarkan id item
             sessionStorage.setItem(id, data);
             getTotalItem()
         });
    }

    function beliLangsung(data)
    {
         $('#btn-beli-langsung').click(function(e){
             let qty = $('#qty').val();
             let text = `Item : ${data.nama} %0AJumlah Pesan : ${qty} %0ATotal : ${parseInt(data.harga) * parseInt(qty)}`;
             let link = `https://wa.me/${NO_WA}?text=${text}`;

             $(this).attr('href', link)
             $(this).attr('target', '_blank')
         });
    }

    function checkCartToUpdate(id, data)
    {
         session = sessionStorage.getItem(id);
         // jika sudah ada update qty saja
         if(session) {
             session_value = session.split(',');

             return [session_value[0], session_value[1], session_value[2], parseInt(session_value[3]) + parseInt(data[3])]
         }

         return data;
    }

 </script>
