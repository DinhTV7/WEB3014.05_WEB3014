@extends('layouts.admin')

@section('content')
    <h1>Thêm mới người dùng</h1>

    {{-- Hiển thị lỗi --}}
    @if (isset($_SESSION['flash']['error']))
        <p style="color: red">{{ $_SESSION['flash']['error'] }}</p>
        <?php unset($_SESSION['flash']); ?>
    @endif

    <form action="{{ route('/users/store') }}" method="POST" enctype="multipart/form-data">
        <div>
            Hình ảnh:
            <input type="file" name="avatar">
        </div>
        <div>
            Họ tên:
            <input type="text" name="name" placeholder="Nhập họ tên">
        </div>
        <div>
            Số điện thoại:
            <input type="text" name="phone" placeholder="Nhập số điện thoại">
        </div>
        <div>
            Email:
            <input type="text" name="email" placeholder="Nhập email">
        </div>
        <div>
            Ngày sinh:
            <input type="date" name="date_birth">
        </div>
        <div>
            Chức vụ:
            <select name="role_id">
                @foreach ($roles as $role)
                    <option value="{{ $role['id'] }}">
                        {{ $role['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            Trạng thái:
            <select name="status">
                <option value="0">Khóa</option>
                <option value="1" selected>Kính hoạt</option>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection