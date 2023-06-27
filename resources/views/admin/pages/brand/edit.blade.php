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
                <h5>Edit Brand Name</h5>
            </div>
            <form action="{{ route('brands.update',$brand->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class=" form-group">
                    <div class="">
                        <img src="{{ asset("dbImg/brands/".$brand->image) }}" width="200" height="200" alt="{{ $brand->name }}">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $brand->name }}">
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
                    <button type="submit" class=" btn btn-behance">
                        Save
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
