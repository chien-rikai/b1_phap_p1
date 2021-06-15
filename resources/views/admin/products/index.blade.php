@extends('layouts.master')

@section('title')
{{ __('common.title', [
    'model' => __('common.product'),
    'module' => __('common.index')
]) }}
@endsection

@section('content')

<div class="card">
    {{ loadContentHeader(['action' => __('common.index'), 'home' => __('common.home')]) }}

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-sm-12 col-md-6">
                                <h3 class="card-title">
                                    {{ __('common.search') }}
                                </h3>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">      
                                @include('layouts.form.products.search')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <h3 class="card-title">
                                        {{ __('common.product') }}
                                    </h3>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <a href="{{ route('products.create') }}" class="btn btn-info float-right">
                                        {{ __('common.store') }}
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                @include('layouts.table.products')
                            </div>
                        </div>
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

