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
            @include('admin.layout.panels.breadcrumb', ['pageName' => trans('web.editTeamReview') .' : '.$item->name ,'items'=>[
            [
            'name'=>trans('web.teamReviews'),
            'url'=>url('/admin/team-reviews'),
            ]
            ]
            ])
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> {{trans('web.editTeamReview') .' '.$item->name}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                            <form action="{{str_replace('/edit','',url()->current())}}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PATCH') }}
                                            <div class="form-body">
                                                <div class="row">

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        <label>{{trans('web.selectReview')}}</label>
                                                        <select class="form-control myFontAwesome myCustomSelect" name="reviews_rate">
                                                            <option {{ $item->reviews_rate == 1 ? 'selected' : ''}} value="1"> &#xf005; </option>
                                                            <option {{ $item->reviews_rate == 2 ? 'selected' : ''}} value="2"> &#xf005; &#xf005;</option>
                                                            <option {{ $item->reviews_rate == 3 ? 'selected' : ''}} value="3"> &#xf005; &#xf005; &#xf005;</option>
                                                            <option {{ $item->reviews_rate == 4 ? 'selected' : ''}} value="4"> &#xf005; &#xf005; &#xf005; &#xf005;</option>
                                                            <option {{ $item->reviews_rate == 5 ? 'selected' : ''}} value="5"> &#xf005; &#xf005; &#xf005; &#xf005; &#xf005;</option>
                                                        </select>
                                                    </div>


                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.staticSelect', [
                                                        'name' => 'status',
                                                        'id' => 'status',
                                                        'class' => 'danger',
                                                        'value' => 'name',
                                                        'label' => trans('web.status'),
                                                        'oldcheaked' =>  $item->status,
                                                        'placeholder' => trans('web.status'),
                                                        'checked' => false,
                                                        'disabled' => false,
                                                        'items' => [
                                                        [
                                                         'name'=> trans('web.pending'),
                                                         'value'=>'0',
                                                         ],
                                                         [
                                                         'name'=>trans('web.accepted'),
                                                         'value'=>'1',
                                                         ],
                                                         [
                                                         'name'=>trans('web.rejected'),
                                                         'value'=>'2',
                                                         ],
                                                         [
                                                         'name'=>trans('web.banned'),
                                                         'value'=>'3',
                                                         ],
                                                         ],
                                                        ])
                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.textarea', [
                                                        'name' => 'reviews_text',
                                                        'id' => 'reviews_text',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->reviews_text,
                                                        'label' => trans('web.reviewsText'),
                                                        'placeholder' => trans('web.reviewsText'),
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.select', [
                                                        'name' => 'salon_id',
                                                        'id' => 'salon_id',
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

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.select', [
                                                        'name' => 'team_id',
                                                        'id' => 'team_id',
                                                        'class' => 'danger',
                                                        'value' => '',
                                                        'label' => trans('web.memberName'),
                                                        'oldcheaked' => $item->team_id,
                                                        'items' => \App\Model\Team::get(),
                                                        'placeholder' => trans('web.memberName'),
                                                        'checked' => false,
                                                        'disabled' => false,
                                                        ])
                                                    </div>


                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.select', [
                                                        'name' => 'user_id',
                                                        'id' => 'user_id',
                                                        'class' => 'danger',
                                                        'value' => $item->user_id,
                                                        'label' => trans('web.selectUser'),
                                                        'oldcheaked' => '',
                                                        'items' => \App\Model\User::where('user_type_id',0)->get(),
                                                        'placeholder' => trans('web.selectUser'),
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
