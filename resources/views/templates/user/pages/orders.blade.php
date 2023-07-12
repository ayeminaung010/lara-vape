@extends('templates.layouts.app')

@section('content')
    <main>
        <section id="login-section">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-lg-3 ">
                        <ul class=" list-unstyled p-4">
                            <a href="{{ route('user.profile') }}">
                                <li
                                    class=" bg-body-tertiary @if (Route::currentRouteName() == 'user.profile') user_active @endif text-uppercase  py-3 px-4">
                                    My Profile</li>
                            </a>
                            <a href="{{ route('user.passwordChange') }}">
                                <li
                                    class=" bg-body-tertiary text-uppercase @if (Route::currentRouteName() == 'user.passwordChange') user_active @endif py-3 px-4">
                                    Password Change</li>
                            </a>
                            <a href="{{ route('user.orderLists') }}">
                                <li
                                    class=" bg-body-tertiary text-uppercase @if (Route::currentRouteName() == 'user.orderLists') user_active @endif  py-3 px-4">
                                    My Orders</li>
                            </a>
                            <a href="{{ route('user.history') }}">
                                <li
                                    class=" bg-body-tertiary text-uppercase @if (Route::currentRouteName() == 'user.history') user_active @endif  py-3 px-4">
                                    My History</li>
                            </a>
                            <a href="{{ route('getFav') }}">
                                <li
                                    class=" bg-body-tertiary text-uppercase @if (Route::currentRouteName() == 'getFav') user_active @endif py-3 px-4">
                                    My Favourites</li>
                            </a>
                            <hr>
                            <form action="{{ route('logout') }}" class="" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-body-tertiary  w-100 text-uppercase py-3 border-0">LogOut</button>
                            </form>
                        </ul>
                    </div>
                    <div class="col-lg-7 p-5">
                        @if (count($orders) !== 0)
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Order Code</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $o)
                                        <tr>
                                            <td data-label="Date">{{ $o->created_at->format('d-M-Y') }}</td>
                                            <td data-label="Order Code"><a
                                                    href="{{ route('user.orderDetail', $o->order_code) }}"
                                                    class=" btn btn-dark rounded-0">{{ $o->order_code }} </a></td>
                                            <td data-label="Total Price">{{ $o->total_price }} Kyats</td>
                                            <td data-label="Status">
                                                @if ($o->status == 0)
                                                    <span class="text-warning"> <i class="bi bi-arrow-clockwise"></i>
                                                        Pending..</span>
                                                @elseif($o->status == 1)
                                                    <span class="text-success"> <i class="bi bi-check-circle"></i>
                                                        Success</span>
                                                @elseif($o->status == 2)
                                                    <span class="text-danger"> <i class="bi bi-cart-x"></i> Reject</span>
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
