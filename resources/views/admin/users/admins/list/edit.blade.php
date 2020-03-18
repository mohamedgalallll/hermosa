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
            @include('admin.layout.panels.breadcrumb', ['pageName' => trans('web.editAdmin').' : '.$item->name ,'items'=>[
            [
            'name'=>trans('web.editAdmin'),
            'url'=>url('/admin/admins'),
            ]
            ]
            ])
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{trans('web.editAdmin')}} {{$item->name}}</h4>
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
                                                        'name' => 'name',
                                                        'id' => 'name',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->name,
                                                        'label' =>trans('web.adminName'),
                                                        'icon' =>'feather icon-user',
                                                        'placeholder' => trans('web.adminName'),
                                                        'disabled' => false,
                                                        'required' => true,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'email',
                                                        'id' => 'email',
                                                        'type' => 'email',
                                                        'class' => '',
                                                        'value' => $item->email,
                                                        'label' => trans('web.adminEmail'),
                                                        'icon' =>'feather icon-mail',
                                                        'placeholder' => trans('web.adminEmail'),
                                                        'disabled' => false,
                                                        'required' => true,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.select', [
                                                        'name' => 'admin_group',
                                                        'id' => 'admin_group',
                                                        'class' => 'danger',
                                                        'value' => '',
                                                        'label' => trans('web.adminGroup'),
                                                        'oldcheaked' => $item->admin_group,
                                                        'items' => \App\Model\AdminGroup::get(),
                                                        'placeholder' =>trans('web.adminGroup.'),
                                                        'checked' => false,
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'password',
                                                        'id' => 'password',
                                                        'type' => 'password',
                                                        'class' => '',
                                                        'value' => '',
                                                        'label' => trans('web.adminPassword'),
                                                        'icon' =>'feather icon-lock',
                                                        'placeholder' => trans('web.doNotTypeAnyThingIfYouDontWantToChangePassword'),
                                                        'disabled' => false,
                                                        'required' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'password_confirmation',
                                                        'id' => 'password_confirmation',
                                                        'type' => 'password',
                                                        'class' => '',
                                                        'value' => '',
                                                        'label' => trans('web.adminPasswordConfirmation'),
                                                        'icon' =>'feather icon-lock',
                                                        'placeholder' =>trans('web.adminPasswordConfirmation'),
                                                        'disabled' => false,
                                                        'required' => false,
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
