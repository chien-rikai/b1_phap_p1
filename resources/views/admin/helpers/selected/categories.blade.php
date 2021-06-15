<div class="col-lg-{{$col}}">
    <label for="sel1" class="font-weight-semibold">{{ __('common.category') }} {!! ($required) ? '<span class="required-alert">*</span>' : '' !!} </label>

    <select class="form-control select2" id="category_id" name="category_id"
            {{ ($required) ? 'required' : '' }}
    @if($isDisabled)
        {{'disabled'}}
        @endif>
        >
        @if(isset($categories))
            <option value="">
                {{ __('common.category') }}
            </option>
            @foreach($categories as $key => $value)
                <option value="{{$value->id}}" {{ ($value->id == $category_id) ? 'selected="selected"' : '' }}>
                    {{ $value->name }}
                </option>
            @endforeach
        @else
            <option value="">
                {{ __('common.category') }}
            </option>
        @endif
    </select>

</div>

