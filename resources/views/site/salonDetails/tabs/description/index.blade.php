@php
    $salon_appointments =   json_decode($item->salon_appointments,true);
$today = \Carbon\Carbon::today()->dayName;

@endphp
<div class="tab-pane fade show active pl-4" id="{{$id}}" role="tabpanel" aria-labelledby="{{$aria_labelledby}}">
    <div class="pr-2" id="parent">
        <div class="h4 pt-2 pb-1 pr-2">
            <strong> {{ trans('web.aboutUs') }}</strong>
        </div>
        <p class="h5 pr-3" id="txt" >
            {{$item->salon_description}}
        </p>
        <a href="javascript:void(0)" class="icon-color more font-weight-bold " id="read">
           
            {{ trans('web.readMore') }}>>
        </a>
    </div>
    <div class="pl-5 pr-5">
        <hr />
    </div>
    <div class="salon-map">
        <div class="h5 pt-2 pb-2 pr-2">
            <strong>{{ trans('web.salonLocation') }}</strong>
        </div>
        <div class="bg-gray">
            <div class="row myrow">
                <div class="col-md-9 ">
                        <div class="show-map" style="height:300px">
                            <div  style="width: 100%; height: 100%;"  id="salon_location"></div>
                        </div>
                </div>
                <div class="col-md-3">
                    <div class="map-info ">
                        <h6 class="font-weight-bold"> <span class="h6 pr-2 "> <i class="fas fa-map-marker-alt"></i></span> {{$item->salon_name}} </h6>
                        <ul class="list-unstyled font-weight-bold">
                            <li>  {{ trans('web.salonLocation') }} : {{$item->location_address}} </li>
                        </ul>
                        <P class="font-weight-bold">
                            <i class="fas fa-phone"></i>   {{ trans('web.mobileNumber') }} : {{$item->first_phone}} , {{$item->second_phone}} , {{$item->third_phone}}
                        </P>
                        <P class="font-weight-bold p-width">
                            <i class="far fa-envelope"></i>  {{ trans('web.email') }} :   <span >{{$item->email}}</span>
                        </P>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pl-5 pr-5">
        <hr />
    </div>
    <div class="opening">
        <div>
            <div class="h5 pt-2 pb-0"><strong>{{ trans('web.openingHours') }}</strong></div>
        </div>

        <div class="pr-5 pl-5  {{$today == 'Saturday' ? 'bg-active' : ''}}">
            <div class="row">
                <div class="col-md-6 col-6">
                    <div class="day">{{ trans('web.saturday') }}</div>
                </div>
                <div class="col-md-6 col-6 styl-right">
                    <div class="day">{{$salon_appointments['saturday_from']}} - {{$salon_appointments['saturday_to']}}</div>
                </div>
            </div>
        </div>

        <div class="pr-5 pl-5 {{$today == 'Sunday' ? 'bg-active' : ''}} ">
            <div class="row">
                <div class="col-md-6 col-6">
                    <div class="day">{{ trans('web.sunday') }}</div>
                </div>
                <div class="col-md-6 col-6 styl-right">
                    <div class="day">{{$salon_appointments['sunday_from']}} - {{$salon_appointments['sunday_to']}}</div>
                </div>
            </div>
        </div>

        <div class="pr-5 pl-5 {{$today == 'Monday' ? 'bg-active' : ''}}">
            <div class="row">
                <div class="col-md-6 col-6">
                    <div class="day">{{ trans('web.monday') }}</div>
                </div>
                <div class="col-md-6 col-6 styl-right">
                    <div class="day">{{$salon_appointments['monday_from']}} - {{$salon_appointments['monday_to']}}</div>
                </div>
            </div>
        </div>

        <div class="pr-5 pl-5 {{$today == 'Tuesday' ? 'bg-active' : ''}}">
            <div class="row">
                <div class="col-md-6 col-6">
                    <div class="day">{{ trans('web.tuesday') }}</div>
                </div>
                <div class="col-md-6 col-6 styl-right">
                    <div class="day">{{$salon_appointments['tuesday_from']}} - {{$salon_appointments['tuesday_to']}}</div>
                </div>
            </div>
        </div>

        <div class="pr-5 pl-5" {{$today == 'Wednesday' ? 'bg-active' : ''}}>
            <div class="row">
                <div class="col-md-6 col-6">
                    <div class="day">{{ trans('web.wednesday') }}</div>
                </div>
                <div class="col-md-6 col-6 styl-right">
                    <div class="day">{{$salon_appointments['wednesday_from']}} - {{$salon_appointments['wednesday_to']}}</div>
                </div>
            </div>
        </div>

        <div class="pr-5 pl-5 {{$today == 'Thursday' ? 'bg-active' : ''}}">
            <div class="row">
                <div class="col-md-6 col-6">
                    <div class="day">{{ trans('web.thursday') }}</div>
                </div>
                <div class="col-md-6 col-6 styl-right">
                    <div class="day">{{$salon_appointments['thursday_from']}} - {{$salon_appointments['thursday_to']}}</div>
                </div>
            </div>
        </div>

        <div class="pr-5 pl-5 {{$today == 'Friday' ? 'bg-active' : ''}}">
            <div class="row">
                <div class="col-md-6 col-6">
                    <div class="day">{{ trans('web.friday') }}</div>
                </div>
                <div class="col-md-6 col-6 styl-right">
                    <div class="day">{{$salon_appointments['friday_from']}} - {{$salon_appointments['friday_to']}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
