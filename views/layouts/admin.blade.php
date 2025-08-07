{{-- Xây dựng layout dùng riêng cho trang ADMIN --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('partials.header')
    @include('partials.aside')

    {{-- Nội dung của trang sẽ được hiển thị ở đây --}}
    {{-- Trong yield là tên của section --}}
    @yield('content')

    @include('partials.footer')
</body>
</html>