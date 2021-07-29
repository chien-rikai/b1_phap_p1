@extends('layouts.master')

@section('title')
{{ __('common.title', [
    'model' => __('common.order'),
    'module' => __('common.index')
]) }}
@endsection

@section('boostrap')

@endsection

@section('content')

<div class="card">
    {{ loadContentHeader(['action' => __('common.index'), 'home' => __('common.home')]) }}

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
                                        {{ __('common.search') }}
                                    </h3>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('layouts.form.orders.search')
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <h3 class="card-title"> 
                                        {{ __('common.orders') }}
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
                                                        #
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.name_customer') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.email') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.phone') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.address') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.more_info') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.status') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.action') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!blank($orders))
                                                    @foreach ($orders as $key => $order)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $order->name }}</td>
                                                            <td>{{ $order->email }}</td>
                                                            <td>{{ $order->phone }}</td>
                                                            <td>{{ $order->address }}</td>
                                                            <td>
                                                                <b>- {{ __('common.date_order') }} :</b> {{ fortmatDateFrontend($order->created_at) }} <br>
                                                                <b>- {{ __('common.date_order_end') }} :</b> {{ fortmatDateFrontend($order->date_order_end) }} <br>
                                                                <b>- {{ __('common.date_take_money') }} :</b> {{ fortmatDateFrontend($order->date_take_money) }} <br>
                                                            </td>               
                                                            <td>
                                                                {{ __('common.'.config('global.status_order.'.$order->status)) }}
                                                            </td>
                                                            <td>
                                                                <a href="{{route('orders.show', $order->id)}}"
                                                                    class="btn btn-info btn-sm float-left mr-1">
                                                                    {{ __('common.detail_order') }}
                                                                </a>

                                                                @if ($order->status == 0)
                                                                    <form action="{{route('orders.destroy',$order->id)}}"
                                                                        class="pull-left float-left"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm btn-danger btn-icon btn-delete">
                                                                            {{ __('common.order_delete') }}
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="9">{{ __('table.no_data') }}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example1_info" role="status"
                                            aria-live="polite">{{ __('pagination.total', ['total' => $orders->total()]) }}</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                            {!! $orders->appends(Request::all())->links('admin.helpers.paginate') !!}
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
