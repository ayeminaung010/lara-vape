@extends('templates.layouts.app')
@section('content')
    <main>
        <!-- breadcrumb section  -->
        <section id="breadcrumb" class="container mt-3">
            <nav aria-label="breadcrumb">
                @php
                    $url = URL::current(); // Get the current URL
                    $urlWithoutQueryParams = strtok($url, '?'); // Remove the query parameters
                    $segments = explode('/', trim($urlWithoutQueryParams, '/'));
                    $breadCrumbName = end($segments);
                @endphp

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}"><small>Home</small></a>
                    </li>
                    <li class="breadcrumb-item " aria-current="page">
                        <small>{{ $breadCrumbName }}</small>
                    </li>
                </ol>
            </nav>
        </section>

        <!-- title section  -->
        <section id="title">
            <div class="container">
                <h1 class="fw-bold text-center">
                    {{ $breadCrumbName ? ucwords(str_replace(['-', ' '], ['', 'php'], $breadCrumbName)) : 'Products' }}</h1>
                <p class="text-center fw-medium mt-4">
                    Check out all of our brand new vapes, e-liquid, coils and
                    accessories here! If you're looking to get your hands on the latest
                    and greatest vaping products, there's no place you need to look
                    other than VAPO.
                </p>
            </div>
        </section>

        <!-- new products & filter section  -->
        <section class="container my-5" id="products">
            <div class="row">
                <div class="col-lg-2">
                    <form action="{{ URL::current() }}" method="GET">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6>Sort</h6>
                            <div class="">
                                <button type="submit" class="btn btn-info">Fliter</button>
                                <a href="{{ url()->current() }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                        <hr />
                        <!-- collapse start  -->
                        <div>
                            <div class="d-flex align-items-center justify-content-between" data-bs-toggle="collapse"
                                href="#categoryCollapse" role="button" aria-expanded="false"
                                aria-controls="collapseExample">
                                <h6>Category</h6>
                                <i class="bi bi-caret-down"></i>
                            </div>
                        </div>
                        <div class="collapse" id="categoryCollapse">
                            @foreach ($subCategories as $subCategory)
                                <div class="d-flex align-items-center my-2  justify-content-between">
                                    <small>{{ $subCategory->name }} ({{ $subCategory->productsCount() }}) </small>
                                    <input type="checkbox" id="" name="category[]"
                                        value="{{ $subCategory->id }}" class=" form-check-input"
                                        {{ in_array($subCategory->id, request()->input('category', [])) ? 'checked' : '' }}>
                                </div>
                            @endforeach
                        </div>
                        <!-- collapse end  -->
                        <hr />
                        <div>
                            <div class="d-flex align-items-center justify-content-between" data-bs-toggle="collapse"
                                href="#colorCollapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <h6>Color</h6>
                                <i class="bi bi-caret-down"></i>
                            </div>
                        </div>
                        <div class="collapse" id="colorCollapse">
                            @foreach ($productColors as $color)
                                <div class="d-flex align-items-center my-2  justify-content-between">
                                    <small>{{ $color->name }} </small>
                                    <input type="checkbox" id="" name="color[]" value="{{ $color->name }}"
                                        class=" form-check-input"
                                        {{ in_array($color->name, request()->input('color', [])) ? 'checked' : '' }}>
                                </div>
                            @endforeach
                        </div>
                        <!-- collapse end  -->
                        <hr />
                        <div>
                            <div class="d-flex align-items-center justify-content-between" data-bs-toggle="collapse"
                                href="#brandCollapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <h6>Brand</h6>
                                <i class="bi bi-caret-down"></i>
                            </div>
                        </div>
                        <div class="collapse" id="brandCollapse">
                            @foreach ($brands as $brand)
                                <div class="d-flex align-items-center my-2  justify-content-between">
                                    <small>{{ $brand->name }} </small>
                                    <input type="checkbox" id="" name="brand[]" value="{{ $brand->id }}"
                                        class=" form-check-input"
                                        {{ in_array($brand->id,request()->input('brand', [])) ? 'checked' : '' }}>
                                </div>
                            @endforeach
                        </div>
                    </form>
                </div>

                <div class="col-lg-10">
                    <div class="d-flex flex-wrap justify-content-between px-3">
                        <h6>{{ count($products) }} products found</h6>
                    </div>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach ($products as $product)
                            <div class="own-card overflow-hidden border-0 position-relative">
                                <a href="" class="position-absolute end-0  z-3" style="top: 50px;">
                                    <i class="bi bi-heart fs-5"></i>
                                </a>
                                <input type="hidden" name="product_id" class="productId" value="{{ $product->id }}">
                                <div class="image overflow-hidden">
                                    <a href="{{ route('product.detail', $product->id) }}">
                                        <img src="{{ asset('dbImg/products/' . $product->image) }}" height="300"
                                            class=" w-100 own-card-image" alt="{{ $product->name }}" />
                                    </a>
                                </div>
                                <input type="hidden" value="{{ $product->stock }}" class="productStock">
                                <div class="card-body">
                                    <em class="text-danger">New</em>
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
                                <div class="addToCartContainer bg-white pt-4">
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

                    <div class="">
                        <hr>
                        {{ $products->links() }}
                        <hr>
                    </div>

                    <!-- discover products start  -->
                    <section id="discover-products" class="mt-5 container">
                        <div class="mb-4">
                            <h5>Discover products recommended just for you!</h5>
                        </div>
                        <div class=" d-flex flex-wrap  gap-4">
                            @foreach (App\Models\Products::paginate('5') as $product)
                                <div class="own--small--card">
                                    <a href="{{ route('product.detail', $product->id) }}">
                                        <img src="{{ asset('dbImg/products/' . $product->image) }}" height="200"
                                            class="w-100 product--image" alt="" />
                                        <div class="d-flex justify-content-between mt-3">
                                            <h6 class="product--name w-50"><a
                                                    href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a>
                                            </h6>
                                            @if ($product->discount_price)
                                                <div class="d-flex gap-2 flex-wrap">
                                                    <h6 class="discount-price">{{ $product->discount_price }}Kyats</h6>
                                                    <h6 class="current-price"><del>{{ $product->original_price }}
                                                            Kyats</del></h6>
                                                </div>
                                            @else
                                                <h6 class="current-price">{{ $product->original_price }}Kyats</h6>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>
@endsection
