@extends('admin.components.tables.table')
@section('pageName',trans('web.salonReviews'))
@section('thead')
    <tr>
        <th>{{trans('web.id')}}</th>
        <th>{{trans('web.reviewsRate')}}</th>
        <th>{{trans('web.reviewsText')}}</th>
        <th>{{trans('web.status')}}</th>
        <th>{{trans('web.salonName')}}</th>

        <th>{{trans('web.email')}}</th>
        <th>{{trans('web.userName')}}</th>
        <th>{{trans('web.createdAt')}}</th>
        <th>{{trans('web.type')}}</th>
        <th>{{trans('web.actions')}}</th>
    </tr>

@stop
@if (auth()->User()->group->categories_add == 1)
@section('modal')
    @include('admin.salonReviews.create',['id'=>'createmodal','name'=>trans('web.createReview'),'action'=>url()->current()])
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
                aLengthMenu: [[15, 50, 100, 200, 500, 1000, -1], [15, 50, 100, 200, 500, 1000, '{{trans('web.showAll')}}']],
                select: {
                    style: "multi"
                },
                order: [[1, "asc"]],
                bInfo: true,
                pageLength: 15,
                buttons: [
                        @if (auth()->User()->group->categories_add == 1)
                        {
                            text: "<i class='feather icon-plus'></i>{{trans('web.createSalonReview')}}",
                            action: function () {
                                $(this).removeClass("btn-secondary");
                                $(".add-new-data").addClass("show");
                                $(".overlay-bg").addClass("show");
                            },
                            className: "btn btn-white  buttons mb-1  waves-effect waves-light"
                        },
                        @endif
                    {
                        extend: 'copy',
                        text: '<i class="feather icon-copy"></i>',
                        className: 'btn btn-white mb-1  waves-effect waves-light'
                    },
                    {
                        extend: 'csv',
                        text: '<i class="fa fa-file-archive-o"></i>',
                        className: 'btn btn-white mb-1  waves-effect waves-light'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fa fa-file-excel-o"></i>',
                        className: 'btn btn-white mb-1  waves-effect waves-light'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        className: 'btn btn-white mb-1  waves-effect waves-light'
                    },
                    {
                        extend: 'print',
                        text: '<i class="feather icon-printer\n"></i>',
                        className: 'btn btn-white mb-1  waves-effect waves-light'
                    },
                ],
                processing: true,
                serverSide: true,
                scroller: true,
                ajax: {
                    url: "{{url()->current()}}"
                },

                "columns": [
                    {data: 'id', name: 'id'},
                    {
                        "mRender": function (data, type, row) {
                            return $("<div/>").html(row.salon_rate).text();
                        }
                    },
                    {data: 'reviews_text', name: 'reviews_text'},
                    {   className:'my_class',
                        "mRender": function (data, type, row) {
                            if (row.status == 0) {
                                return '<div class="chip chip-info"> <div class="chip-body"> <div class="chip-text">{{trans("web.pending")}}</div> </div> </div>';
                            }else if(row.status == 1){
                                return '<div class="chip chip-success"> <div class="chip-body"> <div class="chip-text">{{trans("web.accepted")}}</div> </div> </div>';
                            }else if(row.status == 2){
                                return '<div class="chip chip-primary"> <div class="chip-body"> <div class="chip-text">{{trans("web.rejected")}}</div> </div> </div>';
                            }else if(row.status == 3){
                                return '<div class="chip chip-danger"> <div class="chip-body"> <div class="chip-text">{{trans("web.banned")}}</div> </div> </div>';
                            }
                        }
                    },
                    {data: 'salon_name', name: 'salon_name'},
                    {data: 'email_user', name: 'email_user'},
                    {data: 'user_name', name: 'user_name'},
                    {data: 'created_at', name: 'created_at'},
                    {
                        "mRender": function (data, type, row) {
                            if (row.user_id == null) {
                                return '<div class="chip chip-danger"> <div class="chip-body"> <div class="chip-text">{{trans("web.guest")}}</div> </div> </div>';
                        }else{
                                return '<div class="chip chip-info"> <div class="chip-body"> <div class="chip-text">{{trans("web.user")}}</div> </div> </div>';
                            }
                        }
                    },
                    {

                        "mRender": function (data, type, row) {
                            var data1 = '',
                                data2 = '' ;
                                data3 = '' ;
                                @if (auth()->User()->group->categories_edit == 1 )
                            var data1 = '<a href="{{url()->current()}}/' + row.id + '/edit" class="action-edit"><i class="feather icon-edit"></i></a>';
                                @endif
                                @if (auth()->User()->group->categories_delete == 1 )
                            var data2 = '<a href="javascript:void(0)" data-id="' + row.id + '"  class="action-delete"><i class="feather icon-trash action-delete"></i></a>';
                                @endif
                                @if (auth()->User()->group->categories_delete == 1 )
                            var data3 = '<a href="javascript:void(0)" data-id="' + row.id + '"  class="action-status"><i class="feather icon-pause action-status"></i></a>';
                            @endif
                                return data1 + data2 + data3;
                        }, orderable: false, searchable: false
                    }
                ],
                initComplete: function (settings, json) {
                    $(".dt-buttons .btn").removeClass("btn-secondary")
                }
            });
        });
    </script>
    @include('admin.layout.scripts.status.index')
@stop
