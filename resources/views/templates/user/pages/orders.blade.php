@extends('templates.layouts.app')

@section('content')
    <main>
        <section id="login-section">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-lg-3 ">
                        <ul class=" list-unstyled p-4">
                            <a href="{{ route('user.profile') }}">
                                <li class=" bg-body-tertiary @if(Route::currentRouteName() == 'user.profile') user_active @endif text-uppercase  py-3 px-4">My Profile</li>
                            </a>
                            <a href="{{ route('user.passwordChange') }}">
                                <li class=" bg-body-tertiary text-uppercase @if(Route::currentRouteName() == 'user.passwordChange') user_active @endif py-3 px-4">Password Change</li>
                            </a>
                            <a href="{{ route('user.orderLists') }}">
                                <li class=" bg-body-tertiary text-uppercase @if(Route::currentRouteName() == 'user.orderLists') user_active @endif  py-3 px-4">My Orders</li>
                            </a>
                            <a href="{{ route('user.history') }}">
                                <li class=" bg-body-tertiary text-uppercase @if(Route::currentRouteName() == 'user.history') user_active @endif  py-3 px-4">My History</li>
                            </a>
                            <a href="#">
                                <li class=" bg-body-tertiary text-uppercase  py-3 px-4">My Favourites</li>
                            </a>
                            <hr>
                            <form action="{{ route('logout') }}" class="" method="POST">
                                @csrf
                                <button type="submit" class="bg-body-tertiary  w-100 text-uppercase py-3 border-0">LogOut</button>
                            </form>
                        </ul>
                    </div>
                    <div class="col-lg-7 p-5">
                        @if (count($orders) !== 0)
                            <table class="table table-light table-borderless table-hover text-center mb-0" id="dataTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Date</th>
                                        <th>Order ID</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @foreach ($orders as $o )
                                        <tr>
                                            <td class="align-middle" > {{ $o->created_at->format('d-M-Y')}} </td>
                                            <td class="align-middle" >
                                                <a href="#" class=" btn btn-dark rounded-0">{{ $o->order_code}} </a>
                                            </td>
                                            <td class="align-middle" > {{ $o->total_price}} Kyats</td>
                                            <td class="align-middle" >
                                                @if ( $o->status == 0 )
                                                    <span class="text-warning">  Pending..</span>
                                                @elseif($o->status == 1)
                                                    <span class="text-success">  Success</span>
                                                @elseif($o->status == 2)
                                                    <span class="text-danger">  Reject</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $orders->links() }}
                            </div>
                        @else
                        <div class=" d-flex  flex-column justify-content-center align-items-center">
                            <p class="text-center fs-2 p-5">No Items! </p>
                            <a href="{{ route('products') }}" class="btn btn-dark rounded-0 ">GO SHOPPING</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
