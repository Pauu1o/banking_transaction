<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Transaction</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    @include('layouts-admin.header')
        @yield('content')
    @include('layouts-admin.footer')
</body>
</html>