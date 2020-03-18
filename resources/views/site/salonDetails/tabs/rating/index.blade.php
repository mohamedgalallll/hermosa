<div class="tab-pane fade pl-4" id="{{$id}}" role="tabpanel" aria-labelledby="{{$aria_labelledby}}">
    <div class="h4 pt-2 pb-2"><strong>{{ trans('web.reviews') }}</strong></div>
    <div class="container">
        @if(\App\Model\SalonReview::get()->count() > 0 )
            @foreach( $rates as $rate )
                <div class="my-reviews ">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-2 text-center">
                                <img
                                    src="{{url($rate->user_rate_image)}}"
                                    class="card-img"
                                    alt="..."
                                />
                            </div>
                            <div class="col-md-10">
                                <div class="card-body row">
                                    <div class="card-title font-weight-bold col-md-3">
                                        {{$rate->name}}
                                    </div>
                                    <div class="col-md-6 text-right post-info text-muted">
                                        posted on : {{$rate->created_at}}
                                    </div>
                                    <div class="col-md-3">
                                        <div class="show-rate">
                                            {!! $rate->salon_rate !!}
                                        </div>
                                    </div>
                                    <p class="card-text col">
                                        {{$rate->reviews_text}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach     
        @else
        <div class="my-reviews p-4">
            <p class="font-weight-bold mb-0"> {{ trans('web.noRate') }}</p>
        </div>
        @endif


        <div class="form-reviews profile-list">
            <h4 class="font-weight-bold">{{ trans('web.addRate') }}</h4>
            <form action="{{url()->current().'/rate'}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row ">
                    @guest
                        <div class="col-md-4">
                            @include('site.components.inputs.text', [
                          'name' => 'name',
                          'id' => 'name',
                          'type' => 'text',
                          'class' => 'input-review',
                          'value' => '',
                          'label' =>'',
                          'icon' =>'fas fa-user text-muted',
                          'placeholder' => trans('web.fullName'),
                          'disabled' => false,
                          'required' => true,
                          ])
                        </div>
                        <div class="col-md-4">
                            @include('site.components.inputs.text', [
                           'name' => 'email',
                           'id' => 'email',
                           'type' => 'email',
                           'class' => 'input-review',
                           'value' => '',
                           'label' => ' ',
                           'icon' =>'fas fa-envelope text-muted',
                           'placeholder' => trans('web.email'),
                           'disabled' => false,
                           'required' => true,
                           ])
                        </div>
                        <div class="col-md-4">
                            <div class="wrapper-rate">
                                <div class="wrapper">
                                    <span class="position-top text-muted">{{ trans('web.yourRating') }}  </span>
                                    <input type="radio" id="r1" name="reviews_rate" value="5" >
                                    <label for="r1"></label>
                                    <input type="radio" id="r2" name="reviews_rate" value="4">
                                    <label for="r2"></label>
                                    <input type="radio" id="r3" name="reviews_rate" value="3">
                                    <label for="r3"></label>
                                    <input type="radio" id="r4" name="reviews_rate" value="2">
                                    <label for="r4"></label>
                                    <input type="radio" id="r5" name="reviews_rate" value="1">
                                    <label for="r5"></label>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-12  ">
                            @include('site.components.inputs.textarea', [
                               'name' => 'reviews_text',
                               'id' => 'description_ar',
                               'type' => 'text',
                               'class' => 'input-review pt-0 m-0',
                               'value' =>'',
                               'label' => '',
                               'icon' =>'icon-phone text-muted',
                               'placeholder' => trans('web.typeMsg'),
                               'disabled' => false,
                           ])
                            <i class="far fa-paper-plane text-muted move-area "></i>
                        </div>
                        <button class="btn btn-rate mt-3 ">{{ trans('web.submit') }}</button>
                    @endguest
                    @auth
                        <div class="col-md-4">
                            <div class="wrapper-rate">
                                <div class="wrapper">
                                    <span class="position-top text-muted">{{ trans('web.yourRating') }}</span>
                                    <input type="radio" id="r1" name="reviews_rate" value="1" >
                                    <label for="r1"></label>
                                    <input type="radio" id="r2" name="reviews_rate" value="2">
                                    <label for="r2"></label>
                                    <input type="radio" id="r3" name="reviews_rate" value="3">
                                    <label for="r3"></label>
                                    <input type="radio" id="r4" name="reviews_rate" value="4">
                                    <label for="r4"></label>
                                    <input type="radio" id="r5" name="reviews_rate" value="5">
                                    <label for="r5"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 ">
                            @include('site.components.inputs.textarea', [
                               'name' => 'reviews_text',
                               'id' => 'description_ar',
                               'type' => 'text',
                               'class' => 'input-review pt-0 m-0',
                               'value' =>'',
                               'label' => '',
                               'icon' =>'icon-phone text-muted',
                               'placeholder' =>  trans('web.typeMsg'),
                               'disabled' => false,
                           ])
                            <i class="far fa-paper-plane text-muted move-area "></i>
                        </div>

                        <button class="btn btn-rate mt-3 ">{{ trans('web.submit') }}</button>
                    @endauth
                </div>

            </form>
        </div>
    </div>
</div>
