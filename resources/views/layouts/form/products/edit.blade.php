<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            @csrf
            @method("PUT")

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">{{ __('common.name', ['model' => __('common.product')]) }} {!!'<span class="required-alert">*</span>'!!}</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                            name="name" value="{{ old('name', $product->name) }}" id="name" >
                        @if ($errors->has('name'))
                            <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                {{ loadCategoriesSelected([
                    'categories' => $categories,
                    'col' => 6,
                    'category_id' => $product->category_id,
                    'required' => true,
                ]) }}
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">{{ __('common.price') }} {!!'<span class="required-alert">*</span>'!!}</label>
                        <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : ''}}"
                            name="price" value="{{ formatCurrencyFrontEnd(old('price', $product->price)) }}" id="name">
                        @if ($errors->has('price'))
                            <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="name">{{ __('common.price_promotion') }}</label>
                        <input type="text" class="form-control {{ $errors->has('price_promotion') ? 'is-invalid' : ''}}"
                            name="price_promotion" value="{{ formatCurrencyFrontEnd(old('price_promotion', $product->price_promotion)) }}" id="name">
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
                            name="description"
                            id="description">{{ old('description', $product->description) }}
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
                        <label for="name">{{ __('common.avatar') }}</label>
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
                            name="stock" value="{{ old('stock', $product->stock) }}" id="name">
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