@extends('admin.layouts.app')
@section('btn')
<a href="{{ route('product_type.create') }}" class=" btn btn-dribbble">
    Add Product Type
</a>
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Product Type</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        @if ($brands)
                        <div class="table-responsive p-0">
                            @if (count($brands) > 0)
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            id</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Slug</th>
                                        <th
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            image</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Date</th>
                                        {{-- <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            action</th> --}}
                                        {{-- <th class="text-secondary opacity-7"></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        
                                        <td>

                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex gap-3">
                                                <a href="javascript:;" class="text-info font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>
                                                <a href="javascript:;" class="text-danger font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Delete
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            @else
                            <div class=" text-center">
                                <h4>There is no Items</h4>
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
