@extends('layouts.frontend.app')
@section('title', 'Reset Password')
@section('body-class', 'auth-page')
@section('content')
    <div class="callback-form contact-us register-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <div class="register-card shadow-sm">

                        <div class="section-heading text-center mb-4">
                            <h2>Forgot<em> Password</em></h2>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('post.reset-password') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <input type="email" name="email" class="form-control" placeholder="Email Address"
                                        value="{{ session('email') }}" readonly>
                                </div>

                                <div class="col-md-12">
                                    <input type="password" name="password" class="form-control" placeholder=" New Password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm Password">
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="register-btn w-100">
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
