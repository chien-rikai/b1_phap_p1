@extends('site.layouts.master')

@section('title')
    SupperMarket | Chi tiết sản phẩm
@endsection

@section('boostrap')

@endsection

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Singlepage</li>
        </ol>
    </div>
</div>

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
                <p>Lượt xem: <span> {{ $product->view }} </span></p>
                <div class="row">
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="YyoTWS7C"></script>

                    <div class="fb-share-button" data-href="{{ route('site.detail', ['slugCate' => $product->category->slug, 'slug' => $product->slug]) }}" data-layout="button_count" data-size="small">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a>
                    </div>
                </div>
                <div class="w3agile_description">
                    <h4>Description :</h4>
                    {!! $product->description !!}
                </div>
                <div class="snipcart-item block">
                    <div class="snipcart-thumb agileinfo_single_right_snipcart">

                        {!! ($product->price_promotion === 0) ? '<h4 class=m-sing>'.formatCurrencyFrontEnd($product->price_promotion).' vnđ<span>'.formatCurrencyFrontEnd($product->price).' vnđ</span></h4>' : '<h4 class=m-sing>'.formatCurrencyFrontEnd($product->price).' vnđ</h4>' !!}

                    </div>
                    <div class="snipcart-details agileinfo_single_right_details">
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

<div class="newproducts-w3agile">
    <div class="container">
        <h3>SẢN PHẨM LIÊN QUAN</h3>
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

                <div class="clearfix"> </div>
            </div>
    </div>
</div>
@endsection

@section('script')
    @include('site.scripts.functions')
    <script>
        $(".rating").on('change', function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type: 'POST',
                data: {
                    id: "{{ $product->id }}",
                    count_rating: $("#product-rating").data("count_rating"),
                    score_rating: $("#product-rating").data("score_rating"),
                    star: $(this).val(),
                },
                dataType: 'json',
                cache: false,
                url: "{{ route('rating') }}",

                success: function (res) {
                    if (res > 0) {
                        alert("Cảm ơn bạn đã đánh giá sản phẩm !");
                    }
                },

                error: function (error) {
                    alert("Có lỗi xảy ra");
                }
            });
        });

    </script>
@endsection
