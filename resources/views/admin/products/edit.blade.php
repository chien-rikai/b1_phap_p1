@extends('layouts.master')

@section('title')
Quản lý sản phẩm | Cập nhật
@endsection

@section('boostrap')

@endsection

@section('content')

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Cập nhật</li>
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
                            <h3 class="card-title">Cập nhật sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    @csrf
                                    @method("PUT")

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Tên sản phẩm</label>
                                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                                    name="name" value="{{ old('name', $product->name) }}" id="name" placeholder="Tên sản phẩm">
                                                @if ($errors->has('name'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        @php
                                        $data = [
                                            'categories' => $categories,
                                            'col' => 6,
                                            'category_id' => $product->category_id,
                                        ];
                                    @endphp

                                    @include('admin.helpers.selected.categories', $data)
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Đơn giá</label>
                                                <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : ''}}"
                                                    name="price" value="{{ old('price', $product->price) }}" id="name">
                                                @if ($errors->has('price'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('price') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Giá khuyến mãi</label>
                                                <input type="text" class="form-control {{ $errors->has('price_promotion') ? 'is-invalid' : ''}}"
                                                    name="price_promotion" value="{{ old('price_promotion', $product->price_promotion) }}" id="name">
                                                @if ($errors->has('price_promotion'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('price_promotion') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Mô tả</label>
                                                <textarea type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}"
                                                    name="description"
                                                    id="description">{{ old('description', $product->description) }}
                                                </textarea>
                                                @if ($errors->has('description'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Số lượng kho</label>
                                                <input type="number" class="form-control {{ $errors->has('stock') ? 'is-invalid' : ''}}"
                                                    name="stock" value="{{ old('stock', $product->stock) }}" id="name" placeholder="">
                                                @if ($errors->has('stock'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('stock') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Hình ảnh</label>
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
                                <a href="{{ route('products.index') }}" class="btn btn-default">Quay về</a>
                                <button type="submit" class="btn btn-primary">Lưu</button>
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
