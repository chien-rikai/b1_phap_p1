@extends('layouts.master')

@section('title')
{{ __('common.title', [
    'model' => __('common.product'),
    'module' => __('common.store')
]) }}
@endsection

@section('content')

<div class="card">
    {{ loadContentHeader(['action' => __('common.store'), 'home' => __('common.home')]) }}

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ __('common.store').' '.__('common.product') }}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        @include('layouts.form.products.create')
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

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">

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
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Upload {{ __('common.index').' '.__('common.product') }}</h3>
                                </div>

                                <div class="col-sm-6">
                                    <div class="btn-group float-right">
                                        <button type="button" class="btn btn-success">Tải biểu mẫu</button>
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" style="">
                                          <a class="dropdown-item" href="{{ route('export.excel.product') }}">Excel</a>
                                          <a class="dropdown-item" href="{{ route('export.csv.product') }}">CSV</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        @include('layouts.form.products.import')
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
