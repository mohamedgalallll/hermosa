<div class="vs-radio-con vs-radio-{{$class}}">
    <input name="{{$name}}" type="radio" value="{{$value}}"
           {{old($name) ? 'checked' : ''}} {{$checked == true ? 'checked' : ''}}
           @if (isset($disabled) && $disabled == true)
           disabled readonly="readonly"
        @endif
    >
    <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
    <span class="">{{$label}}</span>
</div>




