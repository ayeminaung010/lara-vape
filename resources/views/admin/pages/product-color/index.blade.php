@extends('admin.layouts.app')
@section('btn')
    <a href="{{ route('productColor.create') }}" class=" btn btn-dribbble">
        Add Colors
    </a>
@endsection
@section('content')
    <div class="container-fluid py-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Fail!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-end">
                    <div class="col-lg-3">
                        <form action="{{ route(Route::currentRouteName()) }}" method="GET">
                            @csrf
                            <div class=" d-flex  ">
                                <input type="text" name="search" placeholder="Search You Wish" class="form-control">
                                <button type="submit" class=" btn btn-dark">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Product Colors </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        @if ($colors)
                            <div class="table-responsive p-0">
                                @if (count($colors) > 0)
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    id</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    name</th>
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
                                            @foreach ($colors as $key => $color)
                                                <tr>
                                                    <td>
                                                        {{ ($colors->currentPage() - 1) * 10 + $key + 1 }}
                                                    </td>
                                                    <td>
                                                        {{ $color->name }}
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $color->created_at->format('d-m-Y') }}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="d-flex gap-3">
                                                            <a href="javascript:;"
                                                                class="text-info font-weight-bold text-xs"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editModal{{ $color->id }}"
                                                                data-toggle="tooltip" data-original-title="Edit user">
                                                                Edit
                                                            </a>
                                                            <a href="javascript:;"
                                                                class="text-danger font-weight-bold text-xs"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal{{ $color->id }}"
                                                                data-toggle="tooltip" data-original-title="Edit user">
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- edit Modal -->
                                                <div class="modal fade" id="editModal{{ $color->id }}" tabindex="-1"
                                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" >
                                                                    Edit Color</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('productColor.update',$color->id) }}" method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class=" form-group">
                                                                        <div class="input-group input-group-outline my-3">
                                                                            <input type="text" name="name"
                                                                                placeholder="Name" class="form-control"
                                                                                value="{{ $color->name }}">
                                                                        </div>
                                                                        <div class="">
                                                                            @error('name')
                                                                                <small
                                                                                    class=" text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            <!-- delete Modal -->
                                            <div class="modal fade" id="deleteModal{{ $color->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" >
                                                                Delete Color</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('productColor.destroy',$color->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-body">
                                                                Are you sure to delete this color?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
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
                <div class="">
                    {{ $colors->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
