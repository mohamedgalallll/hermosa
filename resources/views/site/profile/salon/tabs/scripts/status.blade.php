<script>
    $(document).on('click', '.action-status', function (e) {
        var id = $(this).data("id");

        Swal.fire({
            title: "{{trans('web.selectStatus')}}",
            input: 'select',
            text: "",
            inputPlaceholder: "{{trans('web.changeStatus')}}",
            inputOptions: {
                '1': "{{trans('web.approve')}}",
                '2': "{{trans('web.rejected')}}",
            },
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText:  "{{trans('web.yesChange')}}",
            confirmButtonClass: 'btn btn-danger',
            cancelButtonClass: 'btn btn-32 ml-1',
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                var status_val  = result.value;
                $.ajax({
                    url: "{{url()->current()}}/reservation/change-status",
                    type: 'post',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "status": status_val,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data, status) {
                        // if (data == 0) {
                        //     td.html('<div class="chip chip-info"> <div class="chip-body"> <div class="chip-text">Pending</div> </div> </div>');
                        // }else if (data == 1) {
                        //     td.html('<div class="chip chip-success"> <div class="chip-body"> <div class="chip-text">Approved</div> </div> </div>');
                        // }else if (data == 2) {
                        //     td.html('<div class="chip chip-primary"> <div class="chip-body"> <div class="chip-text">Rejected</div> </div> </div>');
                        // }else if (data == 3) {
                        //     td.html('<div class="chip chip-danger"> <div class="chip-body"> <div class="chip-text">Banned</div> </div> </div>');
                        // }
                        Swal.fire({
                            type: "success",
                            title: "{{trans('web.done')}}",
                            text: "{{trans('web.yourData')}}",
                            confirmButtonClass: 'btn btn-success',
                        });

                        setTimeout(function(){
                            window.location.reload(1);
                        }, 2000);
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        alert('request failed');
                    }
                });

            }
            else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: "{{trans('web.cancelled')}}",
                    type: 'error',
                    confirmButtonClass: 'btn btn-success',
                })
            }
        })
    });
</script>
