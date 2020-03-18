<div class="footer text-center text-md-left ">
    <button class="flaot-left btn btn-top " id="btn-top" style="display: inline-block;">
        <i class="fas fa-angle-up fa-2x"></i>
    </button>    
    <div class="container">
        <div class="ltr-styl">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pt-2 pb-2">
                        <img src="{{url('design/site/images/icon.png')}}" alt="logo" width="130px">
                    </div>
                    <div class="">
                        <p class=" col-md-9 text-muted p-0"><small> {{ trans('web.longText') }}</small></p>
                    </div>
                    <div>
                        <h5 class="">
                            <strong >{{ trans('web.followUs') }}</strong>
                        </h5>
                    </div>
                    <div class="social">
                        <span><a href=""><img src="{{url('design/site/images/facebook.png')}}" style="margin-bottom:12px" alt="" width="30px" ></a></span>
                        <span><a href=""><img src="{{url('design/site/images/twitter.png')}}" style="margin-bottom:12px" alt="" width="30px" ></a></span>
                        <span><a href=""><img src="{{url('design/site/images/0a34b4fab2bb70762b9775afafce9d49.png')}}" style="margin-bottom:12px" alt="" width="30px" ></a></span>
                        <span><a href=""><img src="{{url('design/site/images/linkedin.png')}}" style="margin-bottom:12px" alt="" width="30px" ></a></span>
                    </div>
                </div>
                <div class="col-6 col-lg-2 col-md-3">
                    <div class="pt-4">
                        <div>
                            <h5 class="">
                                <strong > {{ trans('web.contact') }}</strong>
                            </h5>
                            <a href="{{url('/services-items')}}" class="h6 text-muted d-block">{{ trans('web.customerHelpCentre') }} </a>
                            <a href="{{url('/contact-us')}}" class="h6 text-muted d-block"> {{ trans('web.contactUs') }}</a>
                        </div>
                        <div>
                            <h5 class="">
                                <strong> {{ trans('web.partners') }} </strong>
                            </h5>
                            <a href="{{url('/show-salon')}}" class="h6 text-muted d-block">{{ trans('web.listYourSalon') }} </a>
                            <a href="{{url('/helping-partners')}}" class="h6 text-muted d-block"> {{ trans('web.partnerHelpCenter') }} </a>
                        </div>
                    </div>
                </div>
                <div class=" col-6 col-lg-2 col-md-3">
                    <div class="pt-4">
                        <div>
                            <h5 class="">
                                <strong >{{trans('web.company')}}</strong>
                            </h5>
                            <a href="{{url('/about-us')}}" class="h6 text-muted d-block">{{trans('web.aboutUs')}}</a>
                            <a href="{{url('/protection')}}" class="h6 text-muted d-block">{{trans('web.privacyPolicy')}}</a>
                        </div>
                        <div>
                            <h5 class="">
                                <strong >{{trans('web.help')}}</strong>
                            </h5>
                            <a href="{{url('/help-center')}}" class="h6 text-muted d-block">{{trans('web.helpCenter')}}</a>
                            <a href="{{url('/customers-services')}}" class="h6 text-muted d-block">{{trans('web.itemSupport')}}</a>
                            <a href="{{url('/customer-services-center')}}" class="h6 text-muted d-block">{{trans('web.customerRefunds')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="pt-4">
                        <div class="pb-3 row">
                            <div class="col-12 col-lg-12 col-md-6">
                                <h5 class="">
                                    <strong >{{trans('web.news')}}</strong>

                                </h5>
                                <p class="h6 font-weight-bold pb-2 text-muted"><strong>  {{trans('web.subscribeToOurNewsletterForLatestUpdate')}}</strong> </p>
                            </div>
                            <div class="Subscribe col-6  col-md-6">
                                <input type="text" id="subscribe_input_mail" name="subscribe" placeholder="{{trans('web.enterEmail')}}">
                                <button class="" type="button" onclick="checkEmail()"><i class="far fa-paper-plane text-white"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-12  col-md-12 pt-md-3">
                        <div class="">
                            <img src="{{url('design/site/images/paypal.png')}}"  alt="" style="width:250px">
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>



<div>
    <footer class="text-center p-3">
            <p>  {{trans('web.allRightsReserved')}} </p>
    </footer>
</div>
@include('site.layout.scripts')


