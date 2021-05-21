@extends('layouts.master')

@section('title')
{{ __('common.title', [
    'model' => __('common.product'),
    'module' => __('common.update')
]) }}
@endsection

@section('content')

<div class="card">
    {{ loadContentHeader(['action' => __('common.update'), 'home' => __('common.home')]) }}

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ __('common.update').' '.__('common.product') }}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        @include('layouts.form.products.edit')
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

