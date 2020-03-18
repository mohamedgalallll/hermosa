@php
    $teams = \App\Model\Team::
        where('service_id',$service->id)
         ->where('salon_id',auth()->User()->id)
         ->get()
@endphp
<div class="content">
    <p class="h5 font-weight-bold " style="color: #d91b89;">{{$service->name}}</p>
    <span><i class="far fa-clock" style="color: #000;"></i>{{$service->created_at}}</span>
    <p class="text-muted mt-2">{{$service->description}}</p>

    <a href="{{url('/profile/teams/add').'/'.$service->id.'/'. $service->service_list_id}}" class="addMemberToTeam"><i class="fas fa-plus float-right  pt-1 pl-2"></i>  {{ trans('web.addMember') }}</a>
    <div class="clearfix"></div>

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
                                <div class="row pt-3">
                                    <div class="col-6 mb-0">
                                        <a href="{{url('profile/teams/'.$team->id.'/'.$service->id.'/'. $service->service_list_id.'/edit')}}" class="btn btn-gray">
                                            <i class="far fa-edit text-muted "></i>
                                            {{ trans('web.update') }}
                                        </a>
                                    </div>
                                    <div class="col-6 mb-0">
                                        <a href="javascript:void(0)" data-team_id="{{$team->id}}" class="btn btn-gray deleteTeamMember">
                                            <i class="fas fa-trash-alt text-danger "></i>
                                           {{ trans('web.delete') }}
                                        </a>
                                    </div>
                                    <div class="col-5 text-center teamStatus mb-2">
                                        @if ($team->status == 0)
                                            <span class="btn btn-dark">معلق</span>
                                        @elseif ($team->status == 1)
                                            <span class="btn btn-success">مقبول</span>
                                        @elseif ($team->status == 2)
                                            <span class="btn btn-danger">مرفوض</span>
                                        @elseif ($team->status == 3)
                                            <span class="btn btn-warning">Panned</span>
                                        @endif
                                    </div>
                                     <div class="col-7 text-center teamStatus mb-2">
                                        {!! $team->status_teams !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="add-to-card row mt-4 mb-3" >
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <button class=" btn deleteService form-control btn-crud">
                                <a href="javascript:void(0)" class=" text-white btn " data-service_id="{{$service->id}}">
                                    <i class="fas fa-trash-alt text-white font-weight-bold"></i>
                                    {{ trans('web.deleteService') }}
                                </a>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a class=" btn form-control btn-add text-dark font-weight-bold" href="{{url('services/'.$service->id.'/edit')}}" style="padding:12px">
                                    <i class="far fa-edit icon-color"></i>
                                     {{ trans('web.editService') }}
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

