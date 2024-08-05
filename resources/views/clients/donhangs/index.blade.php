
@extends('layouts.client')

@section('css')

@endsection

@section('content')
                <!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Order</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- cart main wrapper start -->
<div class="cart-main-wrapper section-padding">
    <div class="container">
        <div class="section-bg-color">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

            <div class="row">
                <div class="col-lg-12">

                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Mã đơn hàng</th>
                                        <th class="pro-title">Ngày đặt</th>
                                        <th class="pro-price">Trạng thái</th>
                                        <th class="pro-quantity">Tổng tiền</th>
                                        <th class="pro-subtotal">Hàn động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donHangs as $item)
                                    <tr>
                                        <td class="pro-thumbnail">
                                            <a href="{{ route('donhangs.show',$item->id) }}">
                                           <b> {{ $item->ma_don_hang }}</b></a>
                                         </td>
                                        <td class="pro-title">
                                            <a>{{ $item->created_at->format('d-m-Y') }}</a>
                                        </td>
                                        <td class="pro-price">
                                            {{ $trangThaiDonHang[$item->trang_thai_don_hang] }}
                                        </td>
                                        <td class="pro-quantity">
                                            <a>{{ number_format($item->tong_tien, 0, '', '.') }}đ</a>
                                        </td>
                                        <td class="pro-subtotal">
                                            <a href="{{ route('donhangs.show',$item->id) }}" class=" btn btn-sqr">
                                                view
                                            </a>
                                            <form action="{{ route('donhangs.update',$item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                @if ($item->trang_thai_don_hang === $type_cho_xac_nhan)
                                                    <input type="hidden" name="huy_don_hang" value="1">
                                                    <button type="submit" class="btn btn-sqr bg-danger" onclick="return confirm('Bạn có xác nhận hủy đơn hàng không')">Hủy</button>
                                                @elseif ($item->trang_thai_don_hang === $type_dang_van_chuyen)
                                                    <input type="hidden" name="da_giao_hang" value="1">
                                                    <button type="submit" class="btn btn-sqr bg-success" onclick="return confirm('Xác nhận đã nhận hàng')">Đã nhận hàng</button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->
                        <div class="cart-update-option d-block d-md-flex justify-content-end">
                        {{-- <div class="apply-coupon-wrapper">
                            <form action="#" method="post" class=" d-block d-md-flex">
                                <input type="text" placeholder="Enter Your Coupon Code" required />
                                <button class="btn btn-sqr">Apply Coupon</button>
                            </form>
                        </div> --}}
                        {{-- <div class="cart-update">
                            <button type="submit" class="btn btn-sqr">Update Cart</button>
                        </div> --}}
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- cart main wrapper end -->
@endsection

@section('js')

@endsection
