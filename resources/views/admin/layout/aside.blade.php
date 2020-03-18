<div class="main-menu menu-fixed menu-accordion menu-shadow  {{request()->cookie('theme_layout') == '' ? 'menu-light' : 'menu-dark'}}" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{url('')}}">
                    <div class="brand-logo" style="background: url('{{$settings->main_logo}}') no-repeat;"></div>
                    <h2 class="brand-text mb-0"> {{$settings->site_title}}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @include('admin.components.navItems.singleitem', ['url' => url('admin'),'name'=>trans('web.home'),'icon'=>'feather icon-home'])
            @if (auth()->User()->group_id->settigs_show == 1)
            @include('admin.components.navItems.singleitem', ['url' => url('admin/settings'),'name'=>trans('web.settings'),'icon'=>'feather icon-settings'])
            @endif
            @if (auth()->User()->group_id->admins_show == 1 || auth()->User()->group_id->admin_groups_show == 1 ||auth()->User()->group_id->clients_show == 1 )
            <li class=" navigation-header"><span>{{trans('web.users')}}</span></li>
            @if (auth()->User()->group_id->clients_show == 1)
                    @include('admin.components.navItems.multiitem', ['url' => 'javascript:void(0)','name'=>'All Users','icon'=>'feather icon-users','items'=>[
                  [
                  'name'=>'Clients',
                  'icon'=>'feather icon-circle',
                  'url'=>url('admin/clients'),
                  ],[
                  'name'=>'Salons',
                  'icon'=>'feather icon-circle',
                  'url'=>url('admin/salons'),
                  ],
                  ]])
            @endif
            @if (auth()->User()->group_id->admins_show == 1 || auth()->User()->group_id->admin_groups_show == 1)
            @include('admin.components.navItems.multiitem', ['url' => 'javascript:void(0)','name'=>trans('web.admins'),'icon'=>'feather icon-user-check','items'=>[
              [
              'name'=>'List Admins',
              'icon'=>'feather icon-circle',
              'url'=>url('admin/admins'),
              ],[
              'name'=>'Admin Groups',
              'icon'=>'feather icon-circle',
              'url'=>url('admin/admin-groups'),
              ],
              ]])
            @endif
            @endif


            @if (auth()->User()->group_id->categories_show == 1)
                <li class=" navigation-header"><span>{{trans('web.departments')}}</span></li>
            @include('admin.components.navItems.multiitem', ['url' => 'javascript:void(0)','name'=>trans('web.categories'),'icon'=>'feather icon-user-check','items'=>[
                          [
                          'name'=>trans('web.mainCategories'),
                          'icon'=>'feather icon-circle',
                          'url'=>url('admin/main-categories'),
                          ],[
                          'name'=>trans('web.subCategories'),
                          'icon'=>'feather icon-circle',
                          'url'=>url('admin/sub-categories'),
                          ],[
                          'name'=>trans('web.subSubCategories'),
                          'icon'=>'feather icon-circle',
                          'url'=>url('admin/sub-sub-categories'),
                          ],
                          ]])
            @endif

            @if (auth()->User()->group_id->categories_show == 1)
                @include('admin.components.navItems.multiitem', ['url' => 'javascript:void(0)','name'=>trans('web.services'),'icon'=>'feather icon-user-check','items'=>[
                              [
                              'name'=>trans('web.salonServices'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('admin/services'),
                              ],[
                              'name'=>trans('web.servicesList'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('admin/services-list'),
                              ]
                              ]])
            @endif

            @if (auth()->User()->group_id->categories_show == 1)
                @include('admin.components.navItems.multiitem', ['url' => 'javascript:void(0)','name'=>trans('web.reviews'),'icon'=>'feather icon-user-check','items'=>[
                              [
                              'name'=>trans('web.teamReviews'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('admin/team-reviews'),
                              ],[
                              'name'=>trans('web.salonReviews'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('admin/salon-reviews'),
                              ]
                              ]])
            @endif


            @if (auth()->User()->group_id->categories_show == 1)
                @include('admin.components.navItems.multiitem', ['url' => 'javascript:void(0)','name'=>trans('pages'),'icon'=>'feather icon-user-check','items'=>[
                              [
                              'name'=>trans('web.aboutUs'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('admin/about-us'),
                              ],[
                              'name'=>trans('web.protection'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('admin/protection'),
                              ],[
                              'name'=>trans('web.helpCenter'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('admin/help-center'),
                              ],[
                              'name'=>trans('web.serviceItems'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('services'),
                              ],[
                              'name'=>trans('web.customersService'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('services'),
                              ],[
                              'name'=>trans('web.customerServiceCenter'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('services'),
                              ],[
                              'name'=>trans('web.contactUs'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('admin/contact-us'),
                              ],[
                              'name'=>trans('web.showSalon'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('admin/show-salon'),
                              ],[
                              'name'=>trans('web.helpingPartners'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('admin/helping-partners'),
                              ],[
                              'name'=>trans('web.homeBackground'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('admin/home-background'),
                              ]
                              ]])
            @endif

            @if (auth()->User()->group_id->icons_show == 1)
                @include('admin.components.navItems.singleitem', ['url' => url('admin/teams'),'name'=>trans('web.teams'),'icon'=>'feather icon-users'])
            @endif

            @if (auth()->User()->group_id->icons_show == 1)
                @include('admin.components.navItems.singleitem', ['url' => url('admin/reservations'),'name'=>trans('web.reservations'),'icon'=>'feather icon-users'])
            @endif

            @if (auth()->User()->group_id->icons_show == 1)
                @include('admin.components.navItems.singleitem', ['url' => url('admin/subscribeEmail'),'name'=>trans('web.subscribeEmail'),'icon'=>'feather icon-mail'])
            @endif


            @if (auth()->User()->group_id->icons_show == 1)
                <li class=" navigation-header"><span>{{trans('web.uiElements')}}</span></li>
            @include('admin.components.navItems.multiitem', ['url' => 'javascript:void(0)','name'=>'Icons','icon'=>'feather icon-eye','items'=>[
            [
            'name'=>trans('web.featherIcons'),
            'icon'=>'feather icon-circle',
            'url'=>url('admin/icons-feather'),
            ],[
            'name'=>trans('web.fontAwesome'),
            'icon'=>'feather icon-circle',
            'url'=>url('admin/icons-font-awesome'),
            ],
            ]])
            @endif
        </ul>
    </div>
</div>
