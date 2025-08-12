{{-- Xác định layout mà ta muốn sử dụng --}}
@extends('layouts.admin')

{{-- Xác định nội dung cần hiển thị --}}
@section('content')
    <h1>Danh sách người dùng</h1>

    <a href="{{ route('/users/create') }}">
        Thêm mới
    </a>

    <table border="1">
        <thead>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Họ tên</th>
            <th>Chức vụ</th>
            <th>SĐT</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <img src="" alt="image">
                    </td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['role_name'] }}</td>
                    <td>{{ $user['phone'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['date_birth'] }}</td>
                    <td>{{ $user['status'] ? 'Kích hoạt' : 'Khóa' }}</td>
                    <td>
                        <a href="{{ route('/users/show/' . $user['id']) }}">
                            <button>Xem</button>
                        </a>

                        <button>Sửa</button>
                        
                        <a href="{{ route('/users/destroy/' . $user['id']) }}"
                            onclick="return confirm('Bạn có đồng ý xóa người dùng không?')">
                            <button>Xóa</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
