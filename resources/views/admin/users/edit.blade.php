@extends('layouts.master')

@section('title')
<<<<<<< HEAD
{{ __('common.title', [
    'model' => __('common.user'),
    'module' => __('common.update')
]) }}
=======
    Quản lý quản trị viên | Cập nhật
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
                    <h1>{{ __('common.update') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('common.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('common.update') }}</li>
=======
                    <h1>Cập nhật</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Cập nhật</li>
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
                            <h3 class="card-title">
                                {{ __('common.update').' '.__('common.user') }}
                            </h3>
=======
                            <h3 class="card-title">Cập nhật quản trị viên</h3>
>>>>>>> b9956af (build_users_admin_module)
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    @csrf
                                    @method("PUT")

                                    <input hidden name="id" value="{{ $user->id }}">
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group">
<<<<<<< HEAD
                                                <label for="name">{{ __('table.name', ['model' => __('common.user')]) }} {!!'<span class="required-alert">*</span>'!!}</label>
=======
                                                <label for="name">Tên quản trị {!!'<span class="required-alert">*</span>'!!}</label>
>>>>>>> b9956af (build_users_admin_module)
                                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                                    name="name" value="{{ old('name', $user->name) }}" id="name" placeholder="Tên danh mục">
                                                @if ($errors->has('name'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div class="form-group">
<<<<<<< HEAD
                                                <label for="name">{{ __('table.avatar') }}</label>
=======
                                                <label for="name">Hình ảnh</label>
>>>>>>> b9956af (build_users_admin_module)
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
