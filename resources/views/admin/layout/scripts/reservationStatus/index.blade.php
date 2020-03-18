<script>
    $(document).on('click', '.action_reservation_status', function (e) {
        var id = $(this).data("id"),
        Swal.fire({
            title: 'Select Status',
            input: 'select',
            text: "",
            inputPlaceholder: 'change status',
            inputOptions: {
                '0': 'Waiting For Salon Review',
                '1': 'Approve',
                '2': 'Reject',
            },
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change',
            confirmButtonClass: 'btn btn-danger',
            cancelButtonClass: 'btn btn-32 ml-1',
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                var status_val  = result.value;
                $.ajax({
                    url: "{{url()->current()}}/status",
                    type: 'post',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "status": status_val,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data, status) {
                        // if (data == 0) {
                        //     td.html('<div class="chip chip-info"> <div class="chip-body"> <span class="btn btn-warning">Waiting For Salon Review</span> </div> </div>');
                        // }else if (data == 1) {
                        //     td.html('<div class="chip chip-success"> <div class="chip-body"> <span class="btn btn-success">Approved </span> </div> </div>');
                        // }else if (data == 2) {
                        //     td.html('<div class="chip chip-primary"> <div class="chip-body"> <span class="btn btn-danger">Rejected</span></div> </div>');
                        // }
                        Swal.fire({
                            type: "success",
                            title: 'Done!',
                            text: 'Your Data Have Edited Successfully',
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
                    title: 'Cancelled',
                    type: 'error',
                    confirmButtonClass: 'btn btn-success',
                })
            }
        })
    });

</script>
