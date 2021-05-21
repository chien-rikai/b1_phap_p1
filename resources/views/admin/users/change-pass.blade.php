@extends('layouts.master')

@section('title')
<<<<<<< HEAD
{{ __('common.title', [
    'model' => __('common.user'),
    'module' => __('common.change_password')
]) }}
=======
    Quản lý quản trị viên | Đổi mật khẩu
>>>>>>> b9956af (build_users_admin_module)
@endsection

@section('boostrap')

@endsection

@section('content')

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
<<<<<<< HEAD
                    <h1>{{ __('common.change_password') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('common.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('common.change_password') }}</li>
=======
                    <h1>Đổi mật khẩu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đổi mật khẩu</li>
>>>>>>> b9956af (build_users_admin_module)
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
<<<<<<< HEAD
                            <h3 class="card-title"></h3>
=======
                            <h3 class="card-title">Đổi mật khẩu quản trị viên</h3>
>>>>>>> b9956af (build_users_admin_module)
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
<<<<<<< HEAD
                                                <label for="name">{{ __('common.password_new') }} {!!'<span class="required-alert">*</span>'!!}</label>
                                                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}"
                                                    name="password" value="{{ old('password') }}" id="name">
                                                @if ($errors->has('password'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('password') }}</span>
=======
                                                <label for="name">Mật khẩu cũ {!!'<span class="required-alert">*</span>'!!}</label>
                                                <input type="password" class="form-control {{ $errors->has('password_old') ? 'is-invalid' : ''}}"
                                                    name="password_old" value="{{ old('password_old') }}" id="name">
                                                @if ($errors->has('password_old'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('password_old') }}</span>
>>>>>>> b9956af (build_users_admin_module)
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
<<<<<<< HEAD
                                                <label for="name">{{ __('common.password_verify') }} {!!'<span class="required-alert">*</span>'!!}</label>
=======
                                                <label for="name">Mật khẩu mới {!!'<span class="required-alert">*</span>'!!}</label>
                                                <input type="password" class="form-control {{ $errors->has('password_new') ? 'is-invalid' : ''}}"
                                                    name="password_new" value="{{ old('password_new') }}" id="name">
                                                @if ($errors->has('password_new'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('password_new') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Xác nhận mật khẩu mới {!!'<span class="required-alert">*</span>'!!}</label>
>>>>>>> b9956af (build_users_admin_module)
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
<<<<<<< HEAD
                                <a href="{{ route('users.index') }}" class="btn btn-default">{{ __('common.back') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('common.save') }}</button>
=======
                                <a href="{{ route('users.index') }}" class="btn btn-default">Quay về</a>
                                <button type="submit" class="btn btn-primary">Lưu</button>
>>>>>>> b9956af (build_users_admin_module)
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
