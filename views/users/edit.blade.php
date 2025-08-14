@extends('layouts.admin')

@section('content')
    <h1>Cập nhật người dùng</h1>

    <form action="{{ route('/users/update/' . $user['id']) }}" method="POST" enctype="multipart/form-data">
        <div>
            Hình ảnh:
            <input type="file" name="avatar">
            <br>
            <img src="{{ file_url($user['avatar']) }}" alt="avatar" width="80px">
        </div>
        <div>
            Họ tên:
            <input type="text" name="name" placeholder="Nhập họ tên" value="{{ $user['name'] }}">
        </div>
        <div>
            Số điện thoại:
            <input type="text" name="phone" placeholder="Nhập số điện thoại" value="{{ $user['phone'] }}">
        </div>
        <div>
            Email:
            <input type="text" name="email" placeholder="Nhập email" value="{{ $user['email'] }}">
        </div>
        <div>
            Ngày sinh:
            <input type="date" name="date_birth" value="{{ $user['date_birth'] }}">
        </div>
        <div>
            Chức vụ:
            <select name="role_id">
                @foreach ($roles as $role)
                    <option value="{{ $role['id'] }}" {{ $role['id'] == $user['role_id'] ? 'selected' : '' }}>
                        {{ $role['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            Trạng thái:
            <select name="status">
                <option value="0" {{ $user['status'] == 0 ? 'selected' : '' }}>Khóa</option>
                <option value="1" {{ $user['status'] == 1 ? 'selected' : '' }}>Kính hoạt</option>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection