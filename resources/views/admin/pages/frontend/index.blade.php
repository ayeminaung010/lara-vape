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
                    <h6 class="text-white text-capitalize ps-3">Frontend Manage</h6>
                </div>
            </div>
        </div>
        <div class="">
            <div class=" d-flex justify-content-evenly">
                <div class="">
                    <img src="{{ asset('dbImg/logo/'. $frontend->logo) }}" width="300" height="300"  alt="">
                    <h5>Logo</h5>
                </div>
                <div class="">
                    <img src="{{ asset('dbImg/banner/' . $frontend->banner_image ) }}" width="400" height="400"  alt="">
                    <h5>Banner Image</h5>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-7">
                    <form action="{{ route('frontend.store') }}" enctype="multipart/form-data" class=" " method="POST">
                        @csrf
                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Logo</label>
                                <input type="file" class=" form-control" name="logo"  >
                            </div>
                            <div class="">
                                @error('logo')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Banner Image</label>
                                <input type="file" class=" form-control" name="banner_image"  value="">
                            </div>
                            <div class="">
                                @error('banner_image')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Facebook Url</label>
                                <input type="text" class=" form-control " name="facebook_url" placeholder="Enter Facebook url" value="{{ $frontend->facebook_url }}">
                            </div>

                            <div class="">
                                @error('facebook_url')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Instagram Url</label>
                                <input type="text" class=" form-control " name="instagram_url" placeholder="Enter Instagram url" value="{{ $frontend->instagram_url }}">
                            </div>

                            <div class="">
                                @error('instagram_url')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
