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
                <h5>Create Product Type</h5>
            </div>
            <form action="" method="POST">
                @csrf
                <div class=" form-group">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="">
                        <label class="form-label">Slug</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <label class="form-label">Image</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="file" class="form-control">
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
