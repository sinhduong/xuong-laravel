<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\DanhMuc;
use App\Models\HinhAnhSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Thông tin sản phẩm";
        $listSanPham = SanPham::orderByDesc('is_type')->get();
        // dd($listSanPham);
        return view('admins.sanphams.index', compact('title', 'listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm sản phẩm";
        $listDanhMuc = DanhMuc::query()->get();
        // dd($listDanhMuc);
        return view('admins.sanphams.create', compact('title', 'listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SanPhamRequest $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->except('_token');

            // Chuyển đổi giá trị checkbox thành boolean
            $data['is_new'] = $request->has('is_new') ? 1 : 0;
            $data['is_hot'] = $request->has('is_hot') ? 1 : 0;
            $data['is_hot_deal'] = $request->has('is_hot_deal') ? 1 : 0;
            $data['is_show_home'] = $request->has('is_show_home') ? 1 : 0;

            // Xử lý hình ảnh đại diện
            if ($request->hasFile('hinh_anh')) {
                $data['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
            } else {
                $data['hinh_anh'] = null;
            }

            // Thêm sản phẩm
            $sanPham = SanPham::query()->create($data);

            // Lấy id sản phẩm vừa thêm để thêm Album
            $sanPhamID = $sanPham->id;

            // Xử lý thêm album
            if ($request->hasFile('list_hinh_anh')) {
                foreach ($request->file('list_hinh_anh') as $image) {
                    if ($image) {
                        $path = $image->store('uploads/hinhanhsanpham/id_' . $sanPhamID, 'public');
                        $sanPham->hinhAnhSanPham()->create([
                            'san_pham_id' => $sanPhamID,
                            'hinh_anh' => $path,
                        ]);
                    }
                }
            }

            return redirect()->route('admins.sanphams.index')->with('success', 'Thêm sản phẩm thành công');
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
        $title = "Cập nhật thông tin sản phẩm";
        $listDanhMuc = DanhMuc::query()->get();

        $sanPham=SanPham::query()->findOrFail($id);
        // dd($listDanhMuc);
        return view('admins.sanphams.edit', compact('title', 'listDanhMuc','sanPham'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $data = $request->except('_token', '_method');

            // Convert checkbox values to boolean
            $data['is_new'] = $request->has('is_new') ? 1 : 0;
            $data['is_hot'] = $request->has('is_hot') ? 1 : 0;
            $data['is_hot_deal'] = $request->has('is_hot_deal') ? 1 : 0;
            $data['is_show_home'] = $request->has('is_show_home') ? 1 : 0;

            $sanPham = SanPham::findOrFail($id);

            // Handle main image
            if ($request->hasFile('hinh_anh')) {
                if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)) {
                    Storage::disk('public')->delete($sanPham->hinh_anh);
                }
                $data['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
            } else {
                $data['hinh_anh'] = $sanPham->hinh_anh;
            }

            // Handle image album
            if ($request->hasFile('new_list_hinh_anh')) {
                foreach ($request->file('new_list_hinh_anh', []) as $image) {
                    $path = $image->store('uploads/hinhanhsanpham/id_' . $id, 'public');
                    $sanPham->hinhAnhSanPham()->create([
                        'san_pham_id' => $id,
                        'hinh_anh' => $path,
                    ]);
                }
            }

            if ($request->hasFile('list_hinh_anh')) {
                foreach ($request->file('list_hinh_anh', []) as $key => $image) {
                    $hinhAnhSanPham = HinhAnhSanPham::find($key);
                    if ($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh)) {
                        Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                    }
                    $path = $image->store('uploads/hinhanhsanpham/id_' . $id, 'public');
                    $hinhAnhSanPham->update([
                        'hinh_anh' => $path,
                    ]);
                }
            }

            // Handle image deletions
            if ($request->filled('deleted_images')) {
                foreach (explode(',', $request->input('deleted_images')) as $imageId) {
                    $hinhAnhSanPham = HinhAnhSanPham::find($imageId);
                    if ($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh)) {
                        Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                        $hinhAnhSanPham->delete();
                    }
                }
            }

            // Update product data
            $sanPham->update($data);

            return redirect()->route('admins.sanphams.index')->with('success', 'Cập nhật thông tin sản phẩm thành công');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanPham=SanPham::query()->findOrFail($id);

        // xóa hình ảnh đại diện của sản phẩm
        if($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)){
            Storage::disk('public')->delete($sanPham->hinh_anh);
        }

        // xóa album
        $sanPham->hinhAnhSanPham()->delete();

        // xóa toàn bộ hình ảnh trong thư mục
        $data= 'uploads/hinhanhsanpham/id_'. $id;
        if(Storage::disk('public')->exists($data)){
            Storage::disk('public')->deleteDirectory($data);
        }
        // xóa sản phẩm
        $sanPham->delete();
        return redirect()->route('admins.sanphams.index')->with('success','Xóa sản phẩm thành công');
    }
}
