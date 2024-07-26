<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
