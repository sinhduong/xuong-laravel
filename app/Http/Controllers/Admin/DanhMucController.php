<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DanhMucRequest;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Danh mục sản phẩm";
        $listDanhMuc = DanhMuc::orderByDesc('trang_thai')->get();
        // dd($listDanhMuc);
        return  view('admins.danhmucs.index',compact('title','listDanhMuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="thêm danh mục sản phẩm";
        return  view('admins.danhmucs.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DanhMucRequest $request)
    {
        if($request->isMethod('POST')){
            $data = $request->except('_token');

            // Xử lý hình ảnh
            if($request->hasFile('hinh_anh')){
                $filepath = $request->file('hinh_anh')->store('uploads/danhmucs', 'public');
            } else {
                $filepath = null;
            }
            $data['hinh_anh'] = $filepath;

            DanhMuc::create($data);

            return redirect()->route('admins.danhmucs.index')->with('success', 'Thêm danh mục thành công');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title="chỉnh sửa danh mục sản phẩm";
        $danhMuc=DanhMuc::findOrfail($id);
        return  view('admins.danhmucs.edit',compact('title', 'danhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Kiểm tra nếu yêu cầu là PUT
        if($request->isMethod('PUT')){
            $data = $request->except('_token', '_method');

            // Tìm danh mục theo id
            $danhMuc = DanhMuc::findOrFail($id);

            // Kiểm tra nếu có file hình ảnh được tải lên
            if($request->hasFile('hinh_anh')){
                // Xóa hình ảnh cũ nếu tồn tại
                if($danhMuc->hinh_anh && Storage::disk('public')->exists($danhMuc->hinh_anh)){
                    Storage::disk('public')->delete($danhMuc->hinh_anh);
                }

                // Lưu hình ảnh mới và lấy đường dẫn
                $filepath = $request->file('hinh_anh')->store('uploads/danhmucs', 'public');
                $data['hinh_anh'] = $filepath;
            } else {
                // Nếu không có hình ảnh mới, giữ nguyên hình ảnh cũ
                $data['hinh_anh'] = $danhMuc->hinh_anh;
            }

            // Cập nhật danh mục với dữ liệu mới
            $danhMuc->update($data);

            // Chuyển hướng về trang danh mục với thông báo thành công
            return redirect()->route('admins.danhmucs.index')->with('success', 'Cập nhật danh mục thành công');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Tìm danh mục theo id
        $danhMuc = DanhMuc::findOrFail($id);

        // Xóa hình ảnh cũ nếu tồn tại
        if($danhMuc->hinh_anh && Storage::disk('public')->exists($danhMuc->hinh_anh)){
            Storage::disk('public')->delete($danhMuc->hinh_anh);
        }

        // Xóa danh mục khỏi cơ sở dữ liệu
        $danhMuc->delete();

        // Chuyển hướng về trang danh mục với thông báo thành công
        return redirect()->route('admins.danhmucs.index')->with('success', 'Xóa danh mục thành công');
    }

}

