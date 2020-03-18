@extends('site.layout.index')
@section('content')
    <main class="py-4 ltr-styl">
        <div class="container">
            @if(count($carts) > 0)
                @php
                    $user = auth()->User();
                       $cartsalonIDS = \App\Model\Cart::where('user_id', $user->id)->pluck('salon_id')->toArray();
                       $cartsalonIDS = array_unique($cartsalonIDS);
                        if (count($cartsalonIDS) > 1) {
                           return redirect('/cart')->with('error', trans('web.youCannot'));
                       }
                        $salon = \App\Model\User::where('id',$cartsalonIDS[0])->first();
                @endphp
                <div class="row">
                    <div class=" col-12 col-lg-8  row">
                        <div class="">
                            {{--                        <h3>{{ trans('web.shoppingCart') }}</h3>--}}
                        </div>
                        <table class="table table-border">
                            <thead class="thead-light font-small-12">
                            <tr>
                                <th class="p-table p_lr " scope="col">{{ trans('web.salonName') }}</th>
                                <th class="p-table" scope="col">{{ trans('web.salonImage') }}</th>
                                <th class="p-table" scope="col">{{ trans('web.serviceName') }}</th>
                                <th class="p-table" scope="col">{{ trans('web.employeeName') }}</th>
                                <th class="p-table" scope="col">{{ trans('web.photoEmployee') }}</th>
                                <th class="p-table" scope="col">{{ trans('web.servicePrice') }}</th>
                                <th class="p-table" scope="col">{{ trans('web.delete') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($carts as $cart)

                                <tr>
                                    <td class="p_lr">{{$cart->salon->name}}</td>
                                    <th scope="row">
                                        <img src="{{$cart->salon->main_image}}" class="img-fluid img-thumbnail"
                                             alt="" width="40px" height="auto">
                                    </th>
                                    <td>{{$cart->service->name}}</td>
                                    <td>{{$cart->team->name}}</td>
                                    <th scope="row">
                                        <img src="{{$cart->team->main_image}}" class="img-fluid img-thumbnail" alt=""
                                             width="40px" height="auto">
                                    </th>
                                    <td>{{$cart->service->price}} {{ trans('web.sar') }}</td>
                                    <td><a href="{{url()->current().'/'.$cart->id}}"><i
                                                class="fas fa-times text-danger"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 col-lg-4 ltr-styl">
                        <div class="card bg-card mb-3">
                            <form action="{{url('reservations/store')}}" method="post">
                                @csrf

                                <div class="card-body">
                                    @if($salon->salon_payment_method_cash == 1 || $salon->salon_payment_method_online_payment == 1 || $salon->salon_payment_method_promotions == 1)
                                    <div class="bg-light mb-5 p-3">
                                            @if($salon->salon_payment_method_cash == 1)
                                                <div class="col-md-12">
                                                    <div class="form-check form-check-inline ">
                                                        <input class="form-check-input" type="radio" required
                                                               id="payment_method_1"
                                                               value="1" name="payment_method">
                                                        <label class="form-check-label font-small-12"
                                                               for="payment_method_1">
                                                            {{ trans('web.payInTheSalon') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($salon->salon_payment_method_online_payment == 1)
                                                <div class="col-md-12">
                                                    <div class="form-check form-check-inline ">
                                                        <input class="form-check-input" type="radio" required
                                                               id="payment_method_2"
                                                               value="2" name="payment_method">
                                                        <label class="form-check-label font-small-12"
                                                               for="payment_method_2">
                                                            {{ trans('web.cardPayment') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($salon->salon_payment_method_promotions == 1 && $salon->salon_payment_method_promotion_value > 0)
                                                <div class="col-md-12">
                                                    <div class="form-check form-check-inline ">
                                                        <input class="form-check-input" type="radio" required
                                                               id="payment_method_3"
                                                               value="3" name="payment_method">
                                                        <label class="form-check-label font-small-12"
                                                               for="payment_method_3">
                                                            {{ trans('web.payOnlyPart') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-md-12 m-0 p-0 bookDate">
                                                @include('site.components.inputs.date', [
                                                'name' => 'date',
                                                'id' => 'date',
                                                'type' => 'text',
                                                'class' => 'float-appointmaents font-small-12',
                                                'value' => '',
                                                'label' =>  trans('web.bookingDate'),
                                                'icon' =>'',
                                                'placeholder' => trans('web.bookingDate'),
                                                'disabled' => false,
                                                'required' => true,
                                                ])
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-12 m-0 p-0 float-non pt-3">
                                                @include('site.components.inputs.time', [
                                                   'name' => 'time',
                                                   'id' => 'time',
                                                   'class' => 'float-appointmaents font-small-12',
                                                   'type' => 'time',
                                                   'value' => '',
                                                   'label' => trans('web.reservationTime'),
                                                   'placeholder' => trans('web.reservationTime'),
                                                   'disabled' => false,
                                                   'required' => true,
                                                   ])
                                            </div>

                                    </div>

                                    <div class="bg-light p-3">
                                        <div class="row font-small-12">
                                            <div class="col-7">
                                                <p class="font-weight-bold">{{ trans('web.total') }} :</p>
                                            </div>
                                            <div class="col-5">
                                                <p>{{$carts->sum('price')}} {{ trans('web.sar') }}</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-2">
                                        <div class="col-md-12">
                                            <button class="btn full-width form-control block-element btn-crud"
                                                    type="submit">
                                                <i class="fas fa-shopping-cart text-white font-weight-bold "></i>
                                                {{ trans('web.checkout') }}
                                            </button>
                                        </div>


                                    </div>
                                        @else
                                                                <h5>لم يقم الصالون بأضافه وسيله دفع</h5>
                                    @endif
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="my-reviews text-center p-4">
                            <p class="font-weight-bold mb-0"> لم تقم بأضافه اي حجوزات حتي الان</p>
                        </div>
                    </div>
                </div>
        @endif
        </div>
    </main>
@stop
