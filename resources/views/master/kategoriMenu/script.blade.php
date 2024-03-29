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
            $('#kategori_form')[0].reset();
            $('#form_output').html('');
            $('#button_action').val('insert');
            $('#action').val('Add');
        });

        $(document).on('click', '.edit', function () {
            var id = $(this).attr("id");
            $.ajax({
                method: "get",
                url: "{{route('master.kategori.fetchdata')}}",
                data: {id:id},
                dataType: "json",
                success: function (data) {
                    $('#form_output').html('');
                    $('#nama_kategori').val(data.nama_kategori);
                    $('#keterangan').val(data.keterangan);
                    $('#id').val(id);
                    $('#modal-default').modal('show');
                    $('#action').val('Edit');
                    $('.modal-title').text('Edit Data');
                    $('#button_action').val('update');
                }
            });
        });

        $('#kategori_form').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"{{route('master.kategori.store')}}",
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
                        $('#kategori_form')[0].reset();
                        $('#action').val('Add');
                        $('.modal-title').text('Add Data');
                        $('#button_action').val('insert');
                        $('#modal-default').modal('hide');
                        $('#tb_kategori_menu').DataTable().ajax.reload();
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
                url: "../master/kategori/destroy/"+bahan_id,
                beforeSend:function () {
                    $('#ok_button').text('Deleting...');
                },
                success:function(data){
                    setTimeout(function(){
                        $('#modal-confirm').modal('hide');
                        $('#tb_kategori_menu').DataTable().ajax.reload();
                        $('#notification').trigger("click");
                    }, 20);

                }
            });
        })
    });
    $(function () {
        $("#tb_kategori_menu").DataTable({
            processing: true,
            serverSide: true,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            ajax: "{{route('master.kategori.getdata')}}",
            columnDefs: [
                {
                    targets: 3,
                    className: 'text-center'
                }
            ],
            columns: [
            { data: 'id', name: 'id', width:'15%'},
            { data: 'nama_kategori', name: 'nama_kategori', width: '35%' },
            { data: 'keterangan', name: 'keterangan', width: '30%' },
            { data: 'action', orderable:false, searchable:false, width: '20%'},
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
        toastr.success('Success')
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
