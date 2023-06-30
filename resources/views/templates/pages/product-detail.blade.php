@extends('templates.layouts.app')
@section('content')
<main>
    <!-- breadcrumb section  -->
    <section id="breadcrumb" class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#"><small>Home</small></a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <small>New Products</small>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <small>Product item</small>
                </li>
            </ol>
        </nav>
    </section>

    <section id="product-detail" class="container">
        <div class="row justify-content-evenly">
            <div class="col-lg-6">
                <div class=" d-flex justify-content-center">
                    <img src="{{ asset('dbImg/products/'.$product->image) }}" class="w-100" alt="" />
                </div>
            </div>
            <div class="col-lg-6 py-4">
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex flex-column">
                        <h3 class="fw-bold " >{{ $product->name }}</h3>
                        <span class="fs-5">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </span>
                    </div>
                    <div class="">
                        <select name="" class="form-control mt-4 w-75" id="">
                            <option value="">Choose an Type</option>
                        </select>
                    </div>
                    <div class="">
                        @if ($product->discount_price)
                            <span class="discount-price h4">{{ $product->discount_price }} Kyats</span>
                            <span class="current-price"><del>{{ $product->original_price }}Kyats</del>
                            </span>
                        @else
                            <h6 class="current-price h4">{{ $product->original_price }} Kyats</h6>
                        @endif
                    </div>
                    <div class="d-flex gap-2 flex-wrap">
                        <button class="btn btn-dark rounded-0" id="removeQty" >-</button>
                        <input type="number" class="form-control" id="quantity" style="width: 100px" max="{{ $product->stock }}" min="1" value="1" />
                        <button class="btn btn-dark rounded-0" id="addQty">+</button>
                    </div>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="col-lg-7">
                            <button class="btn btn-dark text-uppercase w-100 rounded-0 py-3">
                                Add to Cart
                            </button>
                        </div>
                        <div class="col-lg-3">
                            <a href="#" class="btn btn-outline-dark rounded-0 p-3">
                                <i class="bi bi-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="fw-bold text-uppercase">Product Description</h6>
                        <p>
                            {{ $product->description }}
                        </p>
                        <span class="text-decoration-underline">Read more</span>
                    </div>
                </div>
            </div>
            <hr />
        </div>
    </section>

    <section id="top-rate-products" class="my-5">
        <div class="container py-5">
            <h5 class="text-black-50">Other top rated products</h5>
        </div>

        <div class="container">
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej-1280x720.png"
                            class="w-100" alt="" />
                        <div class="mt-3">
                            <h6 class="product-name">UWELL Caliburn A3 Pod Kit</h6>
                            <span class="fs-6">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </span>
                            (2000)
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej-1280x720.png"
                            class="w-100" alt="" />
                        <div class="mt-3">
                            <h6 class="product-name">UWELL Caliburn A3 Pod Kit</h6>
                            <span class="fs-6">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </span>
                            (2000)
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej-1280x720.png"
                            class="w-100" alt="" />
                        <div class="mt-3">
                            <h6 class="product-name">UWELL Caliburn A3 Pod Kit</h6>
                            <span class="fs-6">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </span>
                            (2000)
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej-1280x720.png"
                            class="w-100" alt="" />
                        <div class="mt-3">
                            <h6 class="product-name">UWELL Caliburn A3 Pod Kit</h6>
                            <span class="fs-6">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </span>
                            (2000)
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej-1280x720.png"
                            class="w-100" alt="" />
                        <div class="mt-3">
                            <h6 class="product-name">UWELL Caliburn A3 Pod Kit</h6>
                            <span class="fs-6">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </span>
                            (2000)
                        </div>
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </section>

    <section id="review">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-0" id="home-tab" data-bs-toggle="tab"
                        data-bs-target="#review_tab" type="button" role="tab" aria-controls="review_tab"
                        aria-selected="true">
                        Review
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="review_tab" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div class="mt-5">
                        <h6>3 Reviews</h6>
                        <div class="d-flex flex-wrap gap-4">
                            <div class="bg-secondary rounded-pill justify-content-center d-flex align-items-center text-white"
                                style="height: 60px; width: 60px">
                                A
                            </div>
                            <div class="flex gap-3 flex-column align-items-center">
                                <div class="d-flex align-items-center gap-3">
                                    <h6>THOMAS P.</h6>
                                    <span>
                                        <small>24/02/23</small>
                                    </span>
                                </div>
                                <span class="fs-6">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </span>
                                <div class="">
                                    <h5 class="text-black-50 fw-bold">Title</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Impedit quasi repellat incidunt? Illum deleniti non
                                        optio unde dolores rem ad?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="similar-products" class="my-5">
        <div class="container py-5">
            <h5 class=" ">Discover similar products!</h5>
        </div>

        <div class="container">
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej-1280x720.png"
                            class="w-100" alt="" />
                        <div class="d-flex justify-content-between mt-3">
                            <h6 class="brand-name">UWELL</h6>
                            <p>$39.99</p>
                        </div>
                        <div class="">
                            <h5 class="product-name">UWELL Caliburn A3 Pod Kit</h5>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej-1280x720.png"
                            class="w-100" alt="" />
                        <div class="d-flex justify-content-between mt-3">
                            <h6 class="brand-name">UWELL</h6>
                            <p>$39.99</p>
                        </div>
                        <div class="">
                            <h5 class="product-name">UWELL Caliburn A3 Pod Kit</h5>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej-1280x720.png"
                            class="w-100" alt="" />
                        <div class="d-flex justify-content-between mt-3">
                            <h6 class="brand-name">UWELL</h6>
                            <p>$39.99</p>
                        </div>
                        <div class="">
                            <h5 class="product-name">UWELL Caliburn A3 Pod Kit</h5>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej-1280x720.png"
                            class="w-100" alt="" />
                        <div class="d-flex justify-content-between mt-3">
                            <h6 class="brand-name">UWELL</h6>
                            <p>$39.99</p>
                        </div>
                        <div class="">
                            <h5 class="product-name">UWELL Caliburn A3 Pod Kit</h5>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej-1280x720.png"
                            class="w-100" alt="" />
                        <div class="d-flex justify-content-between mt-3">
                            <h6 class="brand-name">UWELL</h6>
                            <p>$39.99</p>
                        </div>
                        <div class="">
                            <h5 class="product-name">UWELL Caliburn A3 Pod Kit</h5>
                        </div>
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('js')
<script>
    const quantity = document.querySelector('#quantity');
    const removeQty = document.querySelector('#removeQty');
    const addQty = document.querySelector('#addQty');
    const quantityNo = parseInt(quantity.value);
    let count = quantityNo;

    removeQty.addEventListener('click',removeQuantity);
    addQty.addEventListener('click',addQuantity);
    console.log(quantity.max);
    function removeQuantity(){
        if(count > 1) {
            count--;
            quantity.value = count;
        }
    }

    function addQuantity(){
        if(count < quantity.max){
            count++;
            quantity.value = count;
        }
    }
</script>

@endsection
