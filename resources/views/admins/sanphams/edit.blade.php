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
                <h4 class="fs-18 fw-semibold m-0">Quản lý danh mục sản phẩm</h4>
            </div>
        </div>
       <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $title }}</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="{{ route('admins.danhmucs.update', $danhMuc->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
                                    <input type="text" id="ten_danh_muc" name="ten_danh_muc" class="form-control @error('ten_danh_muc') is-invalid @enderror"
                                        value="{{ old('ten_danh_muc', $danhMuc->ten_danh_muc) }}" placeholder="Tên danh mục">
                                    @error('ten_danh_muc')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="trang_thai" class="form-label">Trạng thái</label>
                                    <div class="col-sm-10 mb-3 d-flex gap-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="gridRadios1" value="1" {{ $danhMuc->trang_thai == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label text-success" for="gridRadios1">
                                                Hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="gridRadios2" value="0" {{ $danhMuc->trang_thai == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label text-danger" for="gridRadios2">
                                                Ẩn
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="hinh_anh" class="form-label">Hình ảnh</label>
                                    <input type="file" id="hinh_anh" name="hinh_anh" class="form-control @error('hinh_anh') is-invalid @enderror" value="{{ old('hinh_anh') }}" onchange="previewImage(event)">
                                    @error('hinh_anh')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <img id="imagePreview" src="{{ $danhMuc->hinh_anh ? Storage::url($danhMuc->hinh_anh) : '#' }}" alt="Image Preview" style="margin-top: 10px; max-width: 100px;" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
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
