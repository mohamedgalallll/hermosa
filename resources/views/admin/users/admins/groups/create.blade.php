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
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">

                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab"
                                         role="tabpanel">
                                        <form action="{{str_replace('/create','',url()->current())}}" method="POST"
                                              class="form form-vertical" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                <div class="col-12 col-sm-12">
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                @include('admin.components.inputs.text', [
                                                                'name' => 'name_ar',
                                                                'id' => 'name_ar',
                                                                'type' => 'text',
                                                                'class' => '',
                                                                'value' => '',
                                                                'label' => trans('web.arabicGroupName'),
                                                                'icon' =>'feather icon-user',
                                                                'placeholder' => trans('web.arabicGroupName'),
                                                                'disabled' => false,
                                                                'required' => true,
                                                                ])
                                                            </div>
                                                            <div class="col-md-6">
                                                                @include('admin.components.inputs.text', [
                                                               'name' => 'name_en',
                                                               'id' => 'name_en',
                                                               'type' => 'text',
                                                               'class' => '',
                                                               'value' => '',
                                                               'label' => trans('web.englishGroupName'),
                                                               'icon' =>'feather icon-user',
                                                               'placeholder' =>trans('web.englishGroupName'),
                                                               'disabled' => false,
                                                               'required' => true,
                                                               ])
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                @include('admin.components.inputs.textarea', [
                                                                 'name' => 'description_ar',
                                                                 'id' => 'description_ar',
                                                                 'type' => 'text',
                                                                 'class' => '',
                                                                 'value' => '',
                                                                 'label' => trans('web.arabicGroupDescription'),
                                                                 'icon' =>'icon-phone',
                                                                 'placeholder' => trans('web.arabicGroupDescription'),
                                                                 'disabled' => false,
                                                                 ])
                                                            </div>

                                                            <div class="col-md-6">
                                                                @include('admin.components.inputs.textarea', [
                                                                 'name' => 'description_en',
                                                                 'id' => 'description_en',
                                                                 'type' => 'text',
                                                                 'class' => '',
                                                                 'value' => '',
                                                                 'label' => trans('web.englishGroupDescription'),
                                                                 'icon' =>'icon-phone',
                                                                 'placeholder' => trans('web.englishGroupDescription'),
                                                                 'disabled' => false,
                                                                 ])
                                                            </div>
                                                        </div>

                                                        <hr class="divider">


                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="table-responsive border rounded px-1 ">
                                                        <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>{{trans('web.permission')}}</h6>
                                                        <table class="table table-borderless">
                                                            <thead>
                                                            <tr>
                                                                <th>{{trans('web.module')}}</th>
                                                                <th>{{trans('web.read')}}</th>
                                                                <th>{{trans('web.create')}}</th>
                                                                <th>{{trans('web.edit')}}</th>
                                                                <th>{{trans('web.delete')}}</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>{{trans('web.settings')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'settings_show',
                                                                        'id' => 'settings_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'settings_edit',
                                                                        'id' => 'settings_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td></td>
                                                            </tr>



                                                            <tr>
                                                                <td>{{trans('web.clients')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'clients_show',
                                                                        'id' => 'clients_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'clients_add',
                                                                        'id' => 'clients_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'clients_edit',
                                                                        'id' => 'clients_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'clients_delete',
                                                                        'id' => 'clients_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>



                                                            <tr>
                                                                <td>{{trans('web.admins')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admins_show',
                                                                        'id' => 'admins_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admins_add',
                                                                        'id' => 'admins_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admins_edit',
                                                                        'id' => 'admins_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admins_delete',
                                                                        'id' => 'admins_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>



                                                            <tr>
                                                                <td>{{trans('web.adminGroups')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admin_groups_show',
                                                                        'id' => 'admin_groups_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admin_groups_add',
                                                                        'id' => 'admin_groups_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admin_groups_edit',
                                                                        'id' => 'admin_groups_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admin_groups_delete',
                                                                        'id' => 'admin_groups_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>



                                                            <tr>
                                                                <td>{{trans('web.categories')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'categories_show',
                                                                        'id' => 'categories_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'categories_add',
                                                                        'id' => 'categories_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'categories_edit',
                                                                        'id' => 'categories_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'categories_delete',
                                                                        'id' => 'categories_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>



                                                            <tr>
                                                                <td>{{trans('web.contact')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'contact_show',
                                                                        'id' => 'contact_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'contact_add',
                                                                        'id' => 'contact_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'contact_edit',
                                                                        'id' => 'contact_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'contact_delete',
                                                                        'id' => 'contact_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>



                                                            <tr>
                                                                <td>{{trans('web.icons')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'icons_show',
                                                                        'id' => 'icons_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'icons_add',
                                                                        'id' => 'icons_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'icons_edit',
                                                                        'id' => 'icons_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'icons_delete',
                                                                        'id' => 'icons_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-12 d-flex flex-sm-row flex-column justify-content-start mt-1">
                                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">{{trans('web.saveChanges')}}</button>
                                                    <button type="reset" class="btn btn-outline-warning">{{trans('web.reset')}} </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->

            </div>
        </div>
    </div>
@stop
