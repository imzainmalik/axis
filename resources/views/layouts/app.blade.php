<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes/compatibility')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('includes/style')
</head>

<body>
    <div class="main-wrapper">
        @include('includes/header')

        @yield('content')
    </div>

    @include('includes/scripts')

    @stack('custom_js')
</body>

</html>
