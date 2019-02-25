@section('content')
@extends('layouts.app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class='card card-profile text-center'>
            <img alt='' class='card-img-top' src='{{asset('img/profile_wall.jpg')}}' height="150px">
                <div class='card-block'>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- <img alt='' class='card-img-profile' src='data:image/jpeg;base64,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' height="160px"> --}}
                    <img alt='' class='card-img-profile' src='{{ Auth::user()->profile }}' height="150px">
                    <h4 class='card-title text-dark'>
                    {{ Auth::user()->name }}
                    <small>{{ Auth::user()->email }}</small>
                    </h4>
                    <p class="text-dark">Wanna to Know about more ..?</p>
                    <div class='card-links'>
                    <a class='fa fa-dribbble' href='#'></a>
                    <a class='fa fa-twitter' href='#'></a>
                    <a class='fa fa-facebook' href='#'></a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection