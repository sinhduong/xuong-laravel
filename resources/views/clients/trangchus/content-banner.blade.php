
@extends('layouts.client')

@section('css')

@endsection

@section('slide-content')
<div class="twitter-feed">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="twitter-feed-content text-center">
                    <p>Check out "Corano - Multipurpose eCommerce Bootstrap 5 template" on #Envato by @<a
                            href="#">Corano</a> #Themeforest <a
                            href="http://1.envato.market/9LbxW">http://1.envato.market/9LbxW</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- twitter feed area end -->

<!-- service policy area start -->
<div class="service-policy section-padding">
    <div class="container">
        <div class="row mtn-30">
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-plane"></i>
                    </div>
                    <div class="policy-content">
                        <h6>Free Shipping</h6>
                        <p>Free shipping all order</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-help2"></i>
                    </div>
                    <div class="policy-content">
                        <h6>Support 24/7</h6>
                        <p>Support 24 hours a day</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-back"></i>
                    </div>
                    <div class="policy-content">
                        <h6>Money Return</h6>
                        <p>30 days for free return</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-credit"></i>
                    </div>
                    <div class="policy-content">
                        <h6>100% Payment Secure</h6>
                        <p>We ensure secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service policy area end -->

<!-- banner statistics area start -->
<div class="banner-statistics-area">
    <div class="container">
        <div class="row row-20 mtn-20">
            <div class="col-sm-6">
                <figure class="banner-statistics mt-20">
                    <a href="#">
                        <img src="{{ asset('assets/client/assets/img/banner/img1-top.jpg') }}" alt="product banner">
                    </a>
                    <div class="banner-content text-right">
                        <h5 class="banner-text1">BEAUTIFUL</h5>
                        <h2 class="banner-text2">Wedding<span>Rings</span></h2>
                        <a href="shop.html" class="btn btn-text">Shop Now</a>
                    </div>
                </figure>
            </div>
            <div class="col-sm-6">
                <figure class="banner-statistics mt-20">
                    <a href="#">
                        <img src="{{ asset('assets/client/assets/img/banner/img2-top.jpg') }}" alt="product banner">
                    </a>
                    <div class="banner-content text-center">
                        <h5 class="banner-text1">EARRINGS</h5>
                        <h2 class="banner-text2">Tangerine Floral <span>Earring</span></h2>
                        <a href="shop.html" class="btn btn-text">Shop Now</a>
                    </div>
                </figure>
            </div>
            <div class="col-sm-6">
                <figure class="banner-statistics mt-20">
                    <a href="#">
                        <img src="{{ asset('assets/client/assets/img/banner/img3-top.jpg') }}" alt="product banner">
                    </a>
                    <div class="banner-content text-center">
                        <h5 class="banner-text1">NEW ARRIVALLS</h5>
                        <h2 class="banner-text2">Pearl<span>Necklaces</span></h2>
                        <a href="shop.html" class="btn btn-text">Shop Now</a>
                    </div>
                </figure>
            </div>
            <div class="col-sm-6">
                <figure class="banner-statistics mt-20">
                    <a href="#">
                        <img src="{{ asset('assets/client/assets/img/banner/img4-top.jpg') }}" alt="product banner">
                    </a>
                    <div class="banner-content text-right">
                        <h5 class="banner-text1">NEW DESIGN</h5>
                        <h2 class="banner-text2">Diamond<span>Jewelry</span></h2>
                        <a href="shop.html" class="btn btn-text">Shop Now</a>
                    </div>
                </figure>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection
