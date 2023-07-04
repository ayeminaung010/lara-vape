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
                    <img src="{{ asset('dbImg/seo/'.$seo->seo_image) }}" width="300" height="300"  alt="">
                    <h5>SEO image</h5>
                </div>
                <div class="">
                    <img src="{{ asset('dbImg/seo/'.$seo->favicon) }}" width="200" height="200"  alt="">
                    <h5>Favicon</h5>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-7">
                    <form action="{{ route('seo.store') }}" enctype="multipart/form-data" class=" " method="POST">
                        @csrf
                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Image</label>
                                <input type="file" class=" form-control" name="seo_image"  value="">
                            </div>
                            <div class="">
                                @error('seo_image')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Favicon</label>
                                <input type="file" class=" form-control" name="favicon"  value="">
                            </div>
                            <div class="">
                                @error('favicon')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Title</label>
                                <input type="text" class=" form-control " name="title" placeholder="Enter Title" value="{{ $seo->title }}">
                            </div>

                            <div class="">
                                @error('title')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Description</label>
                                <textarea name="description" class="  form-control" id="" cols="30" rows="10" placeholder="Enter Description">{{ $seo->description }}</textarea>
                            </div>
                            <div class="">
                                @error('description')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Keywords</label>
                                <input type="text" class=" form-control" name="keywords" placeholder="Enter Keywords" value="{{ $seo->keywords }}">
                            </div>
                            <div class="">
                                @error('keywords')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Author</label>
                                <input type="text" class=" form-control" name="author" placeholder="Enter Author Name" value="{{ $seo->author }}">
                            </div>
                            <div class="">
                                @error('author')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Socail Title</label>
                                <input type="text" class=" form-control" name="social_title" placeholder="Enter Social Title" value="{{ $seo->social_title }}">
                            </div>
                            <div class="">
                                @error('social_title')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class=" my-2 input-group input-group-outline">
                            <div class=" d-flex flex-column w-75">
                                <label for="">Socail Description</label>
                                <textarea name="social_description" placeholder="Enter Social Description" class=" form-control" id="" cols="30" rows="10">{{ $seo->social_description }}</textarea>
                            </div>
                            <div class="">
                                @error('social_description')
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
