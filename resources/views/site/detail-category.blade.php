@extends('site.layouts.master')

@section('title')
    SupperMarket | Danh mục sản phẩm
@endsection

@section('boostrap')

@endsection

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
            <li class="active"></li>
        </ol>
    </div>
</div>

<div class="products">
    <div class="container">
        <div class="col-md-4 products-left">
            <div class="categories">
                <h2>Danh mục</h2>
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

            @if (!blank($products))
                @for ($i = 0; $i < count($products->split(3)); $i++)
                    <div class="agile_top_brands_grids">
                        @foreach ($products->split(3)[$i] as $key => $product)
                            <div class="col-md-4 top_brand_left">
                                <div class="hover14 column">
                                    <div class="agile_top_brand_left_grid">
                                        <div class="agile_top_brand_left_grid_pos">
                                            @if ($product->price_promotion === 0)
                                                <img src="{{ asset('site/images/offer.png') }}" alt=" " class="img-responsive">
                                            @endif

                                        </div>
                                        <div class="agile_top_brand_left_grid1">
                                            <figure>
                                                <div class="snipcart-item block">
                                                    <div class="snipcart-thumb">
                                                        <a href="{{ route('site.detail', ['slugCate' => $product->category->slug, 'slug' => $product->slug]) }}">
                                                            <img title="" alt="" src="{{ asset('/storage/projects/display/'.$product->url_image) }}">
                                                        </a>
                                                        <p>{{ $product->name }}</p>
                                                        {!! ($product->price_promotion === 0) ? '<h4>'.formatCurrencyFrontEnd($product->price_promotion).' vnđ<span>'.formatCurrencyFrontEnd($product->price).' vnđ</span></h4>' : '<h4>'.formatCurrencyFrontEnd($product->price).' vnđ</h4>' !!}

                                                    </div>
                                                    <div class="snipcart-details top_brand_home_details">
                                                        <form action="#" method="post" class="add-to-cart">
                                                            <input type="hidden" name="slug" value="{{ $product->slug }}">
                                                            <input type="hidden" name="amount" value="1">
                                                            <input type="hidden" name="url_image" value="{{ $product->url_image }}">
                                                            <input type="hidden" name="name" value="{{ $product->name }}">
                                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                                            <input type="hidden" name="price_promotion" value="{{ $product->price_promotion }}">
                                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                                            <input type="submit" name="submit" value="Add to cart" class="button">
                                                        </form>
                                                    </div>
                                                </div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="clearfix"></div>

                    </div>
                @endfor

                {!! $products->appends(Request::all())->links('site.helpers.paginate') !!}
            @endif

        </div>
        <div class="clearfix"> </div>
    </div>
</div>
@endsection

@section('script')
    @include('site.scripts.functions')
@endsection
