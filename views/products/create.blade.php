@extends('layouts.admin')

@section('content')
    <h1>Thêm mới sản phẩm</h1>

    @if (isset($_SESSION['flash']['error']))
        <p style="color: red">{{ $_SESSION['flash']['error'] }}</p>
        <?php
            unset($_SESSION['flash'])
        ?>
    @endif

    <form action="{{ route('/products/store') }}" method="POST" enctype="multipart/form-data">
        <div>
            Danh mục:
            <select name="category_id">
                @foreach ($categories as $item)
                    <option value="{{ $item['id'] }}">
                        {{ $item['name'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            Tên sản phẩm:
            <input type="text" name="name" placeholder="Nhập tên sản phẩm">
        </div>

        <div>
            Hình ảnh:
            <input type="file" name="img_thumbnail">
        </div>

        <div>
            Mô tả:
            <input type="text" name="description" placeholder="Nhập mô tả">
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection
