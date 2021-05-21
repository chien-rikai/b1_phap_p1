<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">{{ __('common.name', ['model' => __('common.product')]) }} {!!'<span class="required-alert">*</span>'!!}</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                            name="name" value="{{ old('name') }}" id="name">
                        @if ($errors->has('name'))
                            <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>



                {{ loadCategoriesSelected([
                    'categories' => $categories,
                    'col' => 6,
                    'required' => true,
                ]) }}
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">{{ __('common.price') }} {!!'<span class="required-alert">*</span>'!!}</label>
                        <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : ''}}"
                            name="price" value="{{ old('price', 0) }}" id="name">
                        @if ($errors->has('price'))
                            <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="name">{{ __('common.price_promotion') }}</label>
                        <input type="text" class="form-control {{ $errors->has('price_promotion') ? 'is-invalid' : ''}}"
                            name="price_promotion" value="{{ old('price_promotion', 0) }}" id="name">
                        @if ($errors->has('price_promotion'))
                            <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('price_promotion') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">{{ __('common.description') }}</label>
                        <textarea type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}"
                            name="description" value="{{ old('description') }}" id="description"
                            >{{ old('description') }}
                        </textarea>
                        @if ($errors->has('description'))
                            <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-6">
                    <div class="form-group">
                        <label for="name">{{ __('common.avatar') }} {!!'<span class="required-alert">*</span>'!!}</label>
                        <input type="file" class="form-control {{ $errors->has('url_image') ? 'is-invalid' : ''}}"
                            name="url_image" value="{{ old('url_image') }}" id="name" placeholder="">
                        @if ($errors->has('url_image'))
                            <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('url_image') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="name">{{ __('common.stock') }}</label>
                        <input type="text" class="form-control {{ $errors->has('stock') ? 'is-invalid' : ''}}"
                            name="stock" value="{{ old('stock', 0) }}" id="name">
                        @if ($errors->has('stock'))
                            <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('stock') }}</span>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('products.index') }}" class="btn btn-default">{{ __('common.back') }}</a>
        <button type="submit" class="btn btn-primary">{{ __('common.save') }}</button>
    </div>
</form>