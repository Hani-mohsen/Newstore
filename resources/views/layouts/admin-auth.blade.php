<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Hani">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('frontend/img/favicon.png')}}">

    <title>{{ config('app.name', 'Laravel') }} Dashboard</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
    @yield('style')
</head>
<body class="bg-gradient-primary">


    <div class="container">
        @yield('content')
    </div>



    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>
    @yield('script')
</body>
</html>
