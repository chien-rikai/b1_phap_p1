@extends('layouts.master')

@section('title')
{{ __('common.title', [
    'model' => __('common.user'),
    'module' => __('common.store')
]) }}
@endsection

@section('boostrap')

@endsection

@section('content')

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('common.store') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('common.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('common.store') }}</li>
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
                            <h3 class="card-title">
                                {{ __('common.store').' '.__('common.user') }}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('table.name', ['model' => __('common.user')]) }} {!!'<span class="required-alert">*</span>'!!}</label>
                                                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                                            name="name" value="{{ old('name') }}" id="name">
                                                        @if ($errors->has('name'))
                                                            <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('table.email') }} {!!'<span class="required-alert">*</span>'!!}</label>
                                                        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}"
                                                            name="email" value="{{ old('email') }}" id="name">
                                                        @if ($errors->has('email'))
                                                            <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('common.password') }} {!!'<span class="required-alert">*</span>'!!}</label>
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
                                                        <label for="name">{{ __('common.place_password_confirm') }} {!!'<span class="required-alert">*</span>'!!}</label>
                                                        <input type="password" class="form-control {{ $errors->has('password_verify') ? 'is-invalid' : ''}}"
                                                            name="password_verify" value="{{ old('password_verify') }}" id="name">
                                                        @if ($errors->has('password_verify'))
                                                            <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('password_verify') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">{{ __('table.avatar') }}</label>
                                                <input type="file" class="form-control {{ $errors->has('url_image') ? 'is-invalid' : ''}}"
                                                    name="url_image" value="{{ old('url_image') }}" id="name" placeholder="">
                                                @if ($errors->has('url_image'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('url_image') }}</span>
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

@section('script')

@endsection
