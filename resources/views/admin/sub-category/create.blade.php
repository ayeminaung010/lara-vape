@extends('admin.layouts.app')

@section('btn')
    <a href="{{ route('subCategory.index') }}" class=" btn btn-dribbble">
        Back
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-5 offset-2 shadow py-4 px-3">
            <div class="">
                <h5>Create Sub Category</h5>
            </div>
            <form action="{{ route('subCategory.store') }}" method="POST">
                @csrf
                <div class=" form-group">
                    <div class="input-group input-group-outline my-3">
                        <input type="text" name="name" placeholder="Name" class="form-control">
                    </div>
                    <div class="">
                        @error('name')
                            <small class=" text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="">
                        <select name="category_id" class=" form-select px-4" id="">
                            <option value="" selected disabled>Choose One</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        @error('category_id')
                            <small
                                class=" text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="mt-2 btn btn-behance">
                        Create
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
