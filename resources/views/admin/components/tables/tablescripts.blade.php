<script src="{{url('design/admin/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>

<script src="{{url('design/admin/js/scripts/ui/data-list-view.js')}}"></script>




<script src="{{url('design/admin/vendors/js/tables/datatable/buttons.flash.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/tables/datatable/jszip.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<script src="{{url('design/admin/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>







<script>
    $(document).on('click', '.action-delete', function (e) {
        var id = $(this).data("id"),
            tr =  $(this).closest('tr');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            confirmButtonClass: 'btn btn-danger',
            cancelButtonClass: 'btn btn-32 ml-1',
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                $.ajax(
                    {
                        url: "{{url()->current()}}/"+id,
                        type: 'DELETE',
                        dataType: "JSON",
                        data: {
                            "id": id,
                            "_method": 'DELETE',
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(data, status) {
                       if (data == true) {
                           Swal.fire({
                               type: "success",
                               title: 'Deleted!',
                               text: 'Your file has been deleted.',
                               confirmButtonClass: 'btn btn-success',
                           });
                           tr.fadeOut(1000,function(){
                               tr.remove();
                           });
                       }else {
                           Swal.fire({
                               title: 'There is Some Thing Wrong',
                               text: data,
                               type: 'error',
                               confirmButtonClass: 'btn btn-success',
                           })
                       }
                        },
                        fail: function(xhr, textStatus, errorThrown){
                            alert('request failed');
                        }
                    });



            }
            else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: 'Cancelled',
                    text: 'Your Data  is safe :)',
                    type: 'error',
                    confirmButtonClass: 'btn btn-success',
                })
            }
        })
    });
</script>
