<label for="{{$id}}" class="{{$class}}">{{$label}}</label>
<fieldset class="form-group p-0 m-0 ">
    <input type='text' name="{{$name}}"  value="{{isset($value) ? $value  : old($name)}}" placeholder="{{$placeholder}}" id="{{$id}}" class=" {{$class}} form-control pickadateInput"
           @if (isset($disabled) && $disabled == true)
           disabled readonly="readonly"
        @endif
    />
    @if (isset($icon))
        <span class="icon-position"><i class="{{$icon}}"></i></span>
    @endif
</fieldset>
