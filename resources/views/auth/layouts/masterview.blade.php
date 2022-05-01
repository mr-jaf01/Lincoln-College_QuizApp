<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('linlogo.png')}}" />
    <title>Quiz App - @yield('tittle')</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.7.0"></script>
    <script src="https://unpkg.com/hyperscript.org@0.9.5"></script>

</head>
<body style="font-family: Verdana, sans-serif;">
    @yield('content')

</body>
</html>
