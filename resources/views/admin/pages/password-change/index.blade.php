@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Fail!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Password Change</h6>
                </div>
            </div>
        </div>
        <div class="">

            <div class="row justify-content-center">
                <div class="col-7">
                    <form action="{{ route('profile.password.update') }}"  method="POST">
                        @csrf
                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="old_password">Old Password</label>
                                <input type="password" class=" form-control" name="old_password" placeholder="Enter Old Password">
                            </div>
                            <div class="">
                                @error('old_password')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="new_password">New Password</label>
                                <input type="password" class=" form-control" name="new_password" placeholder="Enter New Password">
                            </div>
                            <div class="">
                                @error('new_password')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Retype Password</label>
                                <input type="password" class=" form-control" name="confirm_password" placeholder="Enter Confirm Password">
                            </div>
                            <div class="">
                                @error('confirm_password')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
