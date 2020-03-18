@php
    $settings = \App\Model\Settings::first();
@endphp
@extends('admin.auth.layout.index')
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/pages/authentication.css')}}">
@stop
@section('page_js')

@stop
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
{{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
{{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}
            "></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="{{url('design/admin/images/pages/login.png')}}" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">{{trans('web.login')}}</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">{{trans('web.welcomeBackLoginPage')}}</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf
                                                    <fieldset
                                                        class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" name="email"
                                                               class="form-control @error('email') is-invalid @enderror"
                                                               id="email"
                                                               placeholder="{{trans('web.userName')}}" value="{{ old('email') }}"
                                                               autocomplete="email" autofocus required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <label for="email">{{ __('E-Mail Address') }}</label>

                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                                               placeholder="{{trans('web.password')}}"  name="password"
                                                               required autocomplete="current-password" >
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                        <label for="password">{{ __('Password') }}</label>
                                                    </fieldset>
                                                    <div
                                                        class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                                           id="remember"  {{ old('remember') ? 'checked' : '' }}>
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">{{trans('web.rememberMe')}}</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        @if (Route::has('password.request'))
                                                        <div class="text-right">
{{--                                                            <a href="{{url('admin/forgot-password')}}" class="card-link">{{ __('Forgot Your Password?') }}</a>--}}
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <a href="{{url('admin/register')}}"
                                                       class="btn btn-outline-primary float-left btn-inline">{{trans('web.register')}}</a>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline">{{ __('Login') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
                                            <div class="divider">
                                                <div class="divider-text">{{trans('web.or')}}</div>
                                            </div>
                                            <div class="footer-btn d-inline">
                                                <a href="{{$settings->facebookUrl}}" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                                <a href="{{$settings->twitterUrl}}" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                                <a href="{{$settings->googleUrl}}" class="btn btn-google"><span class="fa fa-google"></span></a>
                                                <a href="{{$settings->gitHupUrl}}" class="btn btn-github"><span class="fa fa-github-alt"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
