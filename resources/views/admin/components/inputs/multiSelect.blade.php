<fieldset class="form-group">
    <label for="{{$id}}">{{$label}}</label>
    <select class="select2 form-control {{$class}}"
            @if (isset($disabled) && $disabled == true)
            disabled readonly="readonly"
            @endif
            name="{{$name}}[]" placeholder="{{$label}}" id="{{$id}}" multiple="multiple">
        @foreach ($items as $item)
            <option <?php if (is_array($oldcheaked)) {
                if (in_array($item->id, $oldcheaked)) {
                    echo 'selected';
                }
            } ?> value="{{$item->id}}">{{$item->name_en}}</option>
        @endforeach
    </select>
</fieldset>
