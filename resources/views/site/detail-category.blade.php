@extends('site.layouts.master')

@section('title')
    SupperMarket | {{ __('common.category') }}
@endsection

@section('content')
{{ loadBreadCrumbs() }}

<div class="products">
    <div class="container">
        <div class="col-md-4 products-left">
            <div class="categories">
                <h2>{{ __('common.category') }}</h2>
                @if (!blank(getListCategories()))
                    <ul class="cate">
                        @foreach (getListCategories() as $category)
                            <li>
                                <a href="{{ route('site.collection', ['slug' => $category->slug]) }}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="col-md-8 products-right">
            <div class="products-right-grid">
                <div class="products-right-grids">
                    <div class="row">
                        <form action="{{ route('site.collection', ['slug' => $category->slug]) }}" method="GET">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">{{ __('common.order_by') }} :</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="order">
                                            <option value="">{{ __('common.default') }}</option>
                                        @foreach (config('global.search') as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('common.order') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="clearfix"> </div>
                </div>
            </div>

            @include('site.layouts.list-products', ['split' => 3])

            @if (!blank($products))
                {!! $products->appends(Request::all())->links('site.helpers.paginate') !!}    
            @endif
            
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
@endsection

