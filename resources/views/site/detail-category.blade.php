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
                                <a href="{{ route('site.detail', ['slugCate' => $category->slug]) }}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="col-md-8 products-right">
            <div class="products-right-grid">
                <div class="products-right-grids">
                    <div class="sorting">
                        <select id="country" onchange="change_country(this.value)" class="frm-field required sect">
                            <option value="null">Default sorting</option>
                            <option value="null">Sort by popularity</option>
                            <option value="null">Sort by average rating</option>
                            <option value="null">Sort by price</option>
                        </select>
                    </div>
                    <div class="sorting-left">
                        <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                            <option value="null">Item on page 9</option>
                            <option value="null">Item on page 18</option>
                            <option value="null">Item on page 32</option>
                            <option value="null">All</option>
                        </select>
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

