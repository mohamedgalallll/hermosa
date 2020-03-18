<label class="pt-2" for="{{$id}}">{{$label}}</label>
<fieldset class="form-group p-0 m-0 ">
    <input type="{{$type}}" class="form-control  {{$class}}" id="{{$id}}"
           @if (isset($disabled) && $disabled == true)
           disabled readonly="readonly"
           @endif
           @if (isset($required) && $required == true)
           required
           @endif
           name="{{$name}}"
           value="{{isset($value) ? $value  : old($name)}}" placeholder="{{$placeholder}}">
    @if (isset($icon))
        <span class="icon-position"><i class="{{$icon}}"></i></span>
    @endif
</fieldset>
