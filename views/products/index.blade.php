@extends('layouts.admin')

@section('content')
    <h1>Danh sách sản phẩm</h1>
    <a href="{{ route('/products/create') }}">
        Thêm mới
    </a>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Category Name</th>
            <th>Name</th>
            <th>Image Thumbnail</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['category_name'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>
                        <img src="{{ file_url($item['img_thumbnail']) }}" alt="image" width="80px">
                    </td>
                    <td>
                        <a href="{{ route('/products/edit/' . $item['id']) }}">Sửa</a>
                        <a href="{{ route('/products/destroy/' . $item['id']) }}" 
                            onclick="return confirm('Xác nhận xóa?')">
                            Xóa
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection