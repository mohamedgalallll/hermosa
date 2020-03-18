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
            @include('admin.layout.panels.breadcrumb', ['pageName' =>  trans('web.editCategory') . ' : '.$item->name ,'items'=>[
            [
            'name'=>trans('web.subSubCategories'),
            'url'=>url('/admin/sub-sub-categories'),
            ]
            ]
            ])
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{trans('web.editCategory') .' '. $item->name}}</h4>
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
                                                        'label' =>trans('web.categoryArabicName'),
                                                        'icon' =>'feather icon-user',
                                                        'placeholder' => trans('web.categoryArabicName'),
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
                                                        'label' =>trans('web.categoryEnglishName'),
                                                        'icon' =>'feather icon-user',
                                                        'placeholder' =>trans('web.categoryEnglishName'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>


                                                    <hr class="divider">

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.textarea', [
                                                        'name' => 'description_ar',
                                                        'id' => 'description_ar',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->description_ar,
                                                        'label' => trans('web.categoryArabicDescription'),
                                                        'icon' =>'icon-phone',
                                                        'placeholder' => trans('web.categoryArabicDescription'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="divider"></div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.textarea', [
                                                        'name' => 'description_en',
                                                        'id' => 'description_en',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->description_en,
                                                        'label' => trans('web.categoryEnglishDescription'),
                                                        'icon' =>'icon-phone',
                                                        'placeholder' => trans('web.categoryEnglishDescription'),
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
                                                        'label' => trans('web.categoryArabicKeyWords'),
                                                        'icon' =>'feather icon-user',
                                                        'placeholder' => trans('web.categoryArabicKeyWords'),
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
                                                        'label' => trans('web.categoryEnglishKeyWords'),
                                                        'icon' =>'feather icon-user',
                                                        'placeholder' => trans('web.categoryEnglishKeyWords'),
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
                                                        'label' => trans('web.categoryIcon'),
                                                        'icon' =>'feather icon-user',
                                                        'placeholder' => trans('web.categoryIcon'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.staticSelect', [
                                                        'name' => 'status',
                                                        'id' => 'status',
                                                        'class' => 'danger',
                                                        'value' => '',
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
                                                        'name'=> trans('web.unActivated'),
                                                         'value'=>'0',
                                                         ],
                                                         ],
                                                        ])
                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.select', [
                                                        'name' => 'main_category_id',
                                                        'id' => 'mainCategoryToSelect',
                                                        'class' => 'danger',
                                                        'value' => '',
                                                        'label' => trans('web.selectMainCategory'),
                                                        'oldcheaked' => $item->main_category_id,
                                                        'items' => \App\Model\MainCategory::get(),
                                                        'placeholder' => trans('web.selectMainCategory'),
                                                        'checked' => false,
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12 " >
                                                        @include('admin.components.inputs.select', [
                                                        'name' => 'sub_category_id',
                                                        'id' => 'sup_category_id',
                                                        'class' => 'danger',
                                                        'value' => '',
                                                        'label' => trans('web.selectSubCategory'),
                                                        'oldcheaked' => $item->sup_category_id,
                                                        'items' => \App\Model\SubCategory::where('main_category_id',$item->main_category_id)->get(),
                                                        'placeholder' => trans('web.selectSubCategory'),
                                                        'checked' => false,
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.uploud.file', ['name' =>'image_ar','label'=>trans('web.categoryArabicCover'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>url('storage' . $item->image_ar)])
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.uploud.file', ['name' =>'image_en','label'=>trans('web.categoryEnglishCover'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>url('storage' . $item->image_en)])
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
