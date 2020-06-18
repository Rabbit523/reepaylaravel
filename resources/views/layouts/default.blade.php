<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">

        <title>@yield('title')</title>
        @include('includes.head')
        <script src="{{ URL::asset('js/jquery-2.2.0.min.js') }}"></script>
    </head>
    <body>
    @yield('content')
    @include('includes.footer')
    </body>
</html>
