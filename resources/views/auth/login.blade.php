@extends('layouts.app')

@section('content')
    <body>
        <!-- Content -->
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

        <div class="container-xxl">

            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    <!-- Register -->
                    <div class="card">
                        <div class="card-body">
                            <div class="app-brand justify-content-center">
                                <a href="{{ route('index') }}" class="app-brand-link gap-2">
                                    <span
                                        class="app-brand-text demo text-capitalize text-body fw-bolder">{{ env('APP_NAME') }}</span>
                                </a>
                            </div>
                            <!-- /Logo -->
                            <h4 class="mb-2">Welcome to {{ env('APP_NAME') }}! 👋</h4>
                            <p class="mb-4">Please sign-in to your account and start the adventure</p>

                            <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email or Username</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Enter your email" autofocus="">
                                </div>
                                <!-- Error Message -->
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">
                                                <small>Forgot Password?</small>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="············" aria-describedby="password">
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-me">
                                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                                </div>
                            </form>

                            <p class="text-center">
                                <span>Developed By <a href="mailto:{{env('APP_DEV_EMAIL')}}">{{env('APP_DEV')}}</a>❤️❤️</span>
                            </p>
                        </div>
                    </div>
                    <!-- /Register -->
                </div>
            </div>
        </div>

        <!-- / Content -->
    </body>
@endsection
