@extends('site.layouts.master')

@section('title')
    SupperMarket | {{ __('common.detail_product') }}
@endsection

@section('content')
{{ loadBreadCrumbs() }}

<div class="products">
    <div class="container">
        <div class="agileinfo_single">

            <div class="col-md-4 agileinfo_single_left">
                <div class="agile_top_brand_left_grid_pos">
                    @if ($product->price_promotion === 0)
                        <img src="{{ asset('site/images/offer.png') }}" alt=" " class="img-responsive">
                    @endif
                </div>

                <img title="" alt="" src="{{ asset('/storage/projects/detail/'.$product->url_image) }}" class="img-responsive">
            </div>
            <div class="col-md-8 agileinfo_single_right">
            <h2>{{ $product->name}}</h2>
                <div class="rating1">
                    <span class="starRating">
                        @for ($i = 5; $i > 0; $i--)
                            <input id="rating{{ $i }}" class="rating" type="radio" name="rating" value="{{ $i }}"
                                {{ ($product->star_rating === $i) ? 'checked' : '' }}>
                            <label for="rating{{ $i }}">{{ $i }}</label>
                        @endfor
                    </span>
                    <input hidden id="product-rating" data-score="{{ $product->score_rating }}" data-count="{{ $product->count_rating }}">
                </div>
                <p>{{ __('common.view') }}: <span> {{ $product->view }} </span></p>
                <div class="row">
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="YyoTWS7C"></script>

                    <div class="fb-share-button" data-href="{{ route('site.detail', ['slugCate' => $product->category->slug, 'slug' => $product->slug]) }}" data-layout="button_count" data-size="small">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a>
                    </div>
                </div>
                <div class="w3agile_description">
                    <h4>{{ __('common.description') }} :</h4>
                    {!! $product->description !!}
                </div>
                <div class="snipcart-item block">
                    <div class="snipcart-thumb agileinfo_single_right_snipcart">

                        {!! ($product->price_promotion === 0) ? '<h4 class=m-sing>'.formatCurrencyFrontEnd($product->price_promotion).' vnđ<span>'.formatCurrencyFrontEnd($product->price).' vnđ</span></h4>' : '<h4 class=m-sing>'.formatCurrencyFrontEnd($product->price).' vnđ</h4>' !!}

                    </div>
                    <div class="snipcart-details agileinfo_single_right_details">
                        {{ loadFormForCart($product) }}
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

{{-- Bình luận tại đây --}}
<div class="row">
    <div class="col-lg-12">
        <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="xARyGh6A"></script>
        <div class="fb-comments" data-href="{{ route('site.detail', ['slugCate' => $product->category->slug, 'slug' => $product->slug]) }}" data-width="100%" data-numposts="5">
        </div>
    </div>
</div>

{{ loadSuggest(['title' => __('common.related_products'), 'products' => $products]) }}
@endsection

