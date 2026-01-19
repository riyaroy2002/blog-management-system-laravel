@extends('layouts.frontend.app')
@section('title', 'Login')
@section('body-class', 'auth-page')
@section('content')
    <div class="callback-form contact-us register-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <div class="register-card shadow-sm">

                        <div class="section-heading text-center mb-4">
                            <h2><em>Author Login </em></h2>
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

                        <form action="{{ route('author.post.login') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email Address" value="{{ old('email') }}">

                                </div>

                                <div class="col-md-12">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                </div>

                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="register-btn w-100">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>

                        <p class="text-center mt-3">
                            Don’t have an account?
                            <a href="{{ route('author.register') }}">
                                Sign Up
                            </a>
                        </p>

                        <p class="text-center mt-1">
                           Forgot password ?
                            <a href="{{ route('author.forgot-password') }}">
                                Click here to reset
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
