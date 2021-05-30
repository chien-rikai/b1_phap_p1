@extends('layouts.master')

@section('title')
{{ __('common.title', [
    'model' => __('common.user'),
    'module' => __('common.index')
]) }}
@endsection

@section('content')

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('common.index') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('common.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('common.index') }}</li>
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
                                        {{ __('common.user') }}
                                    </h3>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <a href="{{ route('users.create') }}" class="btn btn-info float-right">
                                        {{ __('common.store') }}
                                    </a>
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
                                        <form method="GET" action="{{ route('users.index') }}">
                                            <div id="example1_filter" class="dataTables_filter">
                                                <label>{{ __('common.search') }} :
                                                    <input type="search" name="name" value="{{ old('name') }}" class="form-control form-control-sm" placeholder=""
                                                        aria-controls="example1">
                                                </label>
                                                <button type="submit" class="btn btn-sm btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
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
                                                        {{ __('table.name', ['model' => __('common.user')]) }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.avatar') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.email') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.status') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.role') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.action') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!blank($users))
                                                    @foreach ($users as $key => $user)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $user->name }}</td>
                                                            <td><img src="{{ ($user->url_image) ? asset('/storage/users/avatar/'.$user->url_image) : asset('admin/default-user.jpg') }}"
                                                                alt="" style="width: 100px" height="100px">
                                                            </td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ ($user->status == 1) ? __('common.active') : __('common.block') }}</td>
                                                            <td>{{ $user->role }}</td>

                                                            <td>
                                                                <a href="{{route('users.edit',$user->id)}}"
                                                                    class="btn btn-success btn-sm float-left mr-1">
                                                                    {{ __('common.update') }}
                                                                </a>

                                                                <a href="{{route('user.view.change.pass',$user->id)}}"
                                                                    class="btn btn-info btn-sm float-left mr-1">
                                                                    {{ __('common.change_password') }}
                                                                </a>

                                                                @if ($user->role !== 'admin')
                                                                    <form action="{{route('users.destroy',$user->id)}}"
                                                                        class="pull-left float-left"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm btn-danger btn-icon btn-delete">
                                                                            {{ __('common.destroy') }}
                                                                        </button>
                                                                    </form>
                                                                @endif
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
                                            aria-live="polite">{{ __('pagination.total', ['total' => $users->total()]) }}</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                            {!! $users->appends(Request::all())->links('admin.helpers.paginate') !!}
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

