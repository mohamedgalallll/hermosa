 {{-- BEGIN: Customizer --}}
<div class="customizer d-none d-md-block">
    <a class="customizer-close" href="javascript:void(0)">
        <i class="feather icon-x"></i>
    </a>
    <a class="customizer-toggle" href="javascript:void(0)">
        <i class="feather icon-settings fa fa-spin fa-fw white"></i>
    </a>
    <div class="customizer-content p-2">
        <h4 class="text-uppercase mb-0">{{trans('web.webSiteCustomizer')}}</h4>
        <small>{{trans('web.previewInRealTime')}}</small>
        <hr>
        {{-- Menu Colors Starts --}}
        <div id="customizer-theme-colors">
            <h5>{{trans('web.menuColors')}}</h5>
            <ul class="list-inline unstyled-list">
                <li class="color-box bg-primary {{request()->cookie('theme_color') == 'theme-primary' ? 'selected' : ''}} " data-color="theme-primary"></li>
                <li class="color-box bg-success {{request()->cookie('theme_color') == 'theme-success' ? 'selected' : ''}} " data-color="theme-success"></li>
                <li class="color-box bg-danger {{request()->cookie('theme_color') == 'theme-danger' ? 'selected' : ''}}  " data-color="theme-danger"></li>
                <li class="color-box bg-info {{request()->cookie('theme_color') == 'theme-info' ? 'selected' : ''}} " data-color="theme-info"></li>
                <li class="color-box bg-warning {{request()->cookie('theme_color') == 'theme-warning' ? 'selected' : ''}} " data-color="theme-warning"></li>
                <li class="color-box bg-dark {{request()->cookie('theme_color') == 'theme-dark' ? 'selected' : ''}} " data-color="theme-dark"></li>
            </ul>
        </div>
        {{-- Menu Colors Ends --}}
        <hr>
        {{-- Theme options starts --}}
        <h5 class="mt-1">{{trans('web.themeLayout')}}</h5>
        <div class="theme-layouts">
            <div class="d-flex justify-content-start">
                <div class="mx-50">
                    <fieldset>
                        <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" name="layoutOptions" value="false" class="layout-name" data-layout="" {{request()->cookie('theme_layout') == '' ? 'checked' : ''}} >
                            <span class="vs-radio">
                    <span class="vs-radio--border"></span>
                    <span class="vs-radio--circle"></span>
                    </span>
                            <span class="">{{trans('web.light')}}</span>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50">
                    <fieldset>
                        <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" name="layoutOptions" value="false" class="layout-name" data-layout="dark-layout" {{request()->cookie('theme_layout') == 'dark-layout' ? 'checked' : ''}} >
                            <span class="vs-radio">
                    <span class="vs-radio--border"></span>
                    <span class="vs-radio--circle"></span>
                    </span>
                            <span class="">{{trans('web.dark')}}</span>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50 semi-dark">
                    <fieldset>
                        <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" name="layoutOptions" value="false" class="layout-name" data-layout="semi-dark-layout" {{request()->cookie('theme_layout') == 'semi-dark-layout' ? 'checked' : ''}} >
                            <span class="vs-radio">
                    <span class="vs-radio--border"></span>
                    <span class="vs-radio--circle"></span>
                    </span>
                            <span class="">{{trans('web.semiDark')}}</span>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        {{-- Theme options starts --}}
        <hr>

        {{-- Collapse sidebar switch starts --}}
        <div id="collapse-sidebar">
            <div class="collapse-sidebar d-flex justify-content-between">
                <div class="collapse-option-title">
                    <h5 class="pt-25">{{trans('web.collapseSidebar')}}</h5>
                </div>
                <div class="collapse-option-switch">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch">
                        <label class="custom-control-label" for="collapse-sidebar-switch"></label>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        {{-- Collapse sidebar switch Ends --}}

        {{-- Navbar colors starts --}}
        <div id="customizer-navbar-colors">
            <h5>{{trans('web.navbarColors')}}</h5>
            <ul class="list-inline unstyled-list">
                <li class="color-box bg-white border {{request()->cookie('navbar_color') == '' ? 'selected' : ''}} " data-navbar-default=""  ></li>
                <li class="color-box bg-primary {{request()->cookie('navbar_color') == 'bg-primary' ? 'selected' : ''}} " data-navbar-color="bg-primary"  ></li>
                <li class="color-box bg-success {{request()->cookie('navbar_color') == 'bg-success' ? 'selected' : ''}} " data-navbar-color="bg-success"  ></li>
                <li class="color-box bg-danger {{request()->cookie('navbar_color') == 'bg-danger' ? 'selected' : ''}}" data-navbar-color="bg-danger"  ></li>
                <li class="color-box bg-info {{request()->cookie('navbar_color') == 'bg-info' ? 'selected' : ''}}  " data-navbar-color="bg-info" ></li>
                <li class="color-box bg-warning {{request()->cookie('navbar_color') == 'bg-warning' ? 'selected' : ''}} " data-navbar-color="bg-warning"  ></li>
                <li class="color-box bg-dark {{request()->cookie('navbar_color') == 'bg-dark' ? 'selected' : ''}} " data-navbar-color="bg-dark"  ></li>
            </ul>
            <hr>
        </div>
        {{-- Navbar colors ends --}}
        {{-- Navbar Type Starts --}}
        <div id="navbar-type">
            <h5 class="navbar_type">{{trans('web.navbarType')}}</h5>
            <h5 class="menu_type d-none">{{trans('web.menuType')}}</h5>
            <div class="navbar-type d-flex justify-content-between">
                <div class="mx-50">
                    <fieldset>
                        <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" name="navbarType" value="false" id="navbar-hidden" {{request()->cookie('navbar_type') == 'navbar-hidden' ? 'checked' : ''}}>
                            <span class="vs-radio">
                        <span class="vs-radio--border"></span>
                        <span class="vs-radio--circle"></span>
                    </span>
                            <span class="">{{trans('web.hidden')}}</span>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50">
                    <fieldset>
                        <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" name="navbarType" value="false" id="navbar-static" {{request()->cookie('navbar_type') == 'navbar-static' ? 'checked' : ''}} >
                            <span class="vs-radio">
                        <span class="vs-radio--border"></span>
                        <span class="vs-radio--circle"></span>
                    </span>
                            <span class="">{{trans('web.static')}}</span>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50">
                    <fieldset>
                        <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" name="navbarType" value="false" id="navbar-sticky" {{request()->cookie('navbar_type') == 'navbar-sticky' ? 'checked' : ''}}>
                            <span class="vs-radio">
                        <span class="vs-radio--border"></span>
                        <span class="vs-radio--circle"></span>
                    </span>
                            <span class="">{{trans('web.sticky')}}</span>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50">
                    <fieldset>
                        <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" name="navbarType" value="false" id="navbar-floating" {{request()->cookie('navbar_type') == 'navbar-floating' ? 'checked' : ''}}>
                            <span class="vs-radio">
                        <span class="vs-radio--border"></span>
                        <span class="vs-radio--circle"></span>
                    </span>
                            <span class="">{{trans('web.floating')}}</span>
                        </div>
                    </fieldset>
                </div>
            </div>
            <hr>
        </div>
        {{-- Navbar Type Starts --}}

        {{-- Footer Type Starts --}}
        <h5>{{trans('web.footerType')}}</h5>
        <div class="footer-type d-flex justify-content-start">
            <div class="mx-50">
                <fieldset>
                    <div class="vs-radio-con vs-radio-primary">
                        <input type="radio" name="footerType" value="false" id="footer-hidden" {{request()->cookie('footer_type') == 'footer-hidden' ? 'checked' : ''}}>
                        <span class="vs-radio">
                    <span class="vs-radio--border"></span>
                    <span class="vs-radio--circle"></span>
                </span>
                        <span class="">{{trans('web.hidden')}}</span>
                    </div>
                </fieldset>
            </div>
            <div class="mx-50">
                <fieldset>
                    <div class="vs-radio-con vs-radio-primary">
                        <input type="radio" name="footerType" value="false" id="footer-static"  {{request()->cookie('footer_type') == 'footer-static' ? 'checked' : ''}} >
                        <span class="vs-radio">
                    <span class="vs-radio--border"></span>
                    <span class="vs-radio--circle"></span>
                </span>
                        <span class="">{{trans('web.static')}}</span>
                    </div>
                </fieldset>
            </div>
            <div class="mx-50">
                <fieldset>
                    <div class="vs-radio-con vs-radio-primary">
                        <input type="radio" name="footerType" value="false" id="footer-sticky" {{request()->cookie('footer_type') == 'fixed-footer' ? 'checked' : ''}}>
                        <span class="vs-radio">
                    <span class="vs-radio--border"></span>
                    <span class="vs-radio--circle"></span>
                </span>
                        <span class="">{{trans('web.sticky')}}</span>
                    </div>
                </fieldset>
            </div>
        </div>
        {{-- Footer Type Ends --}}
        <hr>

        {{-- Hide Scroll To Top Starts--}}
        <div class="hide-scroll-to-top d-flex justify-content-between py-25">
            <div class="hide-scroll-title">
                <h5 class="pt-25">{{trans('web.hideScrollToTop')}}</h5>
            </div>
            <div class="hide-scroll-top-switch">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="hide-scroll-top-switch" {{request()->cookie('scroll_top') == 'enabled' ? 'checked' : ''}} >
                    <label class="custom-control-label" for="hide-scroll-top-switch"></label>
                </div>
            </div>
        </div>
        {{-- Hide Scroll To Top Ends--}}
    </div>
</div>
{{-- End: Customizer --}}
