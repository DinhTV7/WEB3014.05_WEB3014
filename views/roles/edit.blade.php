@extends('layouts.admin')

@section('content')
    <h1>Cập nhật chức vụ</h1>

    {{-- Hiển thị lỗi --}}
    @if (isset($_SESSION['flash']['error']))
        <p style="color: red">{{ $_SESSION['flash']['error'] }}</p>
        <?php unset($_SESSION['flash']); ?>
    @endif

    <form action="{{ route('/roles/update/' . $role['id']) }}" method="POST">
        Tên chức vụ:
        <input type="text" name="name" value="{{ $role['name'] }}" placeholder="Nhập tên chức vụ">

        <button type="submit">Submit</button>
    </form>
@endsection