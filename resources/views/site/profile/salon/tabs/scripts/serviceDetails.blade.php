<script>
    $(document).ready(function () {
        $(document).on('click', '.serviceDetailsButton', function (e) {
            e.preventDefault();
            var thisbutton = $(this),
                service_id = $(this).data("service_id"),
                service_list_id = $(this).data("service_list_id");

            $.ajax({
                url: '{{url("/profile/serviceDetails")}}',
                type: 'POST',
                data: {
                    _token: "{{csrf_token()}}",
                    service_id: service_id,
                    service_list_id: service_list_id,
                },
                beforeSend: function (xhr) {
                    $('.service-details-appends-div').empty();
                    $('.spinner-main-div').show();
                },
                success: function (data, status) {
                    if (status == 'success') {
                        $('.service-details-appends-div').empty();
                        $('.service-details-appends-div').append(data.html);

                        $('#service-details-carousel').owlCarousel({
                            loop: true,
                            rewind: true,
                            margin: 10,
                            nav: true,
                            autoplay:true,
                            autoplayTimeout:3000,
                            autoplayHoverPause: true,
                            responsive: {
                                0: {
                                    items: 1
                                },
                                600: {
                                    items: 1
                                },
                                1000: {
                                    items: 3
                                }
                            }
                        });
                    }
                },
                complete: function (jqxhr, txt_status) {
                    $('.spinner-main-div').hide();
                }
            });

        });





        $(document).on('click', '.deleteTeamMember', function (e) {
            e.preventDefault();
            var thisItem = $(this),
                team_id = $(this).data("team_id");
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
                            url: "{{url()->current()}}/teams/delete",
                            type: 'DELETE',
                            dataType: "JSON",
                            data: {
                                "team_id": team_id,
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
                                    thisItem.fadeOut(1000,function(){
                                        thisItem.parent().parent().parent().parent().parent().parent().remove();
                                    });
                                }else {
                                    Swal.fire({
                                        title: "{{trans('web.thereIsSomeThingWrong')}}",
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
                        title: "{{trans('web.cancelled')}}",
                        text: "{{trans('web.dataSafe')}}",
                        type: 'error',
                        confirmButtonClass: 'btn btn-success',
                    })
                }
            })
        });



        $(document).on('click', '.deleteService', function (e) {
            e.preventDefault();
            var thisItem = $(this),
                service_id = $(this).data("service_id");
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
                            url: "{{url()->current()}}/services/delete",
                            type: 'DELETE',
                            dataType: "JSON",
                            data: {
                                "service_id": service_id,
                                "_method": 'DELETE',
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(data, status) {
                                if (data == true) {
                                    Swal.fire({
                                        type: "success",
                                        title: "{{trans('web.deleted')}}",
                                        text:"{{trans('web.YourFileHasBeenDeleted')}}",
                                        confirmButtonClass: 'btn btn-success',
                                    });
                                    thisItem.fadeOut(1000,function(){
                                        window.location.href = "{{url()->current()}}";
                                    });
                                }else {
                                    Swal.fire({
                                        title: "{{trans('web.thereIsSomeThingWrong')}}",
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
                        title: "{{trans('web.cancelled')}}",
                        text: "{{trans('web.dataSafe')}}",
                        type: 'error',
                        confirmButtonClass: 'btn btn-success',
                    })
                }
            })
        });
    });
</script>
