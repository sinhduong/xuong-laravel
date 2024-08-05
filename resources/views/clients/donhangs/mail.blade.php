@component('mail::message')
# Xác nhận đơn hàng

Xin chào {{ $donHang->ten_nguoi_nhan }},

Cảm ơn bạn đã đặt hàng từ cửa hàng của chúng tôi. Đây là thông tin đơn hàng của bạn:

**Mã đơn hàng:** {{ $donHang->ma_don_hang }}

**Sản phẩm đã đặt:**
@foreach ($donHang->chiTietDonHang as $item)
- {{ $item->sanPham->ten_san_pham }} x {{ $item->so_luong }} : {{ number_format($item->thanh_tien) }} vnđ
@endforeach

**Tổng tiền:** {{ number_format($donHang->tong_tien) }} đ

Chúng tôi sẽ liên hệ với bạn sớm nhất để xác nhận thông tin giao hàng.

Cảm ơn đã mua sắm tại cửa hàng chúng tôi!

Trân trọng,
@endcomponent
