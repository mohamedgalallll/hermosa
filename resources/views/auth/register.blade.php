@extends('auth.layout.index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-12 col-md-7">
                <nav class="tabs-login">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                           role="tab" aria-controls="nav-profile" aria-selected="false">{{ trans('web.client') }} </a>
                        <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home"
                           role="tab" aria-controls="nav-home" aria-selected="true">{{ trans('web.ower') }} </a>

                    </div>
                </nav>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div id="app">
                <main class="py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header text-center">  {{ trans('web.signup') }}   </div>
                                    <div class="card-body text-center">
                                        <form method="POST" action="{{url('client-register')}}">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3 mb-2">
                                                    <input id="first_name" name="first_name" value="{{old('first_name')}}" type="text" placeholder=" {{trans('web.firstName')}}"
                                                           class="form-control " required>
                                                </div>
                                                <div class="col-md-3 pl-3 pr-3">
                                                    <input id="last_name" name="last_name" value="{{old('last_name')}}" type="text" placeholder="{{trans('web.lastName')}}"
                                                           class="form-control " required>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <input id="email" name="email" type="email" value="{{old('email')}}" placeholder="{{ trans('web.email') }}"
                                                           class="form-control " required>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <input id="password" name="password" type="password" placeholder="{{ trans('web.password') }}"
                                                           class="form-control " required >
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <input id="first_phone" name="first_phone" value="{{old('first_phone')}}" type="text" placeholder="{{ trans('web.mobileNumber') }}"
                                                           class="form-control" required>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <input id="city" name="city" type="text" value="{{old('city')}}" placeholder="{{ trans('web.city') }}"
                                                           class="form-control " required>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <textarea name="notes" id="notes" placeholder="{{trans('web.howLocation')}}" cols="30" rows="3" class="form-control" >{{old('notes')}}</textarea>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <button type="submit" class="btn btn-primary col-12 pt-3 pb-3">
                                                         {{ trans('web.signup') }}
                                                    </button>
                                                    <div class="row mr-0">
                                                        <div class="col-6 pr-0 mt-1">
                                                            <a href="{{url('/facebook-redirect')}}" class="loginWith a-facebook">
                                                                <i class="fab fa-facebook-f"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-6 pr-0 mt-1">
                                                            <a href="{{url('/google-redirect')}}" class="loginWith a-google">
                                                                <i class="fab fa-google-plus-g"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3 ">
                                                    <a href="#"></a>
                                                </div>
                                                <div class="col-md-3 pl-0">
                                                    <a href="#"></a>
                                                </div>
                                            </div>

                                            <div class="have mt-0 mb-5">
                                                <span> {{ trans('web.doAccount') }}
                                                    <a class="nav-link " href="{{route('login')}}">{{trans('web.signIn')}}</a>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="tab-pane fade  " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div id="app">
                <main class="py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header text-center"> {{ trans('web.register') }}  </div>
                                    <div class="card-body text-center">
                                        <form method="POST" action="{{url('salon-register')}}">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                <input id="salon_name" name="salon_name" value="{{old('salon_name')}}" type="text" placeholder="{{ trans('web.salonName') }}"
                                                           class="form-control " required>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <input id="salon_location_address" name="salon_location_address" value="{{old('salon_location_address')}}" type="text" placeholder="{{ trans('web.salonAddress') }}"
                                                           class="form-control " required >
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <input id="name" name="name" type="text" value="{{old('name')}}" placeholder="{{ trans('web.nameSalonOwner') }}"
                                                           class="form-control " required >
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <input id="first_phone" name="first_phone" value="{{old('first_phone')}}" type="number" placeholder="{{ trans('web.mobileNumber') }}"
                                                           class="form-control " required>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <input id="email" name="email" type="email" value="{{old('email')}}" placeholder="{{ trans('web.email') }}" class="form-control" required>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <input id="password" name="password"   type="password" placeholder="{{ trans('web.password') }}"
                                                           class="form-control " required>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <button
                                                        type="submit"
                                                        class="btn btn-primary col-12 pt-3 pb-3"
                                                    >
                                                        {{ trans('web.signUp') }}
                                                    </button>

                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3 ">
                                                    <a href="#"></a>
                                                </div>
                                                <div class="col-md-3 pl-0">
                                                    <a href="#"></a>
                                                </div>
                                            </div>

                                            <div class="have mt-0 mb-5">
                                                <span> {{ trans('web.doAccount') }}
                                                    <a class="nav-link " href="{{route('login')}}">{{trans('web.signIn')}}</a>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

@endsection