<div class="custom-control custom-checkbox">
    <input type="checkbox" id="{{$id}}"
           name="{{$name}}" id  value="{{$value}}" {{old($name) ? 'checked' : ''}}
           {{$checked == true ? 'checked' : ''}}
           class="custom-control-input"
           @if (isset($disabled) && $disabled == true)
           disabled readonly="readonly"
            @endif >
    <label class="custom-control-label" for="{{$id}}">{{$label}}</label>
</div>

