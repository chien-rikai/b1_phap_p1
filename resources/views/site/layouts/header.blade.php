<div class="agileits_header">
    <div class="container">
        <div class="w3l_offers">
            {{-- <p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="products.html">SHOP NOW</a></p> --}}
        </div>
        <div class="agile-login">
            @if (Auth::guard('site')->check())
                <ul>
                    <li><a href="#">{{ Auth::guard('site')->user()->name }}</a></li>
                    <li><a href="{{ route('site.member.history', ['member' => Auth::guard('site')->user()->id]) }}">
                        <img src="https://i.imgur.com/C4egmYM.jpg" class="rounded-circle" width="30">
                        </a>
                    </li>
                </ul>
            @else
                <ul>
                    <li><a href="{{ route('site.register') }}">{{ __('common.register') }}</a></li>
                    <li><a href="{{ route('site.login') }}">{{ __('common.login') }}</a></li>
                </ul>
            @endif
        </div>
    </div>
</div>

<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>

            </ul>
        </div>
        <div class="w3ls_logo_products_left">
            <h1><a href="{{ route('site.home') }}">super Market</a></h1>
        </div>
        <div class="w3l_search">
            <form action="{{ route('site.search') }}" method="GET">
                <input type="search" name="name" placeholder="Search for a Product..." required="">
                <button type="submit" class="btn btn-default search" aria-label="Left Align">
                    <i class="fa fa-search" aria-hidden="true"> </i>
                </button>
                <div class="clearfix"></div>
            </form>
        </div>

        <div class="clearfix"> </div>
    </div>
</div>
