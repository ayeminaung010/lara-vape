@extends('templates.layouts.app')
@section('content')
    <main>
        <section id="login-section">
            <div class="container">
                <div class="row  ">
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
                            <h2 class=" fw-bold">Create an account</h2>
                            {{-- <div class=" d-flex justify-content-start">
                                <button class="d-flex gap-3 btn btn-outline-dark justify-content-center ">
                                    <i class="bi bi-google"></i>
                                    <span>Sign in with Google</span>
                                </button>
                            </div> --}}

                            <form action="{{ route('customer.register') }}" method="POST">
                                @csrf
                                <h6>Personal Information</h6>
                                <div class="d-flex flex-column gap-2">
                                    <div class="form-group">
                                        <label for="">FIRST NAME <small class=" text-danger">*</small></label>
                                        <input type="text" name="first_name" class=" form-control rounded-0 py-3 ">
                                        @error('first_name')
                                        <small class=" text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">LAST NAME <small class=" text-danger">*</small></label>
                                        <input type="text" name="last_name" class=" form-control rounded-0 py-3 ">
                                        @error('last_name')
                                        <small class=" text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">GENDER</label>
                                        <select name="gender" class=" form-control rounded-0 py-3" id="">
                                            <option value="">Choose an option</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Not specified</option>
                                        </select>
                                        @error('gender')
                                            <small class=" text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <h6>Sign-In Information</h6>
                                <div class="d-flex flex-column gap-2">
                                    <div class="form-group">
                                        <label for="">EMAIL <small class=" text-danger">*</small></label>
                                        <input type="text" name="email" class=" form-control rounded-0 py-3"
                                            placeholder="Email Address">
                                        @error('email')
                                        <small class=" text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="">PASSWORD <small class=" text-danger">*</small></label>
                                        <input type="password" name="password" class=" form-control rounded-0 py-3"
                                            placeholder="Enter Password">
                                        @error('password')
                                            <small class=" text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="">CONFIRM PASSWORD <small class=" text-danger">*</small></label>
                                        <input type="password" name="confirm_password" class=" form-control rounded-0 py-3"
                                            placeholder="Enter Password">
                                        @error('confirm_password')
                                            <small class=" text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <button type="submit" class=" btn btn-dark text-uppercase rounded-0 py-3">Create An Account</button>
                                </div>
                            </form>

                            <div class=" d-flex justify-content-between">
                                <small class=" text-decoration-none">Already have an account? <a href="{{ route('customer.login') }}"
                                        class=" text-decoration-underline">Log In Here</a></small>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="./public/sign-up/Lifestyle5.jpg" class=" w-100" alt="">
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
