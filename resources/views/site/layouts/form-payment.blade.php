<form action="{{ route('do.payment') }}" method="post">
    @csrf
    
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">{{ __('common.name_custom') }}</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                        name="name" value="{{ old('name', Session::get('customer.0.name') ?? Auth::guard('site')->user()->name ?? '' ) }}" id="name"/>
                    @if ($errors->has('name'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">{{ __('common.phone') }}</label>
                    <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}"
                        name="phone" value="{{ old('phone', Session::get('customer.0.phone') ?? Auth::guard('site')->user()->phone ?? '') }}" id="name"/>
                    @if ($errors->has('phone'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">{{ __('common.email') }}</label>
                    <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}"
                        name="email" value="{{ old('email', Session::get('customer.0.email') ?? Auth::guard('site')->user()->email ?? '') }}" id="name"/>
                    @if ($errors->has('email'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">{{ __('common.address') }}</label>
                    <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}"
                        name="address" value="{{ old('address', Session::get('customer.0.address') ?? Auth::guard('site')->user()->address ?? '') }}" id="name"/>
                    @if ($errors->has('address'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('address') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('cart') }}" class="btn btn-grey">{{ __('common.back') }}</a>
        <button type="submit" class="btn btn-primary">{{ __('common.confirm') }}</button>
    </div>
</form>