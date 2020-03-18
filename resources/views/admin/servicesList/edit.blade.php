@extends('admin.layout.index')
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/forms/wizard.css')}}">
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
            @include('admin.layout.panels.breadcrumb', ['pageName' => trans('web.editServicesList') .' : '.$item->name ,'items'=>[
            [
            'name'=>trans('web.servicesList'),
            'url'=>url('/admin/services-list'),
            ]
            ]
            ])
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> {{trans('web.editCategory') .' '.$item->name}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                            <form action="{{str_replace('/edit','',url()->current())}}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PATCH') }}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'name_ar',
                                                        'id' => 'name_ar',
                                                        'type' => 'text',
                                                        'class' => 'name_ar',
                                                        'value' => $item->name_ar,
                                                        'label' => trans('web.serviceArabicName'),
                                                        'icon' =>'feather icon-user',
                                                        'placeholder' => trans('web.serviceArabicName'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'name_en',
                                                        'id' => 'name_en',
                                                        'type' => 'text',
                                                        'class' => 'name_en',
                                                        'value' => $item->name_en,
                                                        'label' => trans('web.serviceEnglishName'),
                                                        'icon' =>'feather icon-user',
                                                        'placeholder' => trans('web.serviceEnglishName'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <hr class="divider">

                                                    <div class="col-xl-12 col-md-12 col-12 mt-1">
                                                        @include('admin.components.inputs.textarea', [
                                                        'name' => 'description_ar',
                                                        'id' => 'description_ar',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->description_ar,
                                                        'label' => trans('web.serviceArabicDesc'),
                                                        'icon' =>'icon-phone',
                                                        'placeholder' => trans('web.serviceArabicDesc'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="divider"></div>
                                                    <div class="col-xl-12 col-md-12 col-12 mt-1">
                                                        @include('admin.components.inputs.textarea', [
                                                        'name' => 'description_en',
                                                        'id' => 'description_en',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->description_en,
                                                        'label' => trans('web.serviceEnglishDesc'),
                                                        'icon' =>'icon-phone',
                                                        'placeholder' => trans('web.serviceEnglishDesc'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'keyword_ar',
                                                        'id' => 'keyword_ar',
                                                        'type' => 'text',
                                                        'class' => 'keyword_ar',
                                                        'value' => $item->keyword_ar,
                                                        'label' => trans('web.serviceArabicKeywords'),
                                                        'icon' =>'fa fa-key',
                                                        'placeholder' => trans('web.serviceArabicKeywords'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'keyword_en',
                                                        'id' => 'keyword_en',
                                                        'type' => 'text',
                                                        'class' => 'keyword_en',
                                                        'value' => $item->keyword_en,
                                                        'label' => trans('web.serviceEnglishKeywords'),
                                                        'icon' =>'fa fa-key',
                                                        'placeholder' => trans('web.serviceEnglishKeywords'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'icon',
                                                        'id' => 'icon',
                                                        'type' => 'text',
                                                        'class' => 'icon',
                                                        'value' => $item->icon,
                                                        'label' =>  trans('web.serviceIcon'),
                                                        'icon' =>'fa fa-black-tie',
                                                        'placeholder' => trans('web.serviceIcon'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.staticSelect', [
                                                        'name' => 'status',
                                                        'id' => 'status',
                                                        'class' => 'danger',
                                                        'label' => trans('web.status'),
                                                        'oldcheaked' => $item->status,
                                                        'placeholder' => trans('web.status'),
                                                        'checked' => false,
                                                        'disabled' => false,
                                                         'items' => [
                                                         [
                                                         'name'=> trans('web.activated'),
                                                         'value'=>'1',
                                                         ],
                                                         [
                                                         'name'=>trans('web.unActivated'),
                                                         'value'=>'0',
                                                         ],
                                                         ],
                                                        ])
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.uploud.file', ['name' =>'image_ar','label'=>trans('web.serviceArabicImage'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>url('storage' . $item->image_ar)])
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.uploud.file', ['name' =>'image_en','label'=>trans('web.serviceEnglishImage'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>url('storage' . $item->image_en)])
                                                    </div>

                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">{{trans('web.submit')}}</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">{{trans('web.reset')}}</button>
                                                    </div>
                                                </div>
                                            </div>
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
