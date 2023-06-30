@extends('admin.layouts.app')

@section('btn')
<a href="{{ route('product_type.index') }}" class=" btn btn-dribbble">
    Back
</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-5 offset-2 shadow py-4 px-3">
            <div class="">
                <h5>Edit Product Type</h5>
            </div>
            <form action="{{ route('product_type.update',$productType->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class=" form-group">
                    <div class="">
                        <img src="{{ asset('dbImg/product-type/'.$productType->image)  }}" alt="">
                    </div>
                    <div class="">
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="name" value="{{ old('name',$productType->name) }}" placeholder="Enter Name" class="form-control">
                        </div>
                        <div class="">
                            @error('name')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="">
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="slug" value="{{ old('slug',$productType->slug) }}"  placeholder="Enter Slug Name" class="form-control">
                        </div>
                        <div class="">
                            @error('slug')
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
