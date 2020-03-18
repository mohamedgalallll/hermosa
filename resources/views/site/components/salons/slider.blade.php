@foreach($footerSlider as $item)
<a class="link-salon" href="{{url('/salon-details').'/'.$item->id}}">
    <div class="item mt-4">
        <div class="card card-profile-1 mb-4 mr-2">
            <div class="card-body  text-center pb-3">
                <div class="avatar box-shadow-2 mb-3">
                    <img class="img-fluid" src="{{$item->salon_main_image}}" alt=""/>
                </div>
                <h4 class="m-0 font-weight-bold text-color">{{$item->salon_name}}</h4>
                <div class="rev">
                  {!! $item->salon_review!!}
                </div>
                <div class="text-center">
                    <p class="text-muted">{{ \Illuminate\Support\Str::limit($item->salon_description, 80, $end=' .... ') }}</p>
                    {{-- <div class="float-left font-weight-bold text-muted ml-3"> 0.34Km away</div> --}}
                </div>
            </div>
        </div>
    </div>
</a>
@endforeach
