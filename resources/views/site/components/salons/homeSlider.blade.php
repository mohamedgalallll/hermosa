@foreach($items as $item)
    <div class="item mt-4 item-home">
        <div class="card card-profile-1 mb-4 mr-2">
            <div class="card-body  text-center pb-3">
                <div class="avatar box-shadow-2 mb-3">
                    <img class="img-fluid" src="{{$item->salon_main_image}}" alt=""/>
                </div>
                <h4 class="m-0 font-weight-bold text-color">{{$item->salon_name}}</h4>
                <p class="text-muted  font-weight-bold mb-2"> <span>{{$item->created_at}}</span></p>
                <div class="text-center">
                    <p class="text-muted mb-0">{{ \Illuminate\Support\Str::limit($item->salon_description, 80, $end=' .... ') }}</p>
                    <div>
                        <a href="{{url('/salon-details').'/'.$item->id}}" class="btn icon-color font-weight-bold ">
                            <i class="fas fa-angle-left" ></i> {{ trans('web.readMore') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
