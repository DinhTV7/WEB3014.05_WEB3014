@extends('layouts.admin')

@section('content')
    <h1>Cập nhật sản phẩm</h1>

    @if (isset($_SESSION['flash']['error']))
        <p style="color: red">{{ $_SESSION['flash']['error'] }}</p>
        <?php
            unset($_SESSION['flash'])
        ?>
    @endif

    <form action="{{ route('/products/update/' . $product['id']) }}" method="POST" enctype="multipart/form-data">
        <div>
            Danh mục:
            <select name="category_id">
                @foreach ($categories as $item)
                    <option value="{{ $item['id'] }}" 
                            @if ($item['id'] == $product['category_id']) selected @endif>
                        {{ $item['name'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            Tên sản phẩm:
            <input type="text" name="name" placeholder="Nhập tên sản phẩm" value="{{ $product['name'] }}">
        </div>

        <div>
            Hình ảnh:
            <input type="file" name="img_thumbnail">
            <br>
            <img src="{{ file_url($product['img_thumbnail']) }}" alt="image" width="80px">
        </div>

        <div>
            Mô tả:
            <input type="text" name="description" placeholder="Nhập mô tả" value="{{ $product['description'] }}">
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection
