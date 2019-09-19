<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('adminlte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('adminlte/plugins/toastr/toastr.min.js')}}"></script>
<script>
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    });

    $(document).ready(function () {
        $('#add').click(function () {
            $('#modal-default').modal('show');
            $('#bahan_form')[0].reset();
            $('#form_output').html('');
            $('#button_action').val('insert');
            $('#action').val('Add');
            $('#satuan_id').val(null).trigger('change');
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
                    // $('#satuan_id').val(data.satuan_id);
                    $('#satuan_id').val(data.satuan_id).change();
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
                        $('#tb_bahan').DataTable().ajax.reload();
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
                        $('#tb_bahan').DataTable().ajax.reload();
                        $('#notification').trigger("click");
                    }, 20);

                }
            });
        })
    });
    $(function () {
        $("#tb_bahan").DataTable({
            processing: true,
            serverSide: true,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            ajax: "{{route('master.bahan.getdata')}}",
            columnDefs: [
                {
                    targets: -1,
                    className: 'text-center'
                }
            ],
            columns: [
            { data: 'id', name: 'id'},
            { data: 'nama_bahan', name: 'nama_bahan'},
            { data: 'stok_minimal', name: 'stok_minimal'},
            { data: 'satuan.nama_satuan', name: 'satuan.nama_satuan' },
            { data: 'action', orderable:false, searchable:false},
        ],
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
          title: 'Success'
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
        toastr.success('Success.')
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
