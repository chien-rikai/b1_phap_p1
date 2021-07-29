<form action="{{ route('orders.index') }}" method="GET">
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">{{ __('common.name_custom') }} </label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                            name="name" value="{{ old('name') }}" id="name">
                       
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">{{ __('common.email') }} </label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                            name="email" value="{{ old('email') }}" id="name" >
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">{{ __('common.phone') }} </label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                            name="phone" value="{{ old('phone') }}" id="name">
                        @if ($errors->has('phone'))
                            <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="row">
                {{ loadStatusOrderSelected([
                    'title' => __('common.order_status'),
                    'col' => 4,
                ]) }}
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{ __('common.search') }}</button>
    </div>
</form>