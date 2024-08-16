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
                <h4 class="fs-18 fw-semibold m-0">Quản lý tài khoản</h4>
            </div>
        </div>
       <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title align-content-center mb-0">{{ $title }}</h5>
                </div><!-- end card header -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">User name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($listTk as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <form action="{{ route('admins.users.updateRole', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="role" class="form-control" onchange="this.form.submit()">
                                                <option value="{{ \App\Models\User::ROLE_USER }}" {{ $item->role === \App\Models\User::ROLE_USER ? 'selected' : '' }}>
                                                    Người dùng
                                                </option>
                                                <option value="{{ \App\Models\User::ROLE_ADMIN }}" {{ $item->role === \App\Models\User::ROLE_ADMIN ? 'selected' : '' }}>
                                                    Admin
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-info">chi tiết</a>
                                        <form action="{{ route('admins.users.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có muốn xóa không')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>

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
    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection
@section('js')

@endsection
