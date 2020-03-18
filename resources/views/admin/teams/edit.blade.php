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
            @include('admin.layout.panels.breadcrumb', ['pageName' => trans('web.teams') .' : '.$item->name ,'items'=>[
            [
            'name'=>trans('web.teams'),
            'url'=>url('/admin/teams'),
            ]
            ]
            ])
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> {{trans('web.editTeam') .' '.$item->name}}</h4>
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
                                                        'label' => trans('web.teamArabicName'),
                                                        'icon' =>'feather icon-user',
                                                        'placeholder' => trans('web.teamArabicName'),
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
                                                        'label' =>  trans('web.teamEnglishName'),
                                                        'icon' =>'feather icon-user',
                                                        'placeholder' =>  trans('web.teamEnglishName'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>


                                                    <hr class="divider">
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'job_title_ar',
                                                        'id' => 'name_en',
                                                        'type' => 'text',
                                                        'class' => 'name_en',
                                                        'value' => $item->job_title_ar,
                                                        'label' =>  trans('web.teamArabicJobTitle'),
                                                        'icon' =>'fa fa-archive',
                                                        'placeholder' =>  trans('web.teamArabicJobTitle'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="divider"></div>

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'job_title_en',
                                                        'id' => 'name_en',
                                                        'type' => 'text',
                                                        'class' => 'name_en',
                                                        'value' =>  $item->job_title_en,
                                                        'label' => trans('web.teamEnglishJobTitle'),
                                                        'icon' =>'fa fa-archive',
                                                        'placeholder' => trans('web.teamEnglishJobTitle'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.uploud.file', ['name' =>'image','label'=>trans('web.teamImage'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>url('storage' . $item->image)])
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.textarea', [
                                                        'name' => 'excerpt_ar',
                                                        'id' => 'keyword_ar',
                                                        'type' => 'text',
                                                        'class' => 'keyword_ar',
                                                        'value' => $item->excerpt_ar,
                                                        'label' => trans('web.teamArabicExcerpt'),
                                                        'icon' =>'fa fa-paragraph',
                                                        'placeholder' => trans('web.teamArabicExcerpt'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="divider "></div>

                                                    <div class="col-xl-12 col-md-12 col-12 mt-1">
                                                        @include('admin.components.inputs.textarea', [
                                                        'name' => 'excerpt_en',
                                                        'id' => 'description_en',
                                                        'type' => 'text',
                                                        'class' => 'description_en',
                                                        'value' => $item->excerpt_en,
                                                        'label' => trans('web.teamEnglishExcerpt'),
                                                        'icon' =>'fa fa-paragraph',
                                                        'placeholder' =>  trans('web.teamEnglishExcerpt'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.select', [
                                                        'name' => 'salon_id',
                                                        'id' => 'main_category_id',
                                                        'class' => 'danger',
                                                        'value' => '',
                                                        'label' => trans('web.selectSalon'),
                                                        'oldcheaked' => $item->salon_id,
                                                        'items' => \App\Model\User::where('user_type_id',1)->get(),
                                                        'placeholder' => trans('web.selectSalon'),
                                                        'checked' => false,
                                                        'disabled' => false,
                                                        ])
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
