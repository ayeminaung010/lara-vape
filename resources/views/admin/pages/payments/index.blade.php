@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
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
                            <h6 class="text-white text-capitalize ps-3">User Payments</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        @if ($userPayments)
                        <div class="table-responsive p-0">
                            @if (count($userPayments) > 0)
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            id</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            User</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            image</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            status</th>
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
                                 @foreach ($userPayments as $key=>$p)
                                 <tr>
                                    <td>
                                        {{ ($userPayments->currentPage() - 1) * 10 + $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $p->user->first_name . " " . $p->user->last_name }}
                                    </td>
                                    <td>
                                        <img src="{{ asset("dbImg/payments/".$p->image) }}" width="200" height="100" alt="">
                                    </td>
                                    <td>
                                        @if ($p->status == '0')
                                            <button class="btn btn-warning">
                                                Pending...
                                            </button>
                                        @elseif ($p->status == '1')
                                            <button class="btn btn-success">
                                                Success
                                            </button>
                                        @else
                                            <button class="btn btn-danger">
                                                Rejected
                                            </button>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $p->created_at->format('d-m-Y') }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex gap-3">
                                            <a href="{{ route('payments.show',$p->id) }}" class="text-info font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Detail
                                            </a>
                                        </div>
                                    </td>
                                </tr>
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
            </div>
        </div>
    </div>
@endsection
