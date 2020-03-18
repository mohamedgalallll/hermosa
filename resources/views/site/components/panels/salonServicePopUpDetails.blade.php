@php
    $teams = \App\Model\Team::where('service_id',$service->id)->where('salon_id',$salonID)->where('status_team',1)->where('status','1')->get()
@endphp
<div class="content">
    <p class="h5 font-weight-bold " style="color: #d91b89;">{{$service->name}}</p>
    <span><i class="far fa-clock" style="color: #000;"></i>{{$service->created_at}}</span>
    <p class="text-muted mt-2">{{$service->description}}</p>
    <div class="carousel-card pt-0">
        <div class="container">
            <div class="owl-carousel m-0 owl-theme row" id="service-details-carousel">
                @foreach($teams as $team)
                    <div class="item shadow">
                        <div class="card card-profile-1 mb-4 ">
                            <div class="card-body p-0 text-center">
                                <div class="avatar box-shadow-2 mb-3">
                                    <img src="{{$team->main_image}}" alt=""/>
                                </div>
                                <p class="font-20 mb-0 font-weight-bold">{{$team->name}}</p>
                                <p class="mb-2">{{$team->job_title}}</p>
                                <div class="text-center m-0">
                                    <p class="m-0 text-muted">{{$team->excerpt}}</p>
                                </div>
                                <div class="show-rate">
                                  {!! $team->review !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row pt-3 text-center">
                                    <div class="col-12">
                                        <a href="{{url('cart/'.$salonID.'/'.$service->id.'/'.$team->id)}}">
                                        <button class="btn bg-color mb-4 pl-4 pr-4 text-white pt-0 pb-0">
                                            {{ trans('web.chose') }}
                                        </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
{{--             <div class="add-to-card row mt-4 mb-3">--}}
{{--                <div class="col">--}}
{{--                    <button class="btn form-control btn-crud">--}}
{{--                        <a href="" class="text-white btn">--}}
{{--                            <i class="fas fa-shopping-cart text-white font-weight-bold "></i>--}}
{{--                            {{ trans('web.addCart') }}--}}
{{--                        </a>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <button class="btn form-control btn-add">--}}
{{--                        <i class="fas fa-plus icon-color"></i>--}}
{{--                        <a href="" class=" btn text-dark font-weight-bold ">--}}
{{--                            {{ trans('web.addCart') }}--}}
{{--                        </a>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
