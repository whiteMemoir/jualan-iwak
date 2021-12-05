<!-- Modal Edit Qty -->
<div class="modal fade" id="modalEditQty" tabindex="-1" aria-labelledby="modalEditQtyLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditQtyLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input type="hidden" id="idItemEdit">
                    <label for="qty" class="form-label">Qty</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="button" id="minus" class="btn btn-success" data-type="minus">-</button>
                        </span>
                        <input type="text" step="1" class="form-control text-center" id="qty" value="1" style="width: 20%; flex: none !important;">
                        <span class="input-group-btn">
                            <button type="button" id="plus" class="btn btn-success" data-type="plus">+</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary btn-sm"data-bs-dismiss="modal" onclick="updateItem()"><i class="bi bi-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
