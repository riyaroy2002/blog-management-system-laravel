@extends('layouts.frontend.app')
@section('title', 'Register')
@section('body-class', 'auth-page')
@section('content')
    <div class="callback-form contact-us register-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <div class="register-card shadow-sm">

                        <div class="section-heading text-center mb-4">
                            <h2>Create  <em>Account (Author)</em></h2>

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

                        <form action="{{ route('author.register.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <input type="text" name="first_name"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        placeholder="First Name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input type="text" name="last_name"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        placeholder="Last Name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email Address" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <input type="text" name="contact_no"
                                        class="form-control @error('contact_no') is-invalid @enderror"
                                        placeholder="Contact No" value="{{ old('contact_no') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10);">
                                    @error('contact_no')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm Password">
                                </div>

                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="register-btn w-100">
                                        Register
                                    </button>
                                </div>

                            </div>
                        </form>

                        <p class="text-center mt-3">
                            Already have an account?
                            <a href="{{ route('author.login') }}">Login</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
