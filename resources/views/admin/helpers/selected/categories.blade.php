@php
    $required = false;
    $isDisabled  = false;
    $col = $col ?? 4;
    $category_id = old('category_id') ?? $category_id ?? null;
    $categories = $categories ?? null;

@endphp

<div class="col-lg-{{$col}}">
    <label for="sel1" class="font-weight-semibold">Danh mục @if($required){!!'<span class="required-alert">*</span>' !!} @endif</label>

    <select class="form-control select2" id="category_id" name="category_id"
            {{ ($required) ? 'required' : '' }}
    @if($isDisabled)
        {{'disabled'}}
        @endif>
        >
        @if(isset($categories))
            <option value="">
                Chọn Danh mục
            </option>
            @foreach($categories as $key => $value)
                <option value="{{$value->id}}" {{ ($value->id == $category_id) ? 'selected="selected"' : '' }}>
                    {{ $value->name }}
                </option>
            @endforeach
        @else
            <option value="">
                Chọn Danh mục
            </option>
        @endif
    </select>

</div>

<script>
    $('.select2').select2();
</script>
