
@php
    $salon_appointments =   json_decode($user->salon_appointments,true);
@endphp
<div class="tab-pane fade  " id="{{$id}}" role="tabpanel"
     aria-labelledby="{{$aria_labelledby}}">
    <form method="post" enctype="multipart/form-data" action="{{url('/profile/update-appointments')}}">
        @csrf
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-12 col-md-11 my-appoinment">
                <div class="mb-2 align-header">
                    <i class="fas fa-edit pl-2 pr-2"></i> {{ trans('web.appointments') }}
                </div>
                <div class="row myAppoint">
                    <div class="col-md-2 ">
                        <p class="day">{{ trans('web.saturday') }}</p>
                    </div>
                    <div class="col-md-5">
                        @include('site.components.inputs.time', [
                           'name' => 'saturday_from',
                           'id' => 'saturday_from',
                           'class' => 'float-appointmaents',
                           'type' => 'time',
                           'value' => $salon_appointments['saturday_from'],
                           'label' => trans('web.from'),
                           'placeholder' => '',
                           'disabled' => false,
                           ])
                    </div>
                    <div class="col-md-5">
                        @include('site.components.inputs.time', [
                         'name' => 'saturday_to',
                         'id' => 'saturday_to',
                         'class' => 'float-appointmaents',
                         'type' => 'time',
                         'value' => $salon_appointments['saturday_to'],
                         'label' => trans('web.to'),
                         'placeholder' => '',
                         'disabled' => false,
                         ])
                    </div>
                </div>
                <div class="row myAppoint">
                    <div class="col-md-2  ">
                        <p class="day">{{trans('web.sunday')}}</p>
                    </div>
                    <div class="col-md-5">
                        @include('site.components.inputs.time', [
                           'name' => 'sunday_from',
                           'id' => 'sunday_from',
                           'class' => 'sunday_from float-appointmaents',
                           'type' => 'time',
                           'value' => $salon_appointments['sunday_from'],
                           'label' => trans('web.from'),
                           'placeholder' => '',
                           'disabled' => false,
                           ])
                    </div>
                    <div class="col-md-5">
                        @include('site.components.inputs.time', [
                         'name' => 'sunday_to',
                         'id' => 'sunday_to',
                         'class' => 'sunday_to float-appointmaents',
                         'type' => 'time',
                         'value' => $salon_appointments['sunday_to'],
                         'label' => trans('web.to'),
                         'placeholder' => '',
                         'disabled' => false,
                         ])
                    </div>
                </div>
                <div class="row myAppoint">
                    <div class="col-md-2  ">
                        <p class="day">{{trans('web.monday')}}</p>
                    </div>
                    <div class="col-md-5">
                        @include('site.components.inputs.time', [
                           'name' => 'monday_from',
                           'id' => 'monday_from',
                           'class' => 'monday_from float-appointmaents',
                           'type' => 'time',
                           'value' => $salon_appointments['monday_from'],
                           'label' => trans('web.from'),
                           'placeholder' => '',
                           'disabled' => false,
                           ])
                    </div>
                    <div class="col-md-5">
                        @include('site.components.inputs.time', [
                         'name' => 'monday_to',
                         'id' => 'monday_to',
                         'class' => 'monday_to float-appointmaents',
                         'type' => 'time',
                         'value' =>  $salon_appointments['monday_to'],
                         'label' => trans('web.to'),
                         'placeholder' => '',
                         'disabled' => false,
                         ])
                    </div>
                </div>
                <div class="row myAppoint">
                    <div class="col-md-2  ">
                        <p class="day">{{trans('web.tuesday')}}</p>
                    </div>
                    <div class="col-md-5">
                        @include('site.components.inputs.time', [
                           'name' => 'tuesday_from',
                           'id' => 'tuesday_from',
                           'class' => 'tuesday_from float-appointmaents',
                           'type' => 'time',
                           'value' =>  $salon_appointments['tuesday_from'],
                           'label' => trans('web.from'),
                           'placeholder' => '',
                           'disabled' => false,
                           ])
                    </div>
                    <div class="col-md-5">
                        @include('site.components.inputs.time', [
                         'name' => 'tuesday_to',
                         'id' => 'tuesday_to',
                         'class' => 'tuesday_to float-appointmaents',
                         'type' => 'time',
                         'value' => $salon_appointments['tuesday_to'],
                         'label' => trans('web.to'),
                         'placeholder' => '',
                         'disabled' => false,
                         ])
                    </div>
                </div>
                <div class="row myAppoint">
                    <div class="col-md-2  ">
                        <p class="day">{{trans('web.wednesday')}}</p>
                    </div>
                    <div class="col-md-5">
                        @include('site.components.inputs.time', [
                           'name' => 'wednesday_from',
                           'id' => 'wednesday_from',
                           'class' => 'wednesday_from float-appointmaents',
                           'type' => 'time',
                           'value' => $salon_appointments['wednesday_from'],
                           'label' => trans('web.from'),
                           'placeholder' => '',
                           'disabled' => false,
                           ])
                    </div>
                    <div class="col-md-5">
                        @include('site.components.inputs.time', [
                         'name' => 'wednesday_to',
                         'id' => 'wednesday_to',
                         'class' => 'wednesday_to float-appointmaents',
                         'type' => 'time',
                         'value' => $salon_appointments['wednesday_to'],
                         'label' => trans('web.to'),
                         'placeholder' => '',
                         'disabled' => false,
                         ])
                    </div>
                </div>
                <div class="row myAppoint">
                    <div class="col-md-2  ">
                        <p class="day">{{trans('web.thursday')}}</p>
                    </div>
                    <div class="col-md-5">
                        @include('site.components.inputs.time', [
                           'name' => 'thursday_from',
                           'id' => 'thursday_from',
                           'class' => 'thursday_from float-appointmaents',
                           'type' => 'time',
                           'value' => $salon_appointments['thursday_from'],
                           'label' => trans('web.from'),
                           'placeholder' => '',
                           'disabled' => false,
                           ])
                    </div>
                    <div class="col-md-5">
                        @include('site.components.inputs.time', [
                         'name' => 'thursday_to',
                         'id' => 'thursday_to',
                         'class' => 'thursday_to float-appointmaents ',
                         'type' => 'time',
                         'value' => $salon_appointments['thursday_to'],
                         'label' => trans('web.to'),
                         'placeholder' => '',
                         'disabled' => false,
                         ])
                    </div>
                </div>
                <div class="row myAppoint">
                    <div class="col-md-2  ">
                        <p class="day">{{trans('web.friday')}}</p>
                    </div>
                    <div class="col-md-5">
                        @include('site.components.inputs.time', [
                           'name' => 'friday_from',
                           'id' => 'friday_from',
                           'class' => 'friday_from float-appointmaents',
                           'type' => 'time',
                           'value' =>  $salon_appointments['friday_from'],
                           'label' => trans('web.from'),
                           'placeholder' => '',
                           'disabled' => false,
                           ])
                    </div>
                    <div class="col-md-5">
                        @include('site.components.inputs.time', [
                         'name' => 'friday_to',
                         'id' => 'friday_to',
                         'class' => 'friday_to float-appointmaents',
                         'type' => 'time',
                         'value' => $salon_appointments['friday_to'],
                         'label' => trans('web.to'),
                         'placeholder' => '',
                         'disabled' => false,
                         ])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 ml-1 mt-4">
                        <button type="submit" class="btn bg-color text-white col-12">{{trans('web.save')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
