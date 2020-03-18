@extends('admin.layout.index')
@section('page_css')
    @if (session('lang') == 'en')
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/forms/wizard.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css-rtl/plugins/forms/wizard.css')}}">
    @endif

@stop
@section('page_js')
    <script src="{{url('design/admin/vendors/js/extensions/jquery.steps.min.js')}}"></script>
    <script src="{{url('design/admin/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{url('design/admin/js/scripts/forms/wizard-steps.js')}}"></script>
@stop
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
{{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
{{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}
            "></div>
        <div class="content-wrapper">
             @include('admin.layout.panels.breadcrumb', ['pageName' => trans('web.siteSettings') ,'items'=>[
            [
            'name'=>'',
            'url'=>'',
            ]
            ]
            ])

            <div class="content-body">
                <section id="validation">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{url()->current()}}" method="post" class="steps-validation wizard-circle" enctype="multipart/form-data">
                                        @csrf
                                            <h6><i class="step-icon feather icon-info"></i>{{trans('web.siteInformation')}}</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                          'name' => 'title_ar',
                                                          'id' => 'title_ar',
                                                          'type' => 'text',
                                                          'class' => 'title_ar',
                                                          'value' => $settings->title_ar,
                                                          'label' => trans('web.arabicTitle'),
                                                          'icon' =>'fa fa-sort-alpha-asc',
                                                          'placeholder' => trans('web.arabicTitle'),
                                                          'disabled' => false,
                                                          'required' => true,
                                                          ])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                          'name' => 'title_en',
                                                          'id' => 'title_en',
                                                          'type' => 'text',
                                                          'class' => 'title_en',
                                                          'value' => $settings->title_en,
                                                          'label' => trans('web.englishTitle'),
                                                          'icon' =>'fa fa-sort-alpha-asc',
                                                          'placeholder' => trans('web.englishTitle'),
                                                          'disabled' => false,
                                                          'required' => true,
                                                          ])
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'fullName',
                                                        'id' => 'fullName',
                                                        'type' => 'text',
                                                        'class' => 'fullName',
                                                        'value' => $settings->fullName,
                                                        'label' => trans('web.fullName'),
                                                        'icon' =>'fa fa-sort-alpha-asc',
                                                        'placeholder' => trans('web.fullName'),
                                                        'disabled' => false,
                                                        'required' => true,
                                                        ])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                       'name' => 'address',
                                                       'id' => 'address',
                                                       'type' => 'text',
                                                       'class' => 'address',
                                                       'value' => $settings->address,
                                                       'label' => trans('web.address'),
                                                       'icon' =>'feather icon-type',
                                                       'placeholder' => trans('web.address'),
                                                       'disabled' => false,
                                                       'required' => true,
                                                       ])
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                          'name' => 'mail',
                                                          'id' => 'mail',
                                                          'type' => 'email',
                                                          'class' => 'mail',
                                                          'value' => $settings->mail,
                                                          'label' => trans('web.siteEmail'),
                                                          'icon' =>'feather icon-mail',
                                                          'placeholder' => trans('web.siteEmail'),
                                                          'disabled' => false,
                                                          'required' => true,
                                                          ])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                         'name' => 'mobileNumber',
                                                         'id' => 'mobileNumber',
                                                         'type' => 'number',
                                                         'class' => 'mobileNumber',
                                                         'value' => $settings->mobileNumber,
                                                         'label' => trans('web.siteMobileNumber'),
                                                         'icon' =>'fa fa-sort-numeric-asc',
                                                         'placeholder' => trans('web.siteMobileNumber'),
                                                         'disabled' => false,
                                                         'required' => true,
                                                         ])
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                         'name' => 'fax',
                                                         'id' => 'fax',
                                                         'type' => 'number',
                                                         'class' => 'fax',
                                                         'value' => $settings->fax,
                                                         'label' => trans('web.siteFax'),
                                                         'icon' =>'fa fa-fax',
                                                         'placeholder' => trans('web.siteFax'),
                                                         'disabled' => false,
                                                         'required' => true,
                                                         ])
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <h6><i class="step-icon feather icon-github"></i>{{trans('web.siteSocialMedia')}}</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'twitterUrl',
                                                        'id' => 'twitterUrl',
                                                        'type' => 'url',
                                                        'class' => 'twitterUrl',
                                                        'value' => $settings->twitterUrl,
                                                        'label' => trans('web.twitterUrl'),
                                                        'icon' =>'feather icon-twitter',
                                                        'placeholder' => trans('web.twitterUrl'),
                                                        'disabled' => false,
                                                        'required' => true,
                                                        ])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                       'name' => 'linkedInUrl',
                                                       'id' => 'linkedInUrl',
                                                       'type' => 'url',
                                                       'class' => 'linkedInUrl',
                                                       'value' => $settings->linkedInUrl,
                                                       'label' => trans('web.linkedInUrl'),
                                                       'icon' =>'fa fa-linkedin',
                                                       'placeholder' => trans('web.linkedInUrl'),
                                                       'disabled' => false,
                                                       'required' => true,
                                                       ])
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                       'name' => 'instagramUrl',
                                                       'id' => 'instagramUrl',
                                                       'type' => 'url',
                                                       'class' => 'instagramUrl',
                                                       'value' => $settings->instagramUrl,
                                                       'label' => trans('web.instagramUrl'),
                                                       'icon' =>'feather icon-instagram',
                                                       'placeholder' => trans('web.instagramUrl'),
                                                       'disabled' => false,
                                                       'required' => true,
                                                       ])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                       'name' => 'facebookUrl',
                                                       'id' => 'facebookUrl',
                                                       'type' => 'url',
                                                       'class' => 'facebookUrl',
                                                       'value' => $settings->facebookUrl,
                                                       'label' => trans('web.faceBookUrl'),
                                                       'icon' =>'feather icon-facebook',
                                                       'placeholder' =>  trans('web.faceBookUrl'),
                                                       'disabled' => false,
                                                       'required' => true,
                                                       ])
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'gitHupUrl',
                                                        'id' => 'gitHupUrl',
                                                        'type' => 'url',
                                                        'class' => 'gitHupUrl',
                                                        'value' => $settings->gitHupUrl,
                                                        'label' =>  trans('web.gitHupUrl'),
                                                        'icon' =>'feather icon-github',
                                                        'placeholder' => trans('web.gitHupUrl'),
                                                        'disabled' => false,
                                                        'required' => true,
                                                        ])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'youtubeUrl',
                                                        'id' => 'youtubeUrl',
                                                        'type' => 'url',
                                                        'class' => 'youtubeUrl',
                                                        'value' => $settings->youtubeUrl,
                                                        'label' => trans('web.youtubeUrl'),
                                                        'icon' =>'fa fa-youtube',
                                                        'placeholder' => trans('web.youtubeUrl'),
                                                        'disabled' => false,
                                                        'required' => true,
                                                        ])
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <h6><i class="step-icon  fa fa-slideshare"></i>{{trans('web.siteIdentity')}}</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        @include('admin.components.uploud.file', ['name' =>'logo','label'=>trans('web.logo'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>$settings->main_logo])
                                                    </div>
                                                    <div class="col-md-4">
                                                        @include('admin.components.uploud.file', ['name' =>'footerLogo','label'=>trans('web.anotherLogo'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=> $settings->main_footer_logo])
                                                    </div>
                                                    <div class="col-md-4">
                                                        @include('admin.components.uploud.file', ['name' =>'icon','label'=>trans('web.icon'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>$settings->main_icon])
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <h6><i class="step-icon feather icon-image"></i> {{trans('web.siteSEO')}}</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.textarea', [
                                                      'name' => 'keyWords_ar',
                                                      'id' => 'keyWords_ar',
                                                      'type' => 'text',
                                                      'class' => '',
                                                      'value' => $settings->keyWords_ar,
                                                      'label' => trans('web.arabicKeyWords'),
                                                      'icon' =>'icon-phone',
                                                      'placeholder' =>  trans('web.arabicKeyWords'),
                                                      'disabled' => false,
                                                      ])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.textarea', [
                                                      'name' => 'keyWords_en',
                                                      'id' => 'keyWords_en',
                                                      'type' => 'text',
                                                      'class' => '',
                                                      'value' => $settings->keyWords_en,
                                                      'label' => trans('web.englishKeyWords'),
                                                      'icon' =>'icon-phone',
                                                      'placeholder' => trans('web.englishKeyWords'),
                                                      'disabled' => false,
                                                      ])
                                                    </div>
                                                </div>
                                                <div class="divider divider-text"></div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.textarea', [
                                                      'name' => 'description_ar',
                                                      'id' => 'description_ar',
                                                      'type' => 'text',
                                                      'class' => '',
                                                      'value' => $settings->description_ar,
                                                      'label' =>  trans('web.arabicDescription'),
                                                      'icon' =>'icon-phone',
                                                      'placeholder' => trans('web.arabicDescription'),
                                                      'disabled' => false,
                                                      ])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.textarea', [
                                                      'name' => 'description_en',
                                                      'id' => 'description_en',
                                                      'type' => 'text',
                                                      'class' => '',
                                                      'value' => $settings->description_en,
                                                      'label' => trans('web.englishDescription'),
                                                      'icon' =>'icon-phone',
                                                      'placeholder' => trans('web.englishDescription'),
                                                      'disabled' => false,
                                                      ])
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="divider divider-text"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop
