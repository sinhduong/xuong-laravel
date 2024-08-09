
@extends('layouts.client')

@section('css')

@endsection

@section('slide')
<section class="slider-area">
    <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
        <!-- single slider item start -->
        <div class="hero-single-slide hero-overlay">
            <div class="hero-slider-item bg-img" data-bg="{{ asset('assets/client/assets/img/slider/home01-slide.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero-slider-content slide-1">
                                <h2 class="slide-title">Family Jewelry <span>Collection</span></h2>
                                <h4 class="slide-desc">Designer Jewelry Necklaces-Bracelets-Earings</h4>
                                <a href="shop.html" class="btn btn-hero">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single slider item start -->

        <!-- single slider item start -->
        <div class="hero-single-slide hero-overlay">
            <div class="hero-slider-item bg-img" data-bg="{{ asset('assets/client/assets/img/slider/home02-slide.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero-slider-content slide-2 float-md-end float-none">
                                <h2 class="slide-title">Diamonds Jewelry<span>Collection</span></h2>
                                <h4 class="slide-desc">Shukra Yogam & Silver Power Silver Saving Schemes.</h4>
                                <a href="shop.html" class="btn btn-hero">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single slider item start -->

        <!-- single slider item start -->
        <div class="hero-single-slide hero-overlay">
            <div class="hero-slider-item bg-img" data-bg="{{ asset('assets/client/assets/img/slider/home1-slide1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero-slider-content slide-3">
                                <h2 class="slide-title">Grace Designer<span>Jewelry</span></h2>
                                <h4 class="slide-desc">Rings, Occasion Pieces, Pandora & More.</h4>
                                <a href="shop.html" class="btn btn-hero">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single slider item end -->
    </div>
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
    <section class="product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm của chúng tôi</h2>

                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">

                        <!-- product tab content start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">


                                    <!-- product item start -->
                                    @foreach ($listSanPham as $item)
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="{{ route('products.detail', $item->id) }}">
                                                <img class="pri-img" src="{{ Storage::url($item->hinh_anh)}}" alt="product">
                                                <img class="sec-img" src="{{ Storage::url($item->hinh_anh)}}" alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                           <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div>
                                           </form>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name">{{ $item->danhMuc->ten_danh_muc }}</a></p>
                                            </div>
                                            <h6 class="product-name">
                                                {{ $item->ten_san_pham }}</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">{{ number_format($item->gia_khuyen_mai,0,'','.') }}đ</span>
                                                <span class="price-old"><del>{{ number_format($item->gia_san_pham,0,'','.') }}đ</del></span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- product item end -->



                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    @foreach ($listSanPham as $item)
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="{{ route('products.detail', $item->id) }}">
                                                <img class="pri-img" src="{{ Storage::url($item->hinh_anh)}}" alt="product">
                                                <img class="sec-img" src="{{ Storage::url($item->hinh_anh)}}" alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                           <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div>
                                           </form>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a href="product-details.html">{{ $item->danhMuc->ten_danh_muc }}</a></p>
                                            </div>
                                            <h6 class="product-name">
                                                <a href="product-details.html">{{ $item->ten_san_pham }}</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">{{ number_format($item->gia_khuyen_mai,0,'','.') }}đ</span>
                                                <span class="price-old"><del>{{ number_format($item->gia_san_pham,0,'','.') }}đ</del></span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab3">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    @foreach ($listSanPham as $item)
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="pri-img" src="{{ Storage::url($item->hinh_anh)}}" alt="product">
                                                <img class="sec-img" src="{{ Storage::url($item->hinh_anh)}}" alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                           <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div>
                                           </form>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a href="product-details.html">{{ $item->danhMuc->ten_danh_muc }}</a></p>
                                            </div>
                                            <h6 class="product-name">
                                                <a href="product-details.html">{{ $item->ten_san_pham }}</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">{{ number_format($item->gia_khuyen_mai,0,'','.') }}đ</span>
                                                <span class="price-old"><del>{{ number_format($item->gia_san_pham,0,'','.') }}đ</del></span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab4">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    @foreach ($listSanPham as $item)
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="{{ route('products.detail', $item->id) }}">
                                                <img class="pri-img" src="{{ Storage::url($item->hinh_anh)}}" alt="product">
                                                <img class="sec-img" src="{{ Storage::url($item->hinh_anh)}}" alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                           <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div>
                                           </form>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a href="product-details.html">{{ $item->danhMuc->ten_danh_muc }}</a></p>
                                            </div>
                                            <h6 class="product-name">
                                                <a href="product-details.html">{{ $item->ten_san_pham }}</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">{{ number_format($item->gia_khuyen_mai,0,'','.') }}đ</span>
                                                <span class="price-old"><del>{{ number_format($item->gia_san_pham,0,'','.') }}đ</del></span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- product tab content end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<section class="feature-product section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">Sản phẩm nổi bật</h2>

                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                    @foreach ($listSanPham as $item)
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="pri-img" src="{{ Storage::url($item->hinh_anh)}}" alt="product">
                                                <img class="sec-img" src="{{ Storage::url($item->hinh_anh)}}" alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                           <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div>
                                           </form>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a href="product-details.html">{{ $item->danhMuc->ten_danh_muc }}</a></p>
                                            </div>
                                            <h6 class="product-name">
                                                <a href="product-details.html">{{ $item->ten_san_pham }}</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">{{ number_format($item->gia_khuyen_mai,0,'','.') }}đ</span>
                                                <span class="price-old"><del>{{ number_format($item->gia_san_pham,0,'','.') }}đ</del></span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

@endsection
