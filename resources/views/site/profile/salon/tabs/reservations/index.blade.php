<div class="tab-pane fade" id="{{$id}}" role="tabpanel"aria-labelledby="{{$aria_labelledby}}">
    <div class="p-3">
        <h3>
           {{ trans('web.reservations') }}
        </h3>
    </div>
    <table class="table table-border font-small-12">
        <thead class="thead-light ">
        <tr>
            <th scope="col" class="p_lr">{{ trans('web.salonName') }}</th>
            <th scope="col">{{ trans('web.salonImage') }}</th>
            <th scope="col">{{ trans('web.customerName') }}</th>
            <th scope="col">{{ trans('web.paymentMethod') }}</th>
            <th scope="col">{{ trans('web.reservationData') }}</th>
            <th scope="col">{{ trans('web.rescheduled') }}</th>
            <th scope="col">{{ trans('web.total') }}</th>
            <th scope="col">{{ trans('web.paymentStatus') }}</th>
            <th scope="col">{{ trans('web.reservatiotSatus') }}</th>
            <th scope="col"> {{ trans('web.changeStatus') }}</th>
        </tr>
        </thead>
        <tbody>
        {{--        @dd(json_decode($reservations[0]->reservation_info))--}}
        @foreach($reservations as $reservation)
            <tr>
                <td class="p_lr">{{$reservation->salon->name}}</td>
                <th scope="row">
                    <img src="{{$reservation->salon->main_image}}" class="img-fluid img-thumbnail" alt="" width="40px"
                         height="auto">
                </th>
                <td>{{auth()->User()->name}}</td>
                <td>{!!$reservation->pay_method!!}  </td>
                <td>
                    @foreach(json_decode($reservation->reservation_info) as $reservation_info )
                        <p>
                            <span>   <strong>{{ trans('web.serviceDepartment') }} :</strong> {{$reservation_info->service->name_service_list}}  </span><br>
                            <span> <strong>{{ trans('web.serviceName') }}:</strong>    {{$reservation_info->service->name}}  </span><br>
                            <span>  <strong>{{ trans('web.serviceDescription') }}:</strong>   {{$reservation_info->service->description}} </span><br>
                            <span>  <strong>{{ trans('web.nameServiceEmployee') }}:</strong>   {{$reservation_info->team->name}}</span><br>
                            <span> <strong>{{ trans('web.servicePrice') }}:</strong>    {{$reservation_info->service->price}} </span><br>
                        </p>
                        <hr>
                    @endforeach
                </td>
                <td>
                    <span>{{$reservation->date}}</span> <br>
                    <span>{{$reservation->time}}</span>
                </td>
                <td>{{$reservation->total_price}}{{ trans('web.sar') }}</td>
               <td>{!!$reservation->pay_status!!}</td>
                <td>{!!$reservation->reservation_status!!}</td>
                <td>{!! $reservation->status == 0 ? '<a href="javascript:void(0)" data-id="'.$reservation->id.'"  class="action-status"><i class="feather icon-edit action-status" style="font-size:30px"></i></a>' : '---'!!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
