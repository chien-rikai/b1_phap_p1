<form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            @csrf

            @if(session()->has('failures'))
                <ul class="alert alert-danger">
                    @foreach(session()->get('failures') as $error)
                        <li>{{ "[" . "\"".$error->values()[$error->attribute()]."\"" . "] " . $error->errors()[0] }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">File upload {!!'<span class="required-alert">*</span>'!!}</label>
                        <input type="file" class="form-control {{ $errors->has('upload') ? 'is-invalid' : ''}}"
                            name="upload" value="{{ old('upload') }}" id="name">

                        @if ($errors->has('upload'))
                            <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('upload') }}</span>
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