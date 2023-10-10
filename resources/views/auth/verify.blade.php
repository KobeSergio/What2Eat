@extends('layouts.app')

@section('content')
<style>
    .form-check-input:checked {
        background-color: #dc3545;
        /* Bootstrap's danger color */
        border-color: #dc3545;
        /* Bootstrap's danger color */
    }
</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-danger text-white text-center">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body bg-white p-5">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                    <p>{{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link" style="color: red">{{ __('click here to request another') }}</button>.
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection