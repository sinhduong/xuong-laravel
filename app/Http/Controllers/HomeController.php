<?php
namespace App\Http\Controllers;

use App\Models\SanPham; // Import model nếu cần

class HomeController extends Controller
{
    public function index()
    {
        // Lấy tất cả sản phẩm
        $listSanPham = SanPham::all();

        // Trả về view và truyền dữ liệu vào
        return view('clients.trangchus.banner', compact('listSanPham'));
    }
}
