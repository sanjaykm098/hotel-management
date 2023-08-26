@extends('layouts.app')

@section('content')
    <div class="container-xxl">
        @if (session('status'))
            <div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show" role="alert"
                aria-live="assertive" aria-atomic="true" data-delay="2000">
                <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">{{ env('APP_NAME') }}</div>
                    <small>Just Now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 end-0 show" role="alert"
                aria-live="assertive" aria-atomic="true" data-delay="2000">
                <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">{{ env('APP_NAME') }}</div>
                    <small>Just Now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Forgot Password -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ route('index') }}" class="app-brand-link gap-2">
                                <span
                                    class="app-brand-text demo text-capitalize text-body fw-bolder">{{ env('APP_NAME') }}</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Forgot Password? 🔒</h4>
                        <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
                        <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                    placeholder="Enter your email" autofocus="">
                            </div>
                            <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
                        </form>
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                Back to login
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Forgot Password -->
            </div>
        </div>
    </div>
@endsection
