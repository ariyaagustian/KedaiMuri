@extends('layouts.app')

@section('content')


<!-- DataTables -->
<link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="/adminlte/plugins/toastr/toastr.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Transaksi</li>
                        <li class="breadcrumb-item"><a href="#">Kasir</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-6">
                <div class="card" style="min-height:550px">
                    <div class="card-header">
                        <div class="row-sm-12 d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Daftar Menu</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Harga Jual</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-6">
                <div class="row-12">
                    <div class="card" style="min-height:300px">
                        <div class="card-header">
                            <div class="row-sm-12 d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Pesanan</h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Menu</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Sub Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="row-12">
                    <div class="card" style="min-height:234px">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                <tr>
                                    <td>Sub Total</td>
                                    <td align="right">Rp. 50.000,-</td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td align="right">Rp. 50.000,-</td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td align="right">Rp. 0,-</td>
                                </tr>
                                <tr>
                                    <td>Services</td>
                                    <td align="right">Rp. 0,-</td>
                                </tr>
                                <tr>
                                    <td><h3> <b> Grand Total </b></h3></td>
                                    <td align="right"><h3><b>Rp. 0,-</b></h3></td>
                                </tr>
                            </table>
                            <button class="btn btn-info btn-block">Bayar</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



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
                        <input type="number" id="hpp" name="hpp" class="form-control" placeholder="HPP">
                    </div>
                    <div class="form-group">
                        <label for="hj" class="form-control-label">Harga Jual (HJ)</label>
                        <input type="number" id="hj" name="hj" class="form-control" placeholder="HJ">
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


<!-- DataTables -->
<script src="/adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- SweetAlert2 -->
<script src="/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="/adminlte/plugins/toastr/toastr.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable();
          $('#example2').DataTable({
            "searching": false,
            "ordering": true,
            "scrollY": "200px",
            "scrollX": true,
            "scrollCollapse": true,
            "paging":false,
            "info": false,
            "autoWidth": false
          });
        });
</script>

<script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          type: 'success',
          title: 'Data berhasil ditambah'
        })
      });
      $('.swalDefaultInfo').click(function() {
        Toast.fire({
          type: 'info',
          title: 'Data berhasil diubah'
        })
      });
      $('.swalDefaultError').click(function() {
        Toast.fire({
          type: 'error',
          title: 'Data berhasil dihapus'
        })
      });
      $('.swalDefaultWarning').click(function() {
        Toast.fire({
          type: 'warning',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultQuestion').click(function() {
        Toast.fire({
          type: 'question',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });

      $('.toastrDefaultSuccess').click(function() {
        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultInfo').click(function() {
        toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultError').click(function() {
        toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultWarning').click(function() {
        toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
    });
</script>


@endsection
