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
                <li class="breadcrumb-item active" aria-current="page">
                    <small>new Product</small>
                </li>
            </ol>
        </nav>
    </section>

    <!-- title section  -->
    <section id="title">
        <div class="container">
            <h1 class="fw-bold text-center">New Products</h1>
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
                <div class="d-flex align-items-center justify-content-between">
                    <h6>Filter</h6>
                    <button class="btn btn-secondary">Reset</button>
                </div>
                <hr />
                <!-- collapse start  -->
                <div>
                    <div class="d-flex align-items-center justify-content-between" data-bs-toggle="collapse"
                        href="#categoryCollapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <h6>Category</h6>
                        <i class="bi bi-caret-down"></i>
                    </div>
                </div>
                <div class="collapse" id="categoryCollapse">
                    <div class="d-flex align-items-center  justify-content-between">
                        <small>New Pod Kits (20) </small>
                        <input type="checkbox" id="" class=" form-check-input">
                    </div>
                    <div class="d-flex align-items-center  justify-content-between">
                        <small> Pod Kits (0) </small>
                        <input type="checkbox" class=" form-check-input" id="">
                    </div>
                </div>
                <!-- collapse end  -->
                <hr />
                <!-- collapse start  -->
                <div>
                    <div class="d-flex align-items-center justify-content-between" data-bs-toggle="collapse"
                        href="#resistanceCollapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <h6>Resistance</h6>
                        <i class="bi bi-caret-down"></i>
                    </div>
                </div>
                <div class="collapse" id="resistanceCollapse">
                    <div class="d-flex align-items-center  justify-content-between">
                        <small>New Pod Kits (20) </small>
                        <input type="checkbox" id="" class=" form-check-input">
                    </div>
                    <div class="d-flex align-items-center  justify-content-between">
                        <small> Pod Kits (0) </small>
                        <input type="checkbox" class=" form-check-input" id="">
                    </div>
                </div>
                <!-- collapse end  -->
                <hr />
                <!-- collapse start  -->
                <div>
                    <div class="d-flex align-items-center justify-content-between" data-bs-toggle="collapse"
                        href="#typeCollapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <h6>Type</h6>
                        <i class="bi bi-caret-down"></i>
                    </div>
                </div>
                <div class="collapse" id="typeCollapse">
                    <div class="d-flex align-items-center  justify-content-between">
                        <small>New Pod Kits (20) </small>
                        <input type="checkbox" id="" class=" form-check-input">
                    </div>
                    <div class="d-flex align-items-center  justify-content-between">
                        <small> Pod Kits (0) </small>
                        <input type="checkbox" class=" form-check-input" id="">
                    </div>
                </div>
                <hr />
                <!-- collapse start  -->
                <div>
                    <div class="d-flex align-items-center justify-content-between" data-bs-toggle="collapse"
                        href="#brandCollapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <h6>Brand</h6>
                        <i class="bi bi-caret-down"></i>
                    </div>
                </div>
                <div class="collapse" id="brandCollapse">
                    <div class="d-flex align-items-center  justify-content-between">
                        <small>New Pod Kits (20) </small>
                        <input type="checkbox" id="" class=" form-check-input">
                    </div>
                    <div class="d-flex align-items-center  justify-content-between">
                        <small> Pod Kits (0) </small>
                        <input type="checkbox" class=" form-check-input" id="">
                    </div>
                </div>
            </div>

            <div class="col-lg-10">
                <div class="d-flex flex-wrap justify-content-between px-3">
                    <h6>100 products found</h6>
                    <select name="" class="w-25 form-control rounded-0" id="">
                        <option value="">Position</option>
                    </select>
                </div>
                <div class="d-flex flex-wrap gap-3">
                    <div class="own-card overflow-hidden border-0 position-relative">
                        <a href="" class="position-absolute end-0  z-3" style="top: 50px;">
                            <i class="bi bi-heart fs-5"></i>
                        </a>
                        <div class="image overflow-hidden">
                            <img src="./public/products/product1.jpg" class=" w-100 own-card-image" alt="" />
                        </div>
                        <div class="card-body">
                            <em class="text-danger">New</em>
                            <div class="d-flex align-items-center gap-4 justify-content-between">
                                <h6 class="product-name fw-bold">
                                    Hellvape EIR Replacement Pod (2 Pack)
                                </h6>
                                <div class="d-flex gap-2 flex-wrap">
                                    <h6 class="discount-price">5.99$</h6>
                                    <h6 class="current-price"><del>9.99$</del></h6>
                                </div>
                            </div>
                            <div class="rating">
                                <span class="fs-5">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </span>
                                <span>1 Review</span>
                            </div>
                        </div>
                        <div class="addToCartContainer bg-white pt-4">
                            <button class=" btn btn-dark rounded-0 text-uppercase w-100 mt-2 py-3 addToCartBtn">Add To
                                Cart</button>
                        </div>
                    </div>

                    <div class="own-card overflow-hidden border-0 position-relative">
                        <a href="" class="position-absolute end-0  z-3" style="top: 50px;">
                            <i class="bi bi-heart fs-5"></i>
                        </a>
                        <div class="image overflow-hidden">
                            <img src="./public/products/product1.jpg" class=" w-100 own-card-image" alt="" />
                        </div>
                        <div class="card-body">
                            <em class="text-danger">New</em>
                            <div class="d-flex align-items-center gap-4 justify-content-between">
                                <h6 class="product-name fw-bold">
                                    Hellvape EIR Replacement Pod (2 Pack)
                                </h6>
                                <div class="d-flex gap-2 flex-wrap">
                                    <h6 class="discount-price">5.99$</h6>
                                    <h6 class="current-price"><del>9.99$</del></h6>
                                </div>
                            </div>
                            <div class="rating">
                                <span class="fs-5">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </span>
                                <span>1 Review</span>
                            </div>
                        </div>
                        <div class="addToCartContainer bg-white pt-4">
                            <button class=" btn btn-dark rounded-0 text-uppercase w-100 mt-2 py-3 addToCartBtn">Add To
                                Cart</button>
                        </div>
                    </div>

                    <div class="own-card overflow-hidden border-0 position-relative">
                        <a href="" class="position-absolute end-0  z-3" style="top: 50px;">
                            <i class="bi bi-heart fs-5"></i>
                        </a>
                        <div class="image overflow-hidden">
                            <img src="./public/products/product1.jpg" class=" w-100 own-card-image" alt="" />
                        </div>
                        <div class="card-body">
                            <em class="text-danger">New</em>
                            <div class="d-flex align-items-center gap-4 justify-content-between">
                                <h6 class="product-name fw-bold">
                                    Hellvape EIR Replacement Pod (2 Pack)
                                </h6>
                                <div class="d-flex gap-2 flex-wrap">
                                    <h6 class="discount-price">5.99$</h6>
                                    <h6 class="current-price"><del>9.99$</del></h6>
                                </div>
                            </div>
                            <div class="rating">
                                <span class="fs-5">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </span>
                                <span>1 Review</span>
                            </div>
                        </div>
                        <div class="addToCartContainer bg-white pt-4">
                            <button class=" btn btn-dark rounded-0 text-uppercase w-100 mt-2 py-3 addToCartBtn">Add To
                                Cart</button>
                        </div>
                    </div>

                    <div class="own-card overflow-hidden border-0 position-relative">
                        <a href="" class="position-absolute end-0  z-3" style="top: 50px;">
                            <i class="bi bi-heart fs-5"></i>
                        </a>
                        <div class="image overflow-hidden">
                            <img src="./public/products/product1.jpg" class=" w-100 own-card-image" alt="" />
                        </div>
                        <div class="card-body">
                            <em class="text-danger">New</em>
                            <div class="d-flex align-items-center gap-4 justify-content-between">
                                <h6 class="product-name fw-bold">
                                    Hellvape EIR Replacement Pod (2 Pack)
                                </h6>
                                <div class="d-flex gap-2 flex-wrap">
                                    <h6 class="discount-price">5.99$</h6>
                                    <h6 class="current-price"><del>9.99$</del></h6>
                                </div>
                            </div>
                            <div class="rating">
                                <span class="fs-5">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </span>
                                <span>1 Review</span>
                            </div>
                        </div>
                        <div class="addToCartContainer bg-white pt-4">
                            <button class=" btn btn-dark rounded-0 text-uppercase w-100 mt-2 py-3 addToCartBtn">Add To
                                Cart</button>
                        </div>
                    </div>

                </div>

                <!-- discover products start  -->
                <section id="discover-products" class="mt-5 container">
                    <div class="mb-4">
                        <h5>Discover products recommended just for you!</h5>
                    </div>
                    <div class=" d-flex flex-wrap  gap-4">
                        <div class="own--small--card">
                            <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej-1280x720.png"
                                class="w-100 product--image" alt="" />
                            <div class="d-flex justify-content-between mt-3">
                                <h6 class="product--name w-50">UWELL Crown D Replacement Pod</h6>
                                <div class="d-flex gap-2 flex-wrap">
                                    <h6 class="discount-price">5.99$</h6>
                                    <h6 class="current-price"><del>9.99$</del></h6>
                                </div>
                            </div>
                        </div>
                        <div class="own--small--card">
                            <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej-1280x720.png"
                                class="w-100 product--image" alt="" />
                            <div class="d-flex justify-content-between mt-3">
                                <h6 class="product--name w-50">UWELL Crown D Replacement Pod</h6>
                                <div class="d-flex gap-2 flex-wrap">
                                    <h6 class="discount-price">5.99$</h6>
                                    <h6 class="current-price"><del>9.99$</del></h6>
                                </div>
                            </div>
                        </div>
                        <div class="own--small--card">
                            <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej-1280x720.png"
                                class="w-100 product--image" alt="" />
                            <div class="d-flex justify-content-between mt-3">
                                <h6 class="product--name w-50">UWELL Crown D Replacement Pod</h6>
                                <div class="d-flex gap-2 flex-wrap">
                                    <h6 class="discount-price">5.99$</h6>
                                    <h6 class="current-price"><del>9.99$</del></h6>
                                </div>
                            </div>
                        </div>
                        <div class="own--small--card">
                            <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej-1280x720.png"
                                class="w-100 product--image" alt="" />
                            <div class="d-flex justify-content-between mt-3">
                                <h6 class="product--name w-50">UWELL Crown D Replacement Pod</h6>
                                <div class="d-flex gap-2 flex-wrap">
                                    <h6 class="discount-price">5.99$</h6>
                                    <h6 class="current-price"><del>9.99$</del></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</main>
@endsection
