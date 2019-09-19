<div class="modal fade" id="modal-default" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="satuan_form">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <div class="form-group">
                        <input type="text" id="id_bahan" name="id_bahan" disabled class="form-control">
                    </div> --}}
                    {{ csrf_field() }}
                    <span id="form_output">
                    </span>
                    <div class="form-group">
                        <label for="nama_satuan" class="form-control-label">Nama Satuan</label>
                        <input type="text" id="nama_satuan" name="nama_satuan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="form-control-label">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="button_action" id="button_action" value="insert">
                    <input type="hidden" name="id" id="id" value="">
                    <button type="button" name="notification" id="notification" style="display:none"
                        class="swalDefaultSuccess"></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" id="action" value="Add" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-confirm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="bahan_form">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;"> Are you sure you want to remove this data?
                    </h4>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
