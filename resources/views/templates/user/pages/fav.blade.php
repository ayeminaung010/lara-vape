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
                    <div class="col-lg-8 p-5">
                        @if (count($favProducts) !== 0)
                            <div class="d-flex flex-wrap gap-5">
                                @foreach ($favProducts as $product)
                                <div class="own--fav--card overflow-hidden shadow px-4 py-3 border-0 position-relative">
                                    <input type="hidden" name="product_id" class="productId" value="{{ $product->id }}">
                                    <div class=" my-2 text-end">
                                        <a href="#" class=" btn btn-outline-dark rounded-0 removeFavBtn"><i class="bi bi-x-circle removeFavBtn"></i></a>
                                    </div>
                                    <div class="image overflow-hidden">
                                        <a href="{{ route('product.detail', $product->id) }}">
                                            <img src="{{ asset('dbImg/products/' . $product->image) }}" height="200"
                                                class=" w-100 own-card-image object-fit-cover" alt="{{ $product->name }}" />
                                        </a>
                                    </div>
                                    <input type="hidden" value="{{ $product->stock }}" class="productStock">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center gap-4 justify-content-between mt-3">
                                            <a href="{{ route('product.detail', $product->id) }}">
                                                <h6 class="product-name fw-bold">
                                                    {{ $product->name }}
                                                </h6>
                                            </a>
                                            <div class="d-flex gap-2 flex-wrap">
                                                @if ($product->discount_price)
                                                    <h6 class="discount-price" data-price="{{ $product->discount_price }}">
                                                        {{ $product->discount_price }} Kyats</h6>
                                                    <h6 class="current-price"><del>{{ $product->original_price }}Kyats</del>
                                                    </h6>
                                                @else
                                                    <h6 class="current-price" data-price="{{ $product->original_price }}">
                                                        {{ $product->original_price }} Kyats</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="rating">
                                            <span class="fs-5">
                                                @php
                                                    $filledStars = floor($product->rating);
                                                    $halfStar = ($product->rating - $filledStars) >= 0.5;
                                                    $emptyStars = 5 - $filledStars - ($halfStar ? 1 : 0);
                                                @endphp

                                                @for ($i = 0; $i < $filledStars; $i++)
                                                    <i class="bi bi-star-fill"></i>
                                                @endfor

                                                @if ($halfStar)
                                                    <i class="bi bi-star-half"></i>
                                                @endif

                                                @for ($i = 0; $i < $emptyStars; $i++)
                                                    <i class="bi bi-star"></i>
                                                @endfor
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="mt-3">
                                {{ $favProducts->links() }}
                            </div>
                        @else
                        <div class=" d-flex  flex-column justify-content-center align-items-center">
                            <p class="text-center fs-2 p-5">No Favourite Items! </p>
                            <a href="{{ route('products') }}" class="btn btn-dark rounded-0 ">Add Favourite</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection


@section('js')
<script>
    document.addEventListener('click', e => {
        if (e.target.matches('.removeFavBtn')) {
            const container = e.target.closest('.own--fav--card');
            const product_id = container.querySelector('.productId')?.value;
            const user_id = document.querySelector('.user_id')?.value;

            console.log(product_id,user_id);
            const data = {
                'product_id': product_id,
                'user_id': user_id,
            }
            axios.post('/user/removeFav', {
                data
            })
            .then(function(response) {
                if(response?.data?.status == 'true'){
                    location.reload();
                }
            })
            .catch(function(error) {
                console.log(error);
            });
        }

    })
</script>
@endsection
