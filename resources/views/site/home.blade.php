@extends('site.layouts.master')

@section('title')
SupperMarket | {{ __('common.home') }}
@endsection

@section('content')
<div class="skdslider">
    <ul id="demo1" class="slides">
        <li style="position: absolute; inset: 0px; display: none;">
            <img src="{{ asset('site/images/11.jpg') }}" alt="">
            <!--Slider Description example-->
            <div class="slide-desc">
                <h3>Buy Rice Products Are Now On Line With Us</h3>
            </div>
        </li>
        <li style="position: absolute; inset: 0px; display: list-item;">
            <img src="{{ asset('site/images/22.jpg') }}" alt="">
            <div class="slide-desc">
                <h3>Whole Spices Products Are Now On Line With Us</h3>
            </div>
        </li>

        <li style="position: absolute; inset: 0px; display: none;">
            <img src="{{ asset('site/images/44.jpg') }}" alt="">
            <div class="slide-desc">
                <h3>Whole Spices Products Are Now On Line With Us</h3>
            </div>
        </li>
    </ul>
    <ul class="slide-navs" style="margin-left: -24px;">
        <li class="slide-nav-0"><a></a></li>
        <li class="slide-nav-1 current-slide"><a></a></li>
        <li class="slide-nav-2"><a></a></li>
    </ul><a class="prev"></a><a class="next"></a><a class="play-control pause" style="display: none;"></a>
</div>

<div class="top-brands">
    <div class="container">
        <h2>{{ __('common.new_product') }}</h2>
        <div class="grid_3 grid_5">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="expeditions"
                        aria-labelledby="expeditions-tab">

                        @include('site.layouts.list-products', ['split' => 2])
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item next left">
            <a href="beverages.html"> <img class="first-slide" src="{{ asset('site/images/b1.jpg') }}" alt="First slide"></a>

        </div>
        <div class="item">
            <a href="personalcare.html"> <img class="second-slide " src="{{ asset('site/images/b3.jpg') }}" alt="Second slide"></a>

        </div>
        <div class="item active left">
            <a href="household.html"><img class="third-slide " src="{{ asset('site/images/b1.jpg') }}" alt="Third slide"></a>

        </div>
    </div>

</div>

{{ loadSuggest(['title' => __('common.hot_product'), 'products' => $hotProducts]) }}

{{ loadSuggest(['title' => __('common.sale_product'), 'products' => $saleProducts]) }}

@endsection
