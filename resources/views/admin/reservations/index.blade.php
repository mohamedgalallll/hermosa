@extends('admin.components.tables.table')
@section('pageName',trans('web.reservations'))
@section('thead')
    <tr>
        <th>{{ trans('web.salonName') }}</th>
        <th>{{ trans('web.customerName') }}</th>
        <th>{{ trans('web.paymentMethod') }}</th>
        <th>{{ trans('web.reservationData') }}</th>
        <th>{{ trans('web.rescheduled') }}</th>
        <th>{{ trans('web.total') }}</th>
        <th>{{ trans('web.paymentStatus') }}</th>
        <th>{{ trans('web.reservatiotSatus') }}</th>
        <th>{{trans('web.actions')}}</th>

    </tr>

@stop
@if (auth()->User()->group->categories_add == 1)
@section('modal')
    @include('admin.reservations.create',['id'=>'createmodal','name'=>trans('web.createNewReservation'),'action'=>url()->current()])
@stop
@endif
@section('table_scripts')
    <script>
        $(document).ready(function () {
            "use strict";
            var dataListView = $(".data-list-view").DataTable({
                responsive: true,
                columnDefs: [
                    {
                        orderable: true,
                        targets: 0,
                        // checkboxes: { selectRow: true }
                    }
                ],
                dom: '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
                oLanguage: {
                    sLengthMenu: "_MENU_",
                    sSearch: ""
                },
                aLengthMenu: [[15, 50, 100, 200, 500, 1000,-1], [15, 50, 100, 200, 500, 1000,'{{trans('web.showAll')}}']],
                select: {
                    style: "multi"
                },
                order: [[1, "asc"]],
                bInfo: true,
                pageLength: 15,
                buttons: [
                        @if (auth()->User()->group->categories_add == 1)
                    {
                        text: "<i class='feather icon-plus'></i>{{trans('web.addNew')}}",
                        action: function () {
                            $(this).removeClass("btn-secondary");
                            $(".add-new-data").addClass("show");
                            $(".overlay-bg").addClass("show");
                        },
                        className: "btn btn-white  buttons mb-1  waves-effect waves-light"
                    },
                    @endif
                    {extend:'copy',text:'<i class="feather icon-copy"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                    {extend:'csv',text:'<i class="fa fa-file-archive-o"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                    {extend:'excel',text:'<i class="fa fa-file-excel-o"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                    {extend:'pdf',text:'<i class="fa fa-file-pdf-o"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                    {extend:'print',text:'<i class="feather icon-printer\n"></i>',className:'btn btn-white mb-1  waves-effect waves-light'},
                ],
                processing: true,
                serverSide: true,
                scroller:   true,
                ajax: {
                    url: "{{url()->current()}}"
                },
                "columns": [
                    {data: 'salon_name', name: 'salon_name'},
                    {data: 'user_name', name: 'user_name'},
                    {
                        "mRender": function (data, type, row) {
                            return $("<div/>").html(row.pay_method).text();
                        }
                    },
                    {data: 'reservation_info', name: 'reservation_info'},
                    //   {
                    //        $(function () {
                    //         $.each(reservation_info, function (index, value) {
                    //         return $("<td/>").html(row.value).text();
                    //     });
                    //    });
                    // },
                    {data: 'date', name: 'date'},
                    {data: 'total_price', name: 'total_price'},
                    {
                        "mRender": function (data, type, row) {
                            return $("<div/>").html(row.pay_status).text();
                        }
                    },
            
                    {
                        "mRender": function (data, type, row) {
                            return $("<div/>").html(row.reservation_status).text();
                        }
                    },
                  
                    {
                        "mRender": function (data, type, row) {
                                data = '' ;
                             @if (auth()->User()->group->categories_delete == 1 )
                            var data = '<a href="javascript:void(0)" data-id="' + row.id + '"  class="action_reservation_status"><i class="feather icon-chevrons-up action_reservation_status"></i></a>';
                            @endif
                            return data;
                        }, orderable: false, searchable: false
                    }
                    
                ],
                initComplete: function (settings, json) {
                    $(".dt-buttons .btn").removeClass("btn-secondary")
                }
            });
        });
    </script>
@stop
