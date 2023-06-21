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
            <form action="" method="POST">
                @csrf
                <div class=" form-group">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="">
                        <label class="form-label">Message</label>
                        <div class="input-group input-group-outline my-3">
                            <textarea name="" class=" form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="">
                        <label class="form-label">Rating</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <label class="form-label">Reviewer Name</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="text" class="form-control">
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
