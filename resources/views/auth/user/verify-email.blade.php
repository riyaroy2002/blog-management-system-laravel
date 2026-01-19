@extends('layouts.frontend.app')
@section('title', 'Verify Email')
@section('body-class', 'auth-page')
@section('content')
    <div class="callback-form contact-us register-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <div class="register-card shadow-sm">

                        @if (session('success'))
                            <div class="alert alert-success text-center alert-dismissible fade show">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger text-center alert-dismissible fade show">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="section-heading text-center mb-4">
                            <h2>Verify Your <em> Email</em></h2>
                        </div>
                        <p class="text-muted small mb-0">
                            We’ve sent a verification link to your email address.
                            Please check your inbox and verify your email to continue.
                        </p>
                        <hr>

                        <p class="small text-muted mb-3">
                            Didn’t receive the email?
                        </p>

                        <form method="POST" action="{{ route('resend-email-link') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ session('email') }}">

                            <button type="submit" class="register-btn w-100">
                                Resend Verification Email
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
