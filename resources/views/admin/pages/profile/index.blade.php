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
                    <h6 class="text-white text-capitalize ps-3">SEO</h6>
                </div>
            </div>
        </div>
        <div class="">
            <div class=" d-flex justify-content-evenly">
                <div class="">
                    <img src="{{ asset('dbImg/profile/'.$admin->image) }}" width="300" height="300"  alt="">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-7">
                    <form action="{{ route('profile.update',$admin->id) }}" enctype="multipart/form-data" class=" " method="POST">
                        @csrf

                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="first_name">First Name</label>
                                <input type="text" class=" form-control" name="first_name" placeholder="First Name" value="{{ $admin->first_name }}">
                            </div>
                            <div class="">
                                @error('first_name')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="last_name">Last Name</label>
                                <input type="text" class=" form-control" name="last_name" placeholder="Last Name" value="{{ $admin->last_name }}">
                            </div>
                            <div class="">
                                @error('last_name')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Email</label>
                                <input type="email" class=" form-control" name="email" placeholder="Enter Email" value="{{ $admin->email }}">
                            </div>
                            <div class="">
                                @error('email')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Phone No</label>
                                <input type="number" class=" form-control" name="phone" placeholder="Enter Phone No" value="{{ $admin->ph_no }}">
                            </div>
                            <div class="">
                                @error('phone')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Gender</label>
                                <select name="gender" class=" form-control" id="">
                                    <option value="{{ $admin->first_name }}" selected disabled>Choose Gender</option>
                                    <option value="1" @selected($admin->gender == '1')>Male</option>
                                    <option value="2" @selected($admin->gender == '2')>Female</option>
                                    <option value="3" @selected($admin->gender == '3')>No specified</option>
                                </select>
                            </div>
                            <div class="">
                                @error('gender')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Address</label>
                                <input type="text" class=" form-control" name="address" placeholder="Enter Address" value="{{ $admin->address }}">
                            </div>
                            <div class="">
                                @error('address')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Image</label>
                                <input type="file" class=" form-control" name="image" >
                            </div>
                            <div class="">
                                @error('file')
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
