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
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                    <img src="{{url('design/admin/images/pages/register.jpg')}}" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-2">
                                        <div class="card-header pt-50 pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">{{trans('web.createAccount')}}</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">{{trans('web.fillTheBelowForm')}}</p>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <form method="POST" action="{{ route('register') }}">
                                                    @csrf
                                                    <div class="form-label-group">
                                                        <input id="name" type="text"
                                                               class="form-control @error('name') is-invalid @enderror"
                                                               name="name" value="{{ old('name') }}" required
                                                               autocomplete="name" autofocus>
                                                        <label for="name">{{trans('web.name')}}</label>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input id="email" type="email"
                                                               class="form-control @error('email') is-invalid @enderror"
                                                               name="email" value="{{ old('email') }}" required
                                                               autocomplete="email">

                                                        <label for="email">{{trans('web.email')}}</label>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input id="password" type="password"
                                                               class="form-control @error('password') is-invalid @enderror"
                                                               name="password" required autocomplete="new-password">
                                                        <label for="password">{{trans('web.password')}}</label>
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input id="password-confirm" type="password"
                                                               class="form-control" name="password_confirmation"
                                                               required autocomplete="new-password">

                                                        <label
                                                            for="password-confirm">{{trans('web.confirmPassword')}}</label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" checked required>
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">{{trans('web.IAcceptTheTerms')}} </span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <a href="{{url('admin/login')}}" class="btn btn-outline-primary float-left btn-inline mb-50">{{trans('web.login')}}</a>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-50">{{trans('web.register')}}</button>
                                                </form>
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
