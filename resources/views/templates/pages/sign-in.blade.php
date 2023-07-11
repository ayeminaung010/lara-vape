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
                        <div class="d-flex flex-column gap-3">
                            <h2>Login</h2>
                            <h6 class=" fw-bold">
                                FIRST TIME USING THE NEW WEBSITE BUT AN EXISTING VAPO CUSTOMER?
                            </h6>
                            <form action="{{ route('customer.auth') }}" method="POST" class="d-flex flex-column gap-2">
                                @csrf
                                <p>
                                    Your account has been copied across to this new website so you’ll need to reset your
                                    password as if you are an existing customer. To reset your password simply click “Reset
                                    password” and follow the prompts in your email.
                                </p>
                                <input type="text" name="email" class="form-control rounded-0 py-3 "
                                    placeholder="Email Address">
                                    @error('email')
                                    <small class=" text-danger">{{ $message }}</small>
                                    @enderror
                                <input type="password" name="password" class=" form-control rounded-0 py-3"
                                    placeholder="Enter Password">
                                    @error('password')
                                    <small class=" text-danger">{{ $message }}</small>
                                    @enderror
                                <button type="submit" class=" btn btn-dark text-uppercase rounded-0 py-3">Log In</button>
                            </form>

                            <div class=" d-flex justify-content-between">
                                <small class=" text-decoration-underline">
                                    <a href="{{ route('customer.resetPassword') }}">
                                        Reset Password
                                    </a>
                                </small>
                                <small class=" text-decoration-none">Don’t have an account?
                                     <a href="{{ route('customer.register') }}"
                                        class=" text-decoration-underline">Create</a>
                                    </small>
                            </div>

                            <a href="{{ route('customer.register') }}" class=" btn btn-outline-dark text-uppercase rounded-0 py-3">Create An
                                Account</a>

                            {{-- <div class=" d-flex justify-content-center">
                                <button class="d-flex gap-3 btn btn-outline-dark justify-content-center ">
                                    <i class="bi bi-google"></i>
                                    <span>Sign in with Google</span>
                                </button>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
