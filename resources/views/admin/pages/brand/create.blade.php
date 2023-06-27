@extends('admin.layouts.app')

@section('btn')
<a href="{{ route('brands.index') }}" class=" btn btn-dribbble">
    Back
</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-5 offset-2 shadow py-4 px-3">
            <div class="">
                <h5>Create Brand Name</h5>
            </div>
            <form action="{{ route('brands.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class=" form-group">
                    <div class="">
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="">
                            @error('name')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <label class="form-label">Image</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="">
                            @error('image')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button class=" btn btn-behance">
                        Create
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
