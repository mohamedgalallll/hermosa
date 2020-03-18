<div class="tab-pane fade " id="{{$id}}" role="tabpanel" aria-labelledby="{{$aria_labelledby}}">
    <div class="col-md-12">
        <h3>
             {{ trans('web.myServices')}}
            <button class="btn float-styl bg-color text-white" data-toggle="modal" data-target="#creteService">
                 {{ trans('web.addService')}}
                <i class="fas fa-plus float-right  pt-1 pl-2"></i>
            </button>
        </h3>
    </div>
    @foreach ($serviceLists as $list)
        <div class="accordion-container col-md-12">
            <div class="set">
                <a id="add" class="mb-4 f-w" href="javascript:void(0)">
                    {{$list->name}}
                    <span>({{\App\Model\Service::where('salon_id',auth()->User()->id)->where('service_list_id',$list->id)->count()}})</span>
                    <i class="fas fa-angle-down i-salon fa-2x"></i>
                </a>
                @foreach ( \App\Model\Service::where('salon_id',auth()->User()->id)->where('service_list_id',$list->id)->get() as $service)
                    <div class="content">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                            
                                    <p class="h6 font-weight-bold">{{$service->name}}</p>
                                    <a class="font-weight-bold serviceDetailsButton"  data-service_id="{{$service->id}}" data-service_list_id="{{$list->id}}"  href="javascript:void(0)" data-toggle="modal"
                                       data-target="#serviceDetailsModal">  {{ trans('web.details')}}</a>
                                    <span class="text-muted font-weight-bold">
                                        <i class="far fa-clock">
                                            {{$service->created_at}}
                                        </i>
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class=" serviceStatus">
                                            @if ($service->status == 0)
                                                <span class="btn btn-dark">معلق</span> 
                                            @elseif ($service->status == 1)
                                                <span class="btn btn-success">مقبول</span> 
                                            @elseif ($service->status == 2)
                                                <span class="btn btn-danger">مرفوض</span> 
                                            @elseif ($service->status == 3)
                                                <span class="btn btn-warning">Panned</span> 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col ltr-right font-weight-bold">
                                        {{$service->price}} {{ trans('web.sar') }} <i class="fas fa-plus icon-color"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@include('site.profile.salon.tabs.service.create',['id' => 'creteService',])
@include('site.profile.salon.tabs.service.serviceDetailsModal',['id' => 'serviceDetailsModal',])
