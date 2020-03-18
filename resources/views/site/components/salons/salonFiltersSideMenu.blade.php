<div class="sticky-top">
    <div class="filter ">
        <div class="row">
            <div class="col-12">
                <form action="" id="AsideSalonsFilter">
                    <div class="asideSalonsFilters">
                        <div class="filter-styl">
                            <div class="row">
                                <div class="col-6 pt-2 pr-0">
                                    <h4 class="styl-left mb-0 f-w">{{ trans('web.fillter') }}</h4>
                                </div>
                                <div class="col-6">
                                    <h4 class="text-right mb-0">
                                        <a href="javascript:void(0)" class="icon-color f-w">
                                            {{ trans('web.clearAll') }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-container-filter">
                            <div class="accordion-container-filter">
                                <div class="set-filter">
                                    <a href="#" class="active">
                                    <span class="text-left text-filter">
                                        {{ trans('web.paymentMethod') }}
                                    </span>
                                        <i class="fa float-styl bg-icon-filter fa-minus"></i>
                                    </a>
                                    <div class="content-filter">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="salon_payment_method_online_payment" value="1" class="custom-control-input salon-input-filter "
                                                   id="customCheck44">
                                            <label class="custom-control-label" for="customCheck44">
                                                {{ trans('web.onlinePayment') }}
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="salon_payment_method_promotions" value="1" class="custom-control-input salon-input-filter"
                                                   id="customCheck45">
                                            <label class="custom-control-label" for="customCheck45"> {{ trans('web.promotionsPayment') }}</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="salon_payment_method_cash" value="1" class="custom-control-input salon-input-filter"
                                                   id="customCheck46">
                                            <label class="custom-control-label" for="customCheck46">
                                                {{ trans('web.cashSalon') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="set-filter">
                                    <a href="#" class="active">
                                    <span class="text-left text-filter">
                                        {{ trans('web.services') }}                                    
                                    </span>
                                        <i class="fa float-styl bg-icon-filter fa-minus"></i>
                                    </a>
                                    <div class="content-filter">
                                        @foreach(\App\Model\ServiceList::all() as $serviceList)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" {{request('serviceList') == $serviceList->id ? 'checked' : ''}} name="servicesList[]" value="{{$serviceList->id}}" class="custom-control-input salon-input-filter "
                                                       id="service-list-{{$serviceList->id}}">
                                                <label class="custom-control-label"
                                                       for="service-list-{{$serviceList->id}}">{{$serviceList->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
{{--                                <div class="set-filter  ">--}}
{{--                                    <a href="#" class="active">--}}
{{--                                        <span class="text-filter"> منطقة</span>--}}

{{--                                        <i class="fa float-right bg-icon-filter fa-minus"></i>--}}
{{--                                    </a>--}}
{{--                                    <div class="content-filter">--}}
{{--                                        <div class="custom-control custom-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="customCheck1">--}}
{{--                                            <label class="custom-control-label" for="customCheck1"> مدينه نصر </label>--}}
{{--                                            <span class="num-span">44</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="custom-control custom-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="customCheck2">--}}
{{--                                            <label class="custom-control-label" for="customCheck2">زمالك</label> <span--}}
{{--                                                class="num-span">43</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="custom-control custom-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="customCheck3">--}}
{{--                                            <label class="custom-control-label" for="customCheck3">مهندسين</label> <span--}}
{{--                                                class="num-span">4</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="set-filter ">
                                    <a href="#" class=" active">
                                    <span class="text-filter">
                                        {{ trans('web.rate') }}
                                    </span>
                                        <i class="fa float-styl bg-icon-filter fa-minus"></i>
                                    </a>
                                    <div class="wrapper filterWrapper content-filter pl-3 mt-0">
                                        <input type="radio" class="salon-input-filter" id="r1" value="5" name="rate">
                                        <label for="r1"></label>
                                        <input type="radio" class="salon-input-filter" id="r2" value="4" name="rate">
                                        <label for="r2"></label>
                                        <input type="radio" class="salon-input-filter" id="r3" value="3" name="rate">
                                        <label for="r3"></label>
                                        <input type="radio" class="salon-input-filter" id="r4" value="2" name="rate">
                                        <label for="r4"></label>
                                        <input type="radio" class="salon-input-filter" id="r5" value="1" name="rate">
                                        <label for="r5"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="filter mt-4">
                                <div class="row">
                                    <div class="col-12 filter-styl">
                                        <h4 class=" mb-0 f-w">{{ trans('web.filterByPrice') }}  </h4>
                                    </div>
                                    <div class="range-filter">
                                        <div id="slider-range" class="mt-4"></div>
                                        <p class="mt-3" style="font-size:14px">
                                            <label for="amount">{{ trans('web.price') }} </label>
                                            <input type="text" id="amount" class="col-8" readonly
                                                   style="border:0;  font-weight:bold;">
                                            <input type="hidden" id="min" name="min" value="">
                                            <input type="hidden" id="max" name="max" value="">
                                            <button type="button" class="btn_border salon-range-filter">{{ trans('web.fillter') }}</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
