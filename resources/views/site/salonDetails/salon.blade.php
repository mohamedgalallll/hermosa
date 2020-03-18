@extends('site.layout.index')
@section('content')
    <main class="py-4 ltr-styl">
      <div class="pl-4 pb-4 salon-links">
        <div class="container">
          <span class="detil"><a href="{{url('')}}">{{ trans('web.home') }} </a> <span> . </span></span>
          <span class="detil "><a href="" class="icon-color"> {{$item->salon_name}}</a></span>
        </div>
      </div>
      <div class="title-salon ">
        <div class="container">
          <h3 class="text-bolder">
           <span class="name-float">{{$item->salon_name}}</span>
              <div class="rev rev-float">
                  {!! $item->salon_review!!}
              </div>
          </h3>
          @if ($item->salon_payment_method_online_payment==1)
            <div class=" pt-2 rev-float">
              <img class="img-pay" src="{{url('design\site\images\1554739182-Pay_Online.png')}}" alt="">
              <span class="pt-1 pl-2 font-weight-bold">  {{ trans('web.paypal') }} </span>
            </div>
          @endif
            <div class="clearfix"></div>
        </div>
      </div>
      @if(count($salonImages) > 0)
        <div class="owl-carousel owl-theme pt-3" id="carousel1">
            @foreach ($salonImages as $salonImage)
              <div class="item">
                <img src="{{url('storage').$salonImage->path}}" alt="logo" />
              </div>
            @endforeach
        </div>
       @endif
      <div class="description">
        <div class="container">
          <ul class="nav nav-pills pr-0 " id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"> {{ trans('web.description') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">{{ trans('web.services') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"> {{ trans('web.reviews') }} <span>({{count($rates)}})</span></a>
            </li>
          </ul>
          <hr class="mt-0"/>
          <div class="tab-content" id="pills-tabContent">
              @include('site.salonDetails.tabs.description.index',[
                  'id' => 'pills-home',
                  'aria_labelledby' => 'pills-home-tab',
              ])
              @include('site.salonDetails.tabs.services.index',[
                  'ServiceList' => $serviceList,
                  'id' => 'pills-profile',
                  'aria_labelledby' => 'pills-profile-tab',
              ])
              @include('site.salonDetails.tabs.rating.index',[
                  'id' => 'pills-contact',
                  'aria_labelledby' => 'pills-contact-tab',
              ])
          </div>
        </div>
         @if(count($footerSlider) > 0)
        <div class="carousel-card">
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <h3 class="pl-4 mb-0 text-color font-weight-bold">{{ trans('web.beautySalonsNearby') }}</h3>
                    </div>
                </div>
                <div class="owl-carousel owl-theme" id="carousel_salons">
                        @include('site.components.salons.slider',['footerSlider'=>$footerSlider])
                </div>
            </div>
        </div>
        @endif
     </div>
    </main>
@section('page_js')
    @include('site.salonDetails.scripts',['item'=>$item])
@endsection
@stop

