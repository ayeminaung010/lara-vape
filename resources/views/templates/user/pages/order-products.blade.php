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
                            <a href="{{ route('getFav') }}">
                                <li class=" bg-body-tertiary text-uppercase @if(Route::currentRouteName() == 'getFav') user_active @endif py-3 px-4">My Favourites</li>
                            </a>
                            <hr>
                            <form action="{{ route('logout') }}" class="" method="POST">
                                @csrf
                                <button type="submit" class="bg-body-tertiary  w-100 text-uppercase py-3 border-0">LogOut</button>
                            </form>
                        </ul>
                    </div>
                    <div class="col-lg-7 p-5">
                        @if (count($orderDetails) !== 0)
                            <table>
                                <thead>
                                  <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($orderDetails as $o )
                                  <tr>
                                    <td data-label="Item">{{ $o->name}}</td>
                                    <td data-label="Image">
                                        <a href="{{ route('product.detail',$o->product_id) }}" class=" btn btn-dark rounded-0">
                                            <img src="{{ asset('dbImg/products/'.$o->image) }}" width="100" height="100" alt="">
                                        </a>
                                    </td>
                                    <td data-label="Color">{{ $o->product_color }}</td>
                                    <td data-label="Quantity">{{ $o->quantity }}</td>
                                    <td data-label="Total Price">{{ $o->total_price}} Kyats</td>
                                  </tr>
                                @endforeach
                                </tbody>
                              </table>
                            <div class="mt-3">
                                {{ $orderDetails->links() }}
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
