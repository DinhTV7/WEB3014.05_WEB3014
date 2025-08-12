@extends('layouts.admin')

@section('content')
    <h1>Thêm mới chức vụ</h1>

    <form action="{{ route('/roles/store') }}" method="POST">
        Tên chức vụ:
        <input type="text" name="name" placeholder="Nhập tên chức vụ">

        <button type="submit">Submit</button>
    </form>
@endsection