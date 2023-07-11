@extends('templates.layouts.app')
@section('content')
    <main>
        @php
            $request = request();
        @endphp
        <div class="container mt-4">
            <h2 class=" fw-bold">Search results for: {{ "'". $request->input('search') . "'" }} </h2>

        </div>


        <!-- new products & filter section  -->
        <section class="container my-5" id="products">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap justify-content-between px-3">
                        <h6>{{ count($products) }} products found</h6>
                    </div>
                    @if (count($products) > 0)
                    <div class="d-flex flex-wrap justify-content-start gap-5">
                        @foreach ($products as $product)
                            <div class="search-own-card overflow-hidden border-0 position-relative">
                                <input type="hidden" name="product_id" class="productId" value="{{ $product->id }}">
                                <div class="image overflow-hidden">
                                    <a href="{{ route('product.detail', $product->id) }}">
                                        <img src="{{ asset('dbImg/products/' . $product->image) }}" height="300"
                                            class=" w-100 own-card-image" alt="{{ $product->name }}" />
                                    </a>
                                </div>
                                <input type="hidden" value="{{ $product->stock }}" class="productStock">
                                <div class="card-body">
                                    {{-- <em class="text-danger">New</em> --}}
                                    <div class="d-flex align-items-center gap-4 justify-content-between">
                                        <h6 class="product-name fw-bold">
                                            {{ $product->name }}
                                        </h6>
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
                                <div class="addToCartContainer bg-white pt-4 mt-3">
                                    @if ($product->color !== 'null')
                                        <select name="" id="" class="color_name form-control">
                                            @foreach (json_decode($product->color) as $color)
                                                <option value="{{ $color }}">{{ $color }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                    <button class=" btn btn-dark rounded-0 text-uppercase w-100 mt-2 py-3 addToCartBtn">Add
                                        To
                                        Cart
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @else
                    <div class="d-flex flex-wrap flex-column align-items-center justify-content-center gap-5">
                        <h5 class="text-center">No Items Found</h5>
                        <div class="">
                            <strong>
                                <em>Please try another search term...</em>
                            </strong>
                        </div>
                    @endif

                </div>
            </div>
        </section>
    </main>
@endsection

