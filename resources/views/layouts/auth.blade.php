<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="/vendor/roufish-ui/style/main.css" rel="stylesheet" />

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-primary navbar-roufish">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}"> <img src="/vendor/roufish-ui/images/logo.png"
                    alt="Bootstrap" width="60px">
            </a>
        </div>
    </nav>

    @yield('content')


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/roufish-ui/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/roufish-ui/vendor/jquery/jquery.min.js"></script>
</body>

</html>
