<label for="{{$name}}">{{$label}}</label>
<fieldset class="form-group p-0 m-0 ">
    <input type="file" id="{{$name}}" name="{{$name}}" class="dropify" accept="{{$accept}}"
           data-max-file-size="{{$max}}M" data-default-file="{{$value}}"
           @if (isset($required) && $required == true)
           required
           @endif
           @if (isset($disabled) && $disabled == true)
           disabled readonly="readonly"
        @endif
    />
</fieldset>
