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
            title: "{{trans('web.areYouSure')}}",
            text: "{{trans('web.YouRvertThis')}}", 
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "{{trans('web.yesDeleteIt')}}",
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
                               title: "{{trans('web.deleted')}}",
                               text: "{{trans('web.YourFileHasBeenDeleted')}}",
                               confirmButtonClass: 'btn btn-success',
                           });
                           tr.fadeOut(1000,function(){
                               tr.remove();
                           });
                       }else {
                           console.log()
                           Swal.fire({
                               title: "{{trans('web.thereIsSomeThingWrong')}}",
                               text: data,
                               type: 'error',
                               confirmButtonClass:'btn btn-success',
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
                    title: "{{trans('web.cancelled')}}",
                    text: "{{trans('web.dataSafe')}}",
                    type: 'error',
                    confirmButtonClass: 'btn btn-success',
                })
            }
        })
    });

</script>
