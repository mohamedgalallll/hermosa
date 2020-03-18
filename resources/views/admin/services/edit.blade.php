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
            @include('admin.layout.panels.breadcrumb', ['pageName' => trans('web.editServices') .' : '.$item->name ,'items'=>[
            [
            'name'=>trans('web.editServices'),
            'url'=>url('/admin/services'),
            ]
            ]
            ])
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> {{trans('web.editServices') .' '.$item->name}}</h4>
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
                                                        'label' => trans('web.servicesArabicName'),
                                                        'icon' =>'feather icon-user',
                                                        'placeholder' => trans('web.servicesArabicName'),
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

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.textarea', [
                                                        'name' => 'description_ar',
                                                        'id' => 'description_ar',
                                                        'type' => 'text',
                                                        'class' => 'description_ar',
                                                        'value' => $item->description_ar,
                                                        'label' => trans('web.serviceArabicDesc'),
                                                        'icon' =>'icon-phone',
                                                        'placeholder' =>trans('web.serviceArabicDesc'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="divider"></div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.textarea', [
                                                        'name' => 'description_en',
                                                        'id' => 'description_en',
                                                        'type' => 'text',
                                                        'class' => 'description_en',
                                                        'value' => $item->description_en,
                                                        'label' => trans('web.serviceEnglishDesc'),
                                                        'icon' =>'icon-phone',
                                                        'placeholder' => trans('web.serviceEnglishDesc'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.uploud.file', ['name' =>'image','label'=>trans('web.image'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>url('storage' . $item->image)])
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('site.components.inputs.time', [
                                                        'name' => 'time',
                                                        'id' => 'time',
                                                        'type' => '',
                                                        'class' => 'time',
                                                        'value' =>  $item->time,
                                                        'label' => 'الوقت ',
                                                        'icon' =>'fa fa-clock-o',
                                                        'placeholder' => 'الوقت ',
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'price',
                                                        'id' => 'price',
                                                        'type' => 'text',
                                                        'class' => 'price',
                                                        'value' => $item->price,
                                                        'label' => trans('web.price'),
                                                        'icon' =>'fa fa-money',
                                                        'placeholder' =>  trans('web.price'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.select', [
                                                        'name' => 'salon_id',
                                                        'id' => 'salon_id',
                                                        'class' => 'salon_id',
                                                        'value' => '',
                                                        'label' => trans('web.selectSalon'),
                                                        'oldcheaked' => $item->salon_id,
                                                        'items' => \App\Model\User::where('user_type_id',1)->get(),
                                                        'placeholder' => trans('web.selectSalon'),
                                                        'checked' => false,
                                                        'disabled' => false,
                                                        ])
                                                    </div> <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.select', [
                                                        'name' => 'service_list_id',
                                                        'id' => 'main_category_id',
                                                        'class' => 'danger',
                                                        'value' => '',
                                                        'label' => trans('web.servicesList'),
                                                        'oldcheaked' => $item->service_list_id,
                                                        'items' => \App\Model\ServiceList::get(),
                                                        'placeholder' => trans('web.servicesList'),
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
