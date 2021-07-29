<div class="col-lg-{{$col}}">
    <label for="sel1" class="font-weight-semibold">{{ $title }} </label>

    <select class="form-control select2" id="status" name="{{ $name }}" >
        <option value="" {{ (is_null(old($name))) ? 'selected' : '' }}>{{ __('common.default') }}</option>
        @foreach (config('global.status_order') as $value => $trans)
            <option value="{{ $value }}" {{ (old($name) == $value) ? 'selected' : '' }}>{{ __('common.'.$trans) }}</option>
        @endforeach
    </select>
</div>