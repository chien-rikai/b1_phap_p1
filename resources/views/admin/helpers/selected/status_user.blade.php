<div class="col-lg-{{$col}}">
    <label for="sel1" class="font-weight-semibold">{{ $title }} </label>

    <select class="form-control select2" id="status" name="{{ $name }}" >
        <option value="1" {{ (old($name) === 1) ? 'selected' : '' }}>{{ __('common.active') }}</option>
        <option value="0" {{ (old($name) === 0) ? 'selected' : '' }}>{{ __('common.block') }}</option>
    </select>
</div>