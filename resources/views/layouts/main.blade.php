<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>AspirasiKU | {{$title}} </title>
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" integrity="" crossorigin="anonymous">
</head>

<body>
    @include('partials.navbar')
    <div class="container mt-4">

        @yield('container')


    </div>

    <script src="js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>
</body>

</html>
