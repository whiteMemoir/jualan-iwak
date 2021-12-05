<!-- Modal Pesan -->
<div class="modal fade" id="modalPesan" tabindex="-1" aria-labelledby="modalPesanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPesanLabel">Data Penerima</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="penerima" class="form-label">Nama Penerima</label>
                    <input type="text" class="form-control" id="penerima" placeholder="Nama penerima">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea id="alamat" rows="5" class="form-control" placeholder="Alamat penerima" style="resize: none"></textarea>
                </div>
                <small class="text-muted" style="font-style: italic;">Catatan: </small> <br>
                <small class="text-primary" style="font-style: italic;">
                    <ul>
                        <li>Pastikan data yang anda masukkan sudah benar.</li>
                        <li>Pemesanan hanya bisa dilakukan melalui whatsapp. Jika tidak bisa, silahkan lakukan panggilan langsung melalui nomor tersebut.</li>
                        <li>Setelah anda mengklik pesan sekarang, keranjang belanja akan kembali kosong.</li>
                    </ul>
                </small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <a class="btn btn-primary btn-sm" id="checkout"><i class="bi bi-bag-check-fill"></i> Pesan Sekarang</a>
            </div>
        </div>
    </div>
</div>
