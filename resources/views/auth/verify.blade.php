@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card px-2 py-3">
                <div class="card-header"> <i class="fa fa-check-square-o"></i> {{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <span class="badge badge-pill badge-success"><a href="{{ route('verification.resend') }}" class="text-white">{{ __('click here to request another') }}</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
