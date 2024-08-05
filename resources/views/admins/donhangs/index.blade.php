@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('css')
@endsection

@section('content')
<div class="content">
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quản lý đơn hàng</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title align-content-center mb-0">{{ $title }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
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
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Ngày đặt</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listDonHang as $item)
                                    <tr>
                                        <td class="pro-thumbnail">
                                            <a href="{{ route('admins.donhangs.show',$item->id) }}">
                                           <b> {{ $item->ma_don_hang }}</b></a>
                                         </td>
                                        <td class="pro-title">
                                            <a>{{ $item->created_at->format('d-m-Y') }}</a>
                                        </td>
                                        <td class="pro-quantity">
                                            <a>{{ number_format($item->tong_tien, 0, '', '.') }}đ</a>
                                        </td>
                                        <td class="pro-price">
                                            <form action="{{ route('admins.donhangs.update',$item->id) }}" method="POST" >
                                                @csrf
                                                @method('PUT')
                                                <select name="trang_thai_don_hang" class="form-select w-50" id=""
                                                 onchange="confirmSubmit(this)" data-default-value="{{ $item->trang_thai_don_hang }}">

                                                    @foreach ($trangThaiDonHang as $key=>$value)
                                                            <option value="{{ $key }}"
                                                            {{ $key== $item->trang_thai_don_hang ? 'selected' : ''}}
                                                            {{ $key== $type_huy_don_hang ? 'disabled' : ''}}>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </form>

                                        </td>
                                        <td class="pro-subtotal">
                                            <a href="{{ route('admins.donhangs.show', $item->id) }}">
                                                <i class="mdi mdi-eye text-muted fs-18 rounded-2 border p-1 me-1"></i>
                                            </a>
                                            @if ($item->trang_thai_don_hang===$type_huy_don_hang)
                                            <form action="{{ route('admins.donhangs.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('bạn có đồng ý xóa không')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-white">
                                                    <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </td>

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
@endsection

@section('js')
<script>
    function confirmSubmit(selectElement){
        var form= selectElement.form;
        var selectedOption =selectElement.options[selectElement.selectedIndex].text;

        var defaultValue= selectElement.getAttribute('data-default-value');

        if (confirm('bạn có chắc chắn thay đổi trạng thái đơn hàng thành "'+selectedOption+'"Không?' )) {
            form.submit();

        } else {
            selectElement.value=defaultValue;
        }
    }
</script>
@endsection
