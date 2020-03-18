<fieldset class="form-group p-0 m-0 position-relative">
    <input type="{{$type}}" class="form-control  {{$class}}" id="{{$id}}"name="{{$name}}"value="{{isset($value) ? $value  : old($name)}}" placeholder="{{$placeholder}}">
    @if (isset($icon))
        <span class="icon-position"><i class="{{$icon}}"></i></span>
    @endif
</fieldset>
