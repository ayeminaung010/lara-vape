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
                        <h6>{{ count($products) }} products found</h6>
                        <select name="" class="w-25 form-control rounded-0" id="">
                            <option value="">Position</option>
                        </select>
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
                                    @if ($product->color !== "null")
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
@section('js')
    <script>
        const addToCartBtns = document.querySelectorAll('.addToCartBtn');

        const cartBox = document.querySelector('.cartBox');
        document.addEventListener('click', e => {
            if (e.target.matches('.addToCartBtn')) {
                const container = e.target.closest('.own-card');
                const product_id = container.querySelector('.productId').value;
                const productName = container.querySelector('.product-name').innerText;
                const product_image = container.querySelector('.own-card-image').src;
                const product_color = container.querySelector('.color_name')?.value;
                const product_price = container.querySelector('.discount-price') ? container.querySelector(
                        '.discount-price').getAttribute('data-price') : container.querySelector('.current-price')
                    .getAttribute('data-price');
                const user_id = document.querySelector('.user_id')?.value;
                const quantity = 1;

                const cartData = {
                    'id': product_id,
                    'title': productName,
                    'price': product_price,
                    'image': product_image,
                    'color' : product_color ? product_color : ''
                }
                if (user_id !== undefined) {
                    const data = {
                        'product_id': product_id,
                        'quantity': quantity,
                        'user_id': user_id,
                        'color' : product_color ? product_color : ''
                    }
                    axios.post('addToCart', {
                            data
                        })
                        .then(function(response) {
                            console.log(response);
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                }
                createItemInCart(cartData);
            }
        })
        window.inc = function (event,price){
            const currentCart = event.target.closest('.item-in-cart');
            const cartQuantity = currentCart.querySelector('.cart-quantity');
            const cartCost = currentCart.querySelector('.cart-cost');
            cartQuantity.valueAsNumber += 1;
            cartCost.innerHTML = (price * cartQuantity.valueAsNumber);
            // updateTotalCost();

        }


        window.dec = function (event,price){
            const currentCart = event.target.closest('.item-in-cart');
            const cartQuantity = currentCart.querySelector('.cart-quantity');
            const cartCost = currentCart.querySelector('.cart-cost');
            if(cartQuantity.valueAsNumber === 1){
                return;
            }else{
                cartQuantity.valueAsNumber -= 1;
            }
            cartCost.innerHTML = (price * cartQuantity.valueAsNumber);
            // updateTotalCost();
        }
        window.removeItem = function(event){
            const currentCart = event.target.closest('.item-in-cart');
            currentCart.remove();
            // updateTotalCost();
        }

        // window.clearCart = function(event){
        //     console.log(event);
        //     const currentCart = event.target.closest('.cartBox');
        //     currentCart.remove();
        //     // updateTotalCost();
        // }

        const createItemInCart = ({
            id,
            title,
            price,
            image,
            color
        }) => {
            const div = document.createElement('div');
            div.classList.add('item-in-cart', 'p-3')
            div.innerHTML = `
                    <div class=" card border p-3 relative">
                        <div class=" d-flex flex-column gap-2">
                            <div class="card-img-container">
                                <img src="${image}" width="100" height="100" class="card-item-img">
                            </div>
                            <p class=" fw-bold small">${title}</p>
                            <small>${color}</small>
                        </div>
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class=" col-5">
                                <div class=" cart-item-quantity input-group input-group-sm">
                                    <button class="btn btn-primary" onclick='dec(event,${price})'>
                                        <i class=" bi bi-dash pe-none"></i>
                                    </button>
                                    <input type="number" class="cart-quantity form-control text-center" value="1">
                                    <button class="btn btn-primary" onclick='inc(event,${price})'>
                                        <i class=" bi bi-plus pe-none"></i>
                                    </button>
                                </div>
                            </div>
                            <div class=" col-5">
                                <p> <span class='cart-cost'>${price}</span> Kyats</p>
                            </div>
                        </div>
                        <div class=" position-absolute  " style="top:10px;right:10px">
                            <button onclick="removeItem(event)" class="btn btn-outline-danger ">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </div>
                    </div>
                    `;
            cartBox.append(div)
            // updateTotalCost();
        }
    </script>
@endsection
