<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Optional: Include Bootstrap via CDN if not using Laravel Mix -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet"> -->

    <style>
        .full-height {
            height: 100vh;
        }

        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .title {
            font-size: 84px;
        }
    </style>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <!-- Optional: Include Bootstrap JS via CDN if not using Laravel Mix -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
