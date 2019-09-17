<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <div class="form-group">
                        <input type="text" id="id_bahan" name="id_bahan" disabled class="form-control">
                    </div> --}}
                    <div class="form-group">
                        <label for="nama_menu" class="form-control-label">Nama Menu</label>
                        <input type="text" id="nama_menu" name="nama_menu" class="form-control" placeholder="Nama Menu">
                    </div>
                    <div class="form-group">
                        <label for="hpp" class="form-control-label">Harga Pokok Penjualan (HPP)</label>
                        <input type="text" id="hpp" name="hpp" class="form-control" placeholder="HPP">
                    </div>
                    <div class="form-group">
                        <label for="hj" class="form-control-label">Harga Jual (HJ)</label>
                        <input type="text" id="hj" name="hj" class="form-control" placeholder="HJ">
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="form-control-label">keterangan</label>
                        <textarea id="keterangan" name="keterangan" class="form-control"
                            placeholder="Keterangan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kategori_menu" class="form-control-label">keterangan</label>
                        <select name="kategori_menu" id="kategori_menu" class="form-control">
                            <option value="1">Kategori 1</option>
                            <option value="2">Kategori 2</option>
                            <option value="3">Kategori 3</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary swalDefaultSuccess">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
