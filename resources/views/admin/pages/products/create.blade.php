@extends('admin.layouts.app')

@section('btn')
    <a href="{{ route('products.index') }}" class=" btn btn-dribbble">
        Back
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-5 offset-2 shadow py-4 px-3">
            <div class="">
                <h5>Create Product</h5>
            </div>
            <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class=" form-group">
                    <div class="my-3">
                        <div class="input-group input-group-outline ">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="">
                            @error('name')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="my-3">
                        <div class="input-group input-group-outline ">
                            <textarea name="description" id="" placeholder="Enter Description" class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div>
                        <div class="">
                            @error('description')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="">
                        <div class="">
                            <label class="form-label">Category Name</label>
                            <select name="subCategory_id" class="  form-select px-4" id="">
                                <option value="" selected disabled>Choose One</option>
                                @foreach ($subCategories as $subCategory )
                                    <option value="{{ $subCategory->id }}" @selected(old('subCategory_id') == $subCategory->id)>{{ $subCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            @error('subCategory_id')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="">
                        <div class="">
                            <label class="form-label">Sub Category Name</label>
                            <select name="subCategory_id" class="  form-select px-4" id="">
                                <option value="" selected disabled>Choose One</option>s
                                @foreach ($subCategories as $subCategory )
                                    <option value="{{ $subCategory->id }}" @selected(old('subCategory_id') == $subCategory->id)>{{ $subCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            @error('subCategory_id')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="">
                            <label class="form-label">Brand Name</label>
                            <select name="brand_id" class=" form-select px-4" id="">
                                <option value="" selected disabled>Choose One</option>
                                @foreach ($brands as $brand )
                                    <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            @error('brand_id')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="my-3">
                        <div class="input-group input-group-outline ">
                            <input type="number" placeholder="Enter Original Price" value="{{ old('original_price') }}" name="original_price" class="form-control">
                        </div>
                        <div class="">
                            @error('original_price')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="my-3">
                        <div class="input-group input-group-outline ">
                            <input type="number" placeholder="Enter Discount Price" value="{{ old('discount_price') }}" name="discount_price" class="form-control">
                        </div>
                        <div class="">
                            @error('discount_price')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="my-3">
                        <div class="input-group input-group-outline ">
                            <input type="number" placeholder="Enter Stock" value="{{ old('stock') }}" name="stock" class="form-control">
                        </div>
                        <div class="">
                            @error('stock')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="">
                        <div class=" d-flex flex-wrap  items-center justify-content-center gap-3 ">
                            @foreach ($colors as $key=>$color)
                                <div class="d-flex input-group-outline ">
                                    <input type="checkbox" id="color_{{ $key }}" value="{{ $color->name }}" name="color[]" style="height: 20px;width:20px" class=" form-checkbox">
                                    <label for="color_{{ $key }}">{{ $color->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="">
                            @error('color')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="">
                        <label class="form-label">Product Image</label>
                        <div class="input-group input-group-outline ">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="">
                            @error('image')
                                <small class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class=" btn btn-behance">
                        Create
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
