<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Danh sách tài khoản';
        $listTk = User::all();
        // dd($listTk);
        return view('admins.auth.list-auth', compact('title', 'listTk'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:' . User::ROLE_USER . ',' . User::ROLE_ADMIN,
        ]);

        $user = User::findOrFail($id);

        // Kiểm tra nếu người dùng hiện tại là admin và muốn chuyển thành user
        if ($user->role === User::ROLE_ADMIN && $request->role === User::ROLE_USER) {
            return redirect()->route('admins.users.index')->with('error', 'Không thể thay đổi vai trò quản trị viên thành Người dùng.');
        }

        // Cập nhật vai trò người dùng
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admins.users.index')->with('success', 'Đã cập nhật vai trò thành công.');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        // Tìm người dùng theo ID
        $user = User::findOrFail($id);

        // Xóa người dùng
        $user->delete();

        // Chuyển hướng và hiển thị thông báo thành công
        return redirect()->route('admins.users.index')->with('success', 'User deleted successfully.');
    }

}
