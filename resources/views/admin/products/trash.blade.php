@extends('layouts.master')

@section('title')
    {{ __('common.title', [
        'model' => __('common.product'),
        'module' => __('common.trash')
    ]) }}
@endsection

@section('content')

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('common.trash') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('common.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('common.trash') }}</li>
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
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <h3 class="card-title">
                                        {{ __('common.category') }}
                                    </h3>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">

                                    </div>
                                  
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1"
                                            class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                            aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">
                                                        #</th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.name', ['model' => __('common.product')]) }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.avatar') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('common.category') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.more_info') }}
                                                    </th>
                                                   
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.action') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!blank($products))
                                                    @foreach ($products as $key => $product)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $product->name }}</td>
                                                            <td><img src="{{ ($product->url_image) ? asset('/storage/projects/avatar/'.$product->url_image) : asset('admin/default-product.jpg') }}"
                                                                alt="" class="avatar">
                                                            </td>
                                                            <td>{{ $product->category->name ?? ''}}</td>
                                                            <td>
                                                                <b>- {{ __('common.price') }} :</b> {{ formatCurrencyFrontEnd($product->price).' vnđ' }}<br>
                                                                <b>- {{ __('common.price_promotion') }} :</b> {{ formatCurrencyFrontEnd($product->price_promotion).' vnđ' }}<br>
                                                                <b>- {{ __('common.view') }} :</b> {{ $product->view }} <i class="far fa-eye"></i><br>
                                                                <b>- {{ __('common.star_rating') }} :</b> {{ $product->star_rating }} <i class="fas fa-star"></i><br>
                                                            </td>
                                                           
                                                            <td>
                                                                <form action="{{route('products.restore', $product->id)}}"
                                                                    class="pull-left float-left"
                                                                    method="GET">

                                                                    <button type="submit" class="btn btn-sm btn-info btn-icon btn-restore">
                                                                        {{ __('common.restore') }}
                                                                    </button>
                                                                </form>

                                                                <form action="{{route('products.force.destroy', $product->id)}}"
                                                                    class="pull-left float-left"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit" class="btn btn-sm btn-danger btn-icon btn-force-delete ml-1">
                                                                        {{ __('common.destroy') }}
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="3">{{ __('table.no_data') }}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example1_info" role="status"
                                            aria-live="polite">{{ __('pagination.total', ['total' => $products->total()]) }}</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                            {!! $products->appends(Request::all())->links('admin.helpers.paginate') !!}
                                        </div>
                                    </div>
                                </div>
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
