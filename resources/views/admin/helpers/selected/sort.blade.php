<div class="col-lg-{{$col}}">
    <label for="sel1" class="font-weight-semibold">{{ $title }} </label>

    <select class="form-control select2" id="category_id" name="{{ $name }}" >
        <option value="">Mặc định</option>
        <option value="asc" {{ (old($name) === 'asc') ? 'selected' : '' }}>Tăng dần</option>
        <option value="desc" {{ (old($name) === 'desc') ? 'selected' : '' }}>Giảm dần</option>
    </select>
</div>