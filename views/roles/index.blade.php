{{-- Xác định layout mà ta muốn sử dụng --}}
@extends('layouts.admin')

{{-- Xác định nội dung cần hiển thị --}}
@section('content')
    <h1>Danh sách chức vụ</h1>

    <a href="{{ route('/roles/create') }}">Thêm mới</a>

    <table border="1">
        <thead>
            <th>STT</th>
            <th>Tên chức vụ</th>
            <th>Thao tác</th>
        </thead>
        <tbody>
            @foreach ($roles as $index => $role)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $role['name'] }}</td>
                    <td>
                        <button>Sửa</button>
                        <a href="{{ route('/roles/destroy/' . $role['id']) }}" 
                            onclick="return confirm('Bạn có đồng ý xóa không?')">

                            <button>Xóa</button>
                            
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection