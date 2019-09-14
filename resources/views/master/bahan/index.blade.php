@extends('layouts.app')

@section('content')


<!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/toastr/toastr.min.css')}}">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Master</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Master</li>
                        <li class="breadcrumb-item"><a href="#">Bahan</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row-sm-12 d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Daftar Bahan</h3>
                            <button class="btn btn-success btn-sm float-right" name="add" id="add"><i
                                    class="fas fa-plus"></i>
                                Tambah</button>
                        </div>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped" width="100%"
                            data-page-length='5'>
                            <thead>
                                <tr>
                                    <th>ID Bahan</th>
                                    <th>Nama Bahan</th>
                                    <th>Stok Minimal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<div class="modal fade" id="modal-default" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="bahan_form">
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
                        <label for="nama_bahan" class="form-control-label">Nama Bahan</label>
                        <input type="text" id="nama_bahan" name="nama_bahan" class="form-control"
                            placeholder="Nama Bahan">
                    </div>
                    <div class="form-group">
                        <label for="stok_minimal" class="form-control-label">Stok Minimal</label>
                        <input type="number" id="stok_minimal" name="stok_minimal" class="form-control"
                            placeholder="Stok Minimal">
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


<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('adminlte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('adminlte/plugins/toastr/toastr.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#add').click(function () {
            $('#modal-default').modal('show');
            $('#bahan_form')[0].reset();
            $('#form_output').html('');
            $('#button_action').val('insert');
            $('#action').val('Add');
        });

        $(document).on('click', '.edit', function () {
            var id = $(this).attr("id");
            $.ajax({
                method: "get",
                url: "{{route('master.bahan.fetchdata')}}",
                data: {id:id},
                dataType: "json",
                success: function (data) {
                    $('#form_output').html('');
                    $('#nama_bahan').val(data.nama_bahan);
                    $('#stok_minimal').val(data.stok_minimal);
                    $('#id').val(id);
                    $('#modal-default').modal('show');
                    $('#action').val('Edit');
                    $('.modal-title').text('Edit Data');
                    $('#button_action').val('update');
                }
            });
        });

        $('#bahan_form').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"{{route('master.bahan.store')}}",
                method:"POST",
                data:form_data,
                dataType:"json",
                success:function(data){

                    if(data.error.length > 0){
                        var error_html = '';
                        for(var count = 0; count < data.error.length; count++){
                            error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                        }
                        $('#form_output').html(error_html);
                    } else {
                        $('#bahan_form')[0].reset();
                        $('#action').val('Add');
                        $('.modal-title').text('Add Data');
                        $('#button_action').val('insert');
                        $('#modal-default').modal('hide');
                        $('#example1').DataTable().ajax.reload();
                        $('#notification').trigger("click");
                    }


                }

            })
        });

        var bahan_id;
        $(document).on('click', '.delete', function () {
            bahan_id = $(this).attr('id');
            $('#modal-confirm').modal('show');
            $('#ok_button').text('OK');
        });

        $('#ok_button').click(function () {
            $.ajax({
                url: "../master/bahan/destroy/"+bahan_id,
                beforeSend:function () {
                    $('#ok_button').text('Deleting...');
                },
                success:function(data){
                    setTimeout(function(){
                        $('#modal-confirm').modal('hide');
                        $('#example1').DataTable().ajax.reload();
                    }, 2000);
                }
            });
        })
    });
    $(function () {
        $("#example1").DataTable({
            processing: true,
            serverSide: true,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            ajax: "{{route('master.bahan.getdata')}}",
            columns: [
            { data: 'id', name: 'id' },
            { data: 'nama_bahan', name: 'nama_bahan' },
            { data: 'stok_minimal', name: 'stok_minimal' },
            { data: 'action', orderable:false, searchable:false},

        ]

        });
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
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
