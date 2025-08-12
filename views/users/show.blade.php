@extends('layouts.admin')

@section('content')
    <h1>Thông tin chi tiết người dùng</h1>

    <p><strong>ID:</strong> {{ $user['id'] }}</p>
    <p><strong>Hình ảnh:</strong> </p>
    <p><strong>Họ tên:</strong> {{ $user['name'] }}</p>
    <p><strong>SĐT:</strong> {{ $user['phone'] }}</p>
    <p><strong>Email:</strong> {{ $user['email'] }}</p>
    <p><strong>Ngày sinh:</strong> {{ $user['date_birth'] }}</p>
    <p><strong>Chức vụ:</strong> {{ $user['role_name'] }}</p>
    <p><strong>Trạng thái:</strong> {{ $user['status'] ? 'Kích hoạt' : 'Khóa' }}</p>

    <a href="{{ route('/users') }}">Quay lại</a>
@endsection
