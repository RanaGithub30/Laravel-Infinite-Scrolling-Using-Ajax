<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Load More Data on Button Click using JQuery Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    @php
        $url = request()->url();
        $explodedUrl = explode('/', $url);
        $currentRoute = $explodedUrl[3];
    @endphp

    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    @if($currentRoute == "user-list")
            @include('js.load-more')
        @else
            @include('js.scroll-js')
    @endif
</body>

</html>