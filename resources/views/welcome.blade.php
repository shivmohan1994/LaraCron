<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laravel</title>
        <link rel="icon" href="https://pngimage.net/wp-content/uploads/2018/06/laravel-icon-png-5.png" type="image/png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Italianno' rel='stylesheet'>
</head>
<body>
@include('layouts.css')
    <canvas class="container" id="container" role="main"></canvas>
        {{-- <nav class="navbar navbar-expand-lg pull-right"> --}}
            <nav class="navbar navbar-expand-md navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link">Home</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                        @endif
                        @endauth
                    @endif
                    </ul>
                </div>
            </nav>
            <div class="content">
                <h1 class="title"><img src="{{url('/img/laravel.png')}}" alt="Image" height="45px"/><span class="text-danger"> Laravel</span> Cron Job</h1>
                <p class="desc">Intract with laravel Auth, Cron Job and send mail to Google Mail</p>
                    <ul class="contact">
                        <li><a href="https://plus.google.com/u/0/+ShivMohan94?tab=wX" target="_blank"><i class="fa fa-google-plus-official text-danger"></i> <strong>Google+</strong></a></li>
                        <li><a href="https://www.teamscorpion.in/shivmohan" target="_blank"><i class="fa fa-user-circle-o text-info"></i> <strong>Profile</strong></a></li>
                        <li><a href="https://www.linkedin.com/in/shivmohan194/" target="_blank"><i class="fa fa-linkedin-square text-primary"></i> <strong>LinkedIn</strong></a></li>
                        <li><a href="https://github.com/shivmohan1994" target="_blank"><i class="fa fa-github text-dark"></i> <strong>GitHub</strong></a></li>
                    </ul>
            </div>
        </div>
    <div class="blur blurTop"><canvas class="canvas" id="blurCanvasTop"></canvas></div>
    <div class="blur blurBottom"><canvas width="1000px" height="1000px" class="canvas" id="blurCanvasBottom"></canvas></div>
    @include('layouts.footer')
</body>
@include('layouts.js')
</html>
