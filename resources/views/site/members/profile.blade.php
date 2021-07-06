@extends('site.members.layouts.master')

@section('content')
<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                       
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
                                    <h3 class="card-title">Cập nhật thông tin</h3>
                                </div>
                            </div>

                        </div>
                        <form action="{{ route('site.update.profile', $member->id) }}" method="POST">
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    @csrf
                                    @method("PUT")

                                    <input hidden name="id" value="{{ $member->id }}">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Tên thành viên {!!'<span class="required-alert">*</span>'!!}</label>
                                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                                    name="name" value="{{ old('name', $member->name) }}" id="name">
                                                @if ($errors->has('name'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Email {!!'<span class="required-alert">*</span>'!!}</label>
                                                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}"
                                                    name="email" value="{{ old('email', $member->email) }}" id="name">
                                                @if ($errors->has('email'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Địa chỉ {!!'<span class="required-alert">*</span>'!!}</label>
                                                <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}"
                                                    name="address" value="{{ old('address', $member->address) }}" id="address">
                                                @if ($errors->has('address'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('address') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Số điện thoại {!!'<span class="required-alert">*</span>'!!}</label>
                                                <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}"
                                                    name="phone" value="{{ old('phone', $member->phone) }}" id="name">
                                                @if ($errors->has('phone'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
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