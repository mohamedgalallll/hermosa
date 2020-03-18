@extends('site.layout.index')
@section('content')
    <main class="py-4 profile-list">
        <div class="container">
            <form method="POST" action="{{url()->current()}}" id="" class="" enctype="multipart/form-data">
                @csrf
                <div class="add-new-data-sidebar">
                    <div class="overlay-bg"></div>
                    <div class="add-new-data">
                        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                            <div>
                                <h4 class="text-uppercase">{{ trans('web.addMemberTeam') }}</h4>
                            </div>
                        </div>
                        <div class="data-items pb-3 ltr-styl">
                            <div class="data-fields px-2 mt-3">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.inputs.text', [
                                        'name' => 'name_ar',
                                        'id' => 'name_ar',
                                        'type' => 'text',
                                        'class' => 'name_ar',
                                        'value' => '',
                                        'label' => trans('web.teamArabicName'),
                                        'icon' =>'feather icon-user',
                                        'placeholder' => trans('web.teamArabicName'),
                                        'disabled' => false,
                                        ])
                                    </div>

                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.inputs.text', [
                                        'name' => 'name_en',
                                        'id' => 'name_en',
                                        'type' => 'text',
                                        'class' => 'name_en',
                                        'value' => '',
                                        'label' => trans('web.teamEnglishName'),
                                        'icon' =>'feather icon-user',
                                        'placeholder' => trans('web.teamEnglishName'),
                                        'disabled' => false,
                                        ])
                                    </div>


                                    <hr class="divider">

                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.inputs.text', [
                                        'name' => 'job_title_ar',
                                        'id' => 'description_ar',
                                        'type' => 'text',
                                        'class' => '',
                                        'value' => '',
                                        'label' => trans('web.teamArabicJobTitle'),
                                         'icon' =>'fa fa-archive',
                                        'placeholder' => trans('web.teamArabicJobTitle'),
                                        'disabled' => false,
                                        ])
                                    </div>

                                    <div class="divider"></div>
                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.inputs.text', [
                                        'name' => 'job_title_en',
                                        'id' => 'description_en',
                                        'type' => 'text',
                                        'class' => '',
                                        'value' => '',
                                        'label' => trans('web.teamEnglishJobTitle'),
                                        'icon' =>' fa fa-archive',
                                        'placeholder' => trans('web.teamEnglishJobTitle'),
                                        'disabled' => false,
                                        ])
                                    </div>

                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('admin.components.uploud.file', ['name' =>'image','label'=>trans('web.teamImage'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>''])
                                    </div>

                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.inputs.textarea', [
                                        'name' => 'excerpt_ar',
                                        'id' => 'keyword_ar',
                                        'type' => 'text',
                                        'class' => 'keyword_ar',
                                        'value' => '',
                                        'label' => trans('web.teamArabicExcerpt'),
                                        'icon' =>'fa fa-paragraph',
                                        'placeholder' => trans('web.teamArabicExcerpt'),
                                        'disabled' => false,
                                        ])
                                    </div>

                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.inputs.textarea', [
                                        'name' => 'excerpt_en',
                                        'id' => 'keyword_en',
                                        'type' => 'text',
                                        'class' => 'keyword_en',
                                        'value' => '',
                                        'label' => trans('web.teamEnglishExcerpt'),
                                        'icon' =>'fa fa-paragraph',
                                        'placeholder' => trans('web.teamEnglishExcerpt'),
                                        'disabled' => false,
                                        ])
                                    </div>

                                    {{-- <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.inputs.select', [
                                        'name' => 'service_list_id',
                                        'id' => 'service_list_id',
                                        'class' => 'danger',
                                        'value' => '',
                                        'label' =>trans('web.serviceList'),
                                        'oldcheaked' => '',
                                        'items' => \App\Model\ServiceList::get(),
                                        'placeholder' =>trans('web.serviceList'),
                                        'checked' => false,
                                        'disabled' => false,
                                        ])
                                    </div>
                                    <div class="col-xl-12 col-md-12 col-12">
                                        <fieldset class="form-group">
                                            <label for="service_id">{{ trans('web.services') }}</label>
                                            <select class="select2 form-control " name="service_id"  id="service_id">

                                            </select>
                                        </fieldset>

                                    </div> --}}
                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('admin.components.inputs.staticSelect', [
                                        'name' => 'status_team',
                                        'id' => 'status_team',
                                        'class' => 'danger',
                                        'value' => 'name',
                                        'label' => trans('web.status'),
                                        'oldcheaked' => '',
                                        'placeholder' => trans('web.status'),
                                        'checked' => false,
                                        'disabled' => false,
                                        'items' => [
                                        [
                                        'name'=> trans('web.available'),
                                        'value'=>'1',
                                        ],
                                        [
                                        'name'=>trans('web.unavailable'),
                                        'value'=>'0',
                                        ],
                                        ],
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                            <div class="add-data-btn">
                                <button type="submit" class="btn btn-primary">{{trans('web.addData')}}</button>
                            </div>
                            <div class="cancel-data-btn">
                            <a href="{{url('/profile')}}" class="btn btn-outline-danger">{{trans('web.cancel')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    {{-- @section('main_js')
        <script>
            $(document).ready(function () {
                $('#service_list_id').change(function () {
                    var service_list_id = $(this).val();
                    if (service_list_id) {
                        $.ajax({
                            type: "GET",
                            url: "{{url('/getService')}}?service_list_id=" + service_list_id,
                            success: function (res) {
                                if (res) {
                                    $("#service_id").empty();
                                    $("#service_id").parent().parent().fadeIn();
                                    $.each(res, function (key,value) {
                                        $("#service_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                                    });

                                } else {
                                    $("#service_id").empty();
                                }
                            }
                        });
                    } else {
                        $("#service_id").empty();
                    }
                });
            });
        </script>
    @stop --}}
@stop

