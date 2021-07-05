@extends('layouts.master')

@section('title')
{{ __('common.title', [
    'model' => __('common.user'),
    'module' => __('common.update')
]) }}
@endsection

@section('content')

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('common.update') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('common.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('common.update') }}</li>
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
                                {{ __('common.update').' '.__('common.user') }}
                            </h3>
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
                                                <label for="name">{{ __('table.name', ['model' => __('common.user')]) }} {!!'<span class="required-alert">*</span>'!!}</label>
                                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                                    name="name" value="{{ old('name', $user->name) }}" id="name">
                                                @if ($errors->has('name'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                                @endif
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

                                    <div class="row">
                                        {{ loadStatusUserSelected([
                                            'col' => 6,
                                            'title' => __('common.status'),
                                            'name' => 'status'
                                        ]) }}
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

