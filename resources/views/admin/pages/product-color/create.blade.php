@extends('admin.layouts.app')

@section('btn')
    <a href="{{ route('productColor.index') }}" class=" btn btn-dribbble">
        Back
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-5 offset-2 shadow py-4 px-3">
            <div class="">
                <h5>Create Color</h5>
            </div>
            <form action="{{ route('productColor.store') }}" method="POST">
                @csrf
                <div class=" form-group">
                    <div class="input-group input-group-outline my-3">
                        <input type="text" name="name" placeholder="Color Name" class="form-control">
                    </div>
                    <div class="">
                        @error('name')
                            <small class=" text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class=" btn btn-behance">
                        Create
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
