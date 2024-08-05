@extends('layouts.admin')

@section('title')
{{ $title }}
@endsection

@section('css')
@endsection

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quản lý đơn hàng</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th colspan="2">Thông tin tài khoản đặt hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tên tài khoản</td>
                                            <td><strong>{{ $donHang->user->name }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><strong>{{ $donHang->user->email }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại</td>
                                            <td><strong>{{ $donHang->user->phone }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tài khoản</td>
                                            <td><strong>{{ $donHang->user->role }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th colspan="2">Thông tin người nhận hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tên người nhận</td>
                                            <td><strong>{{ $donHang->ten_nguoi_nhan }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Email người nhận</td>
                                            <td><strong>{{ $donHang->email_nguoi_nhan }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại người nhận</td>
                                            <td><strong>{{ $donHang->so_dien_thoai_nguoi_nhan }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ người nhận</td>
                                            <td><strong>{{ $donHang->dia_chi_nguoi_nhan }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Ngày đặt hàng</td>
                                            <td><strong>{{ $donHang->created_at->format('d-m-Y') }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Ghi chú nhận hàng</td>
                                            <td><strong>{{ $donHang->ghi_chu }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Trạng thái đơn hàng</td>
                                            <td><strong>{{ $trangThaiDonHang[$donHang->trang_thai_don_hang] }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Trạng thái thanh toán</td>
                                            <td><strong>{{ $trangThaiThanhToan[$donHang->trang_thai_thanh_toan] }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tổng tiền hàng</td>
                                            <td><strong>{{ number_format($donHang->tien_hang, 0, '', '.') }}đ</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tổng tiền ship</td>
                                            <td><strong>{{ number_format($donHang->tien_ship, 0, '', '.') }}đ</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tổng tiền đơn hàng</td>
                                            <td><strong>{{ number_format($donHang->tong_tien, 0, '', '.') }}đ</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Sản phẩm của đơn hàng</h5>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Hình ảnh</th>
                                                    <th>Mã sản phẩm</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Đơn giá</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($donHang->chiTietDonHang as $item)
                                                    @php
                                                        $sanPham = $item->sanPham;
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <img width="75px" class="img-fluid" src="{{ Storage::url($sanPham->hinh_anh) }}" alt="Sản phẩm">
                                                        </td>
                                                        <td>{{ $sanPham->ma_san_pham }}</td>
                                                        <td>{{ $sanPham->ten_san_pham }}</td>
                                                        <td>{{ number_format($item->don_gia, 0, '', '.') }}đ</td>
                                                        <td>{{ $item->so_luong }}</td>
                                                        <td>{{ number_format($item->thanh_tien, 0, '', '.') }}đ</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection

@section('js')
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
