@extends('admin.layouts.app')

@section('btn')
<a href="{{ route('review.index') }}" class=" btn btn-dribbble">
    Back
</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-5 offset-2 shadow py-4 px-3">
            <div class="">
                <h5>Create Review</h5>
            </div>
            <form action="{{ route('review.store') }}" method="POST">
                @csrf
                <div class=" form-group">

                    <div class="">
                        <div class="input-group input-group-outline my-3">
                            <input type="text"  name="title" value="{{ old('title') }}" placeholder="Enter Title" class="form-control">
                        </div>
                        <div class="">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="input-group input-group-outline my-3">
                            <textarea name="message" placeholder="Enter Message" class=" form-control" id="" cols="30" rows="10">{{ old('message') }}</textarea>
                        </div>
                        <div class="">
                            @error('message')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="input-group input-group-outline my-3">
                            <input type="number" placeholder="Enter rating" name="rating" value="{{ old('rating') }}" class="form-control">
                        </div>
                        <div class="">
                            @error('rating')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="input-group input-group-outline my-3">
                            <input type="text" placeholder="Enter Reviewer Name" value="{{ old('reviewer_name') }}" name="reviewer_name" class="form-control">
                        </div>
                        <div class="">
                            @error('reviewer_name')
                                <small class="text-danger">{{ $message }}</small>
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
