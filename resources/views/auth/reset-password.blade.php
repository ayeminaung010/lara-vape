{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}



@extends('templates.layouts.app')

@section('content')
    <main>
        <section id="login-section">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-lg-6 p-5">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Fail!</strong> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Fail!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="d-flex flex-column gap-3">
                            <h2>Reset Password</h2>
                            <h6 class=" fw-bold">
                                FIRST TIME USING THE NEW WEBSITE BUT AN EXISTING VAPO CUSTOMER?
                            </h6>
                            <form action="{{ route('customer.password.update') }}" method="POST" class="d-flex flex-column gap-2">
                                @csrf
                                <input type="text" name="email" class="form-control rounded-0 py-3 "
                                    placeholder="Email Address" value="{{ old('email', $request->email) }}">
                                @error('email')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror

                                <input  type="password" name="password" class="form-control rounded-0 py-3 " placeholder="Enter New Password">
                                @error('password')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror

                                <input  type="password" name="password_confirmation" class="form-control rounded-0 py-3 " placeholder="Enter New Confirm Password">
                                @error('password_confirmation')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                                <button type="submit" class=" btn btn-dark text-uppercase rounded-0 py-3">Log In</button>
                            </form>

                            <div class=" d-flex justify-content-between">
                                <small class=" text-decoration-underline">
                                    <a href="route('customer.login')">
                                        Back to login
                                    </a>
                                </small>
                                <small class=" text-decoration-none">Don’t have an account?
                                    <a href="{{ route('customer.register') }}" class=" text-decoration-underline">Create</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
