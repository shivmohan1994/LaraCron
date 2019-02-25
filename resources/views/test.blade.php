<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Italianno' rel='stylesheet'>
        <!-- Styles -->
    </head>
    <body>
        @include('layouts.css');
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Cron Job
                </div>
                <div class="links">
                    <a href="https://plus.google.com/u/0/+ShivMohan94?tab=wX" target="_blank"><button class="btn btn-sm btn-outline-danger"><i class="fa fa-google-plus-official"></i> <strong>Google+</strong></button></a>
                    <a href="https://www.teamscorpion.in/shivmohan" target="_blank"><button class="btn btn-sm btn-outline-info"><i class="fa fa-user-circle-o"></i> <strong>Profile</strong></button></a>
                    <a href="https://www.linkedin.com/in/shivmohan194/" target="_blank"><button class="btn btn-sm btn-outline-primary"><i class="fa fa-linkedin-square"></i> <strong>LinkedIn</strong></button></a>
                    <a href="https://github.com/shivmohan1994" target="_blank"><button class="btn btn-sm btn-outline-dark"><i class="fa fa-github"></i> <strong>GitHub</strong></button></a>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </body>
</html>
