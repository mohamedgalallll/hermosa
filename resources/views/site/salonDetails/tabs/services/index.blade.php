<div class="tab-pane fade pl-4 " id="{{$id}}" role="tabpanel" aria-labelledby="{{$aria_labelledby}}">
    <div class="row">
        <div class="accordion-container col-md-8">
            @foreach($ServiceList as $list)
                @if (\App\Model\Service::where('salon_id',$item->id)->where('status',1)->where('service_list_id',$list->id)->count() > 0)
                    <div class="set">
                        <a id="add" class="mb-4 f-w" href="javascript:void(0)">
                            {{$list->name}}
                            <span>({{\App\Model\Service::where('salon_id',$item->id)->where('service_list_id',$list->id)->count()}})</span>
                            <i class="fas fa-angle-down i-salon fa-2x"></i>
                        </a>
                        @foreach ( \App\Model\Service::where('salon_id',$item->id)->where('status',1)->where('service_list_id',$list->id)->get() as $service)
                            <div class="content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="h6 font-weight-bold">
                                                {{$service->name}}
                                            </p>
                                            <a class="font-weight-bold serviceDetailsButton"  data-service_id="{{$service->id}}" data-service_list_id="{{$list->id}}" data-salon_id="{{$item->id}}" href="javascript:void(0)" data-toggle="modal"
                                               data-target="#serviceDetailsModal">{{ trans('web.detailsRervations') }} </a>
                                            <span class="text-muted font-weight-bold">
                                        <i class="far fa-clock pr-2">
                                            {{$service->created_at}}
                                        </i>
                                    </span>
                                        </div>
                                        <div class="col styl-right font-weight-bold">
                                            {{$service->price}}
                                            ريال <i class="fas fa-plus icon-color"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="service-card" style="width: 18rem;">
                <div class="card-body pt-2">
                    <div class="head-card row">
{{--                        <div class="col-2">--}}
{{--                            <p class="h3">4.4</p>--}}
{{--                        </div>--}}
                        <div class="col-12 text-center">
                            <div class="rev pt-2">
                                 {!! $item->salon_review !!}
                            </div>
                            {{-- <p class="p-rate">
                                 <span> 98 </span> <span> {{ trans('web.reviews') }}</span>
                            </p> --}}
                        </div>
                        {{-- <div class="col-3 pt-2 pl-0 pr-0">
                            <a href="" class="font-weight-bold">{{ trans('web.viewAll') }}</a>
                        </div> --}}
                    </div>
{{--                    <button  data-toggle="modal" data-target="#staticBackdrop" type="button" class="form-control butn pt-3 pb-1 "> <span class="num-cart">2</span><i class="fas fa-shopping-cart pr-2 pl-4"></i>{{ trans('web.bookNow') }} </button>--}}
                    {{-- <div class="mt-3 font-xsmall">
                        <p  class="d-inline font-weight-bold text-muted " > {{ trans('web.orderTotal') }}</p>
                        <span class="float-styl text-success font-weight-bold ">121.5 ريال</span>
                    </div> --}}
                    <p class="font-weight-bold text-secondary h-font text-center"> {{ $item->salon_name}}</p>
                    <p class="font-weight-bold text-secondary"><i class="fas fa-map-marker-alt"></i>  {{ $item->location_address}}</p>
                    {{-- <p class="font-weight-bold icon-color mt-2 h-font" >{{ trans('web.openingHours') }}</p> --}}
                     @if ($item->salon_payment_method_online_payment == 1)
                        <p class="text-muted font-weight-bold  ">
                            {{ trans('web.paypal') }}
                                <img class="img-pay" src="{{url('design\site\images\1554739182-Pay_Online.png')}}" alt="">
                                {{-- <img class="img-right" src="{{url('design\site\images\11-512.png')}}" alt=""> --}}
                    @endif
                    </p>
                </div>
            </div>
            <div>
                <a href="{{url('chat/?salonId='.$item->id)}}" class="btn text-white p-0 live-chat-link">
                        <div class="live-chat">
                            {{ trans('web.liveChat') }}
                            <i class="fas fa-comments fa-2x"></i>
                        </div>
                </a>
             </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
{{--  <div class="modal-dialog" role="document">--}}
{{--    <div class="modal-content">--}}
{{--      <div class="modal-header">--}}
{{--        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>--}}
{{--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--          <span aria-hidden="true">&times;</span>--}}
{{--        </button>--}}
{{--      </div>--}}
{{--      <div class="modal-body">--}}
{{--        ...--}}
{{--      </div>--}}
{{--      <div class="modal-footer">--}}
{{--        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--        <button type="button" class="btn btn-primary">Understood</button>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
</div>
    </div>
</div>
@include('site.profile.salon.tabs.service.serviceDetailsModal',['id' => 'serviceDetailsModal',])
