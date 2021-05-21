@extends('layouts.master')

@section('title')
{{ __('common.title', [
    'model' => __('common.user'),
    'module' => __('common.change_password')
]) }}
@endsection

@section('content')

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('common.change_password') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('common.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('common.change_password') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('user.change.pass', $user->id) }}" method="POST" >
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    @csrf
                                    @method("PUT")

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">{{ __('common.password_new') }} {!!'<span class="required-alert">*</span>'!!}</label>
                                                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}"
                                                    name="password" value="{{ old('password') }}" id="name">
                                                @if ($errors->has('password'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">{{ __('common.password_verify') }} {!!'<span class="required-alert">*</span>'!!}</label>
                                                <input type="password" class="form-control {{ $errors->has('password_verify') ? 'is-invalid' : ''}}"
                                                    name="password_verify" value="{{ old('password_verify') }}" id="name">
                                                @if ($errors->has('password_verify'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('password_verify') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('users.index') }}" class="btn btn-default">{{ __('common.back') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('common.save') }}</button>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>

@endsection

