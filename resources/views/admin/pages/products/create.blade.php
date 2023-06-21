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
            <form action="" method="POST">
                @csrf
                <div class=" form-group">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="">
                        <label class="form-label">Category Name</label>
                        <select name="" class="  form-select px-4" id="">
                            <option value="" selected disabled>Choose One</option>
                        </select>
                    </div>
                    <div class="">
                        <label class="form-label">Brand Name</label>
                        <select name="" class=" form-select px-4" id="">
                            <option value="" selected disabled>Choose One</option>
                        </select>
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Original Price</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Discount Price</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Stock</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="">
                        <label class="form-label">Product Image</label>
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
