<div class="col-lg-{{$col}}">
    <label for="sel1" class="font-weight-semibold">{{ $title }} </label>

    <select class="form-control select2" id="category_id" name="{{ $name }}" >
        <option value="">{{ __('common.default') }}</option>
        <option value="asc" {{ (old($name) === 'asc') ? 'selected' : '' }}>{{ __('common.asc') }}</option>
        <option value="desc" {{ (old($name) === 'desc') ? 'selected' : '' }}>{{ __('common.desc') }}</option>
    </select>
</div>