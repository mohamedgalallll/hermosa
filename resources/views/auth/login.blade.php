@extends('auth.layout.index')
@section('content')
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card text-center logincard">
                            <div class="card-header">{{ trans('web.signIn') }}</div>
                            <div class="card-body">
                                <form method="post" action="{{route('login')}}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6 ">
                                            <input id="email" name="email" value="{{old('email')}}" type="email"
                                                   placeholder=" {{ trans('web.email') }}" class="form-control ">
                                        </div>
                                        <div class="col-md-3"></div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6 ">
                                            <input id="password" name="password" type="password" placeholder=" {{ trans('web.password') }}" class="form-control ">
                                        </div>
                                        <div class="col-md-3"></div>

                                    </div>
                                    <div class="form-group row mb-4">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary col-12 pt-3 pb-3">
                                                 {{trans('web.login')}}
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
                                    <div class="newAccount pb-2">
                                        <a href="" > {{ trans('web.forgetPassword') }} </a>
                                    </div>
                                    <div class="newAccount">
                                       <span class="text-muted"> {{trans('web.createANewAccount')}} </span><a href="{{url('register')}}"> {{ trans('web.signup') }}</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection
