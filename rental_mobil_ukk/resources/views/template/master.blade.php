<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/icon/easyCarHire.png') }}" type="image/x-icon">
    <title>EasyCarHire @yield('title')</title>
    @stack('css')
</head>
<body>
    @yield('content')

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    @stack('script')
</body>
</html>
