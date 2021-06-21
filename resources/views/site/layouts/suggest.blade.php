<div class="newproducts-w3agile">
    <div class="container">
        <h3>{{ $title }}</h3>
        <div class="agile_top_brands_grids">
            @foreach ($products as $product)
            <div class="col-md-3 top_brand_left-1">
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
                                        <div class="stars">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fa fa-star {{ ($product->star_rating >= $i) ? 'blue-star' : 'gray-star' }}" aria-hidden="true"></i>
                                            @endfor
                                        </div>

                                        {!! ($product->price_promotion === 0) ? '<h4>'.formatCurrencyFrontEnd($product->price_promotion).' vnđ<span>'.formatCurrencyFrontEnd($product->price).' vnđ</span></h4>' : '<h4>'.formatCurrencyFrontEnd($product->price).' vnđ</h4>' !!}

                                    </div>
                                    <div class="snipcart-details top_brand_home_details">
                                        {{ loadFormForCart($product) }}
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="clearfix"> </div>
        </div>
    </div>
</div>