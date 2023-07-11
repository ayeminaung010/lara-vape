@extends('templates.layouts.app')

@section('css')
<style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: start
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 1em;
        font-size: 30px;
        font-weight: 300;
        color: black;
        cursor: pointer
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }

</style>
@endsection

@section('content')
<main>
    <!-- breadcrumb section  -->
    <section id="breadcrumb" class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}"><small>Home</small></a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <small>{{ $product->name }}</small>
                </li>
            </ol>
        </nav>
    </section>

    <section id="product-detail" class="container">
        <div class="row justify-content-evenly">
            <div class="col-lg-6">
                <div class=" d-flex justify-content-center">
                    <img src="{{ asset('dbImg/products/'.$product->image) }}" class="w-100 product_img" alt="" />
                </div>
            </div>
            <div class="col-lg-6 py-4">
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex flex-column">
                        <h3 class="fw-bold " >{{ $product->name }}</h3>
                        <span class="fs-5">
                            @php
                                $filledStars = floor($averageRating);
                                $halfStar = ($averageRating - $filledStars) >= 0.5;
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
                        <span>{{ '(' . count($reviews)." " .'reviews' .')' }}</span>
                    </div>
                    <div class="">
                       @if ($product->color != "null")
                        <select name="product_color" class="form-control mt-4 w-75 " id="product_color">
                                <option value="" selected disabled>Choose an color</option>
                                @foreach (json_decode($product->color) as $color)
                                    <option value="{{ $color }}">{{ $color }}</option>
                                @endforeach
                        </select>
                       @endif
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
                            <button  class="addToCart btn btn-dark text-uppercase w-100 rounded-0 py-3">
                                Add to Cart
                            </button>
                        </div>
                        <div class="col-lg-3">
                            @if ($favProduct == null)
                            <a href="#" class="btn btn-outline-dark rounded-0 p-3 addToFavBtn">
                                <i class="bi bi-heart"></i>
                            </a>
                            @else
                            <a href="#" class="btn btn-outline-dark rounded-0 p-3 removeFavBtn">
                                <i class="bi bi-heart-fill"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="fw-bold text-uppercase">Product Description</h6>
                        <p>
                            <p>{{ Str::substr($product->description, 0, 50) }}<span id="dots">...</span><span id="more">{{ Str::substr($product->description, 50) }}</span></p>
                        </p>
                        <span class="text-decoration-underline cursor-pointer" id="myBtn" onclick="myFunction()">Read more</span>
                    </div>
                </div>
            </div>
            <hr />
        </div>
    </section>

    <section id="review">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-0" id="review-tab" data-bs-toggle="tab" data-bs-target="#review_tab" type="button" role="tab" aria-controls="review_tab" aria-selected="true">
                        Reviews
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-0" id="write-review-tab" data-bs-toggle="tab" data-bs-target="#message_tab" type="button" role="tab" aria-controls="message_tab" aria-selected="false">
                        Write Review
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-0" id="information-tab" data-bs-toggle="tab" data-bs-target="#information" type="button" role="tab" aria-controls="information" aria-selected="false">
                        Information
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="review_tab" role="tabpanel" aria-labelledby="review-tab" tabindex="0">
                    <div class="mt-5">
                        <h6>{{ count($reviews) }} Reviews</h6>
                        @foreach ($reviews as $review)
                        <div class="d-flex flex-wrap gap-4">
                            <div class="bg-secondary rounded-pill justify-content-center d-flex align-items-center text-white" style="height: 60px; width: 60px">
                                {{ $review->firstName[0]  }}
                            </div>
                            <div class="flex gap-3 flex-column align-items-center">
                                <div class="d-flex align-items-center gap-3">
                                    <h6>{{ $review->firstName . ' ' .$review->last_name  }}</h6>
                                    <span>
                                        <small>{{ $review->created_at->diffForhumans() }}</small>
                                    </span>
                                </div>
                                <span class="fs-6">
                                    @php
                                        $no_star = 5 - $review->rating_status
                                    @endphp
                                    @if ($no_star == 0)
                                        @for ($i = 0 ; $i < $review->rating_status ; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                    @else
                                        @for ($i = 0 ; $i < $review->rating_status ; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                        @for ($i = 0 ; $i < $no_star ; $i++)
                                            <i class="bi bi-star"></i>
                                        @endfor
                                    @endif
                                </span>
                                <div class="">
                                    <h5 class="text-black-50 fw-bold">{{ $review->title }}</h5>
                                    <p>
                                        {{ $review->message }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="">
                        {{ $reviews->links() }}
                    </div>
                </div>
                <div class="tab-pane fade" id="message_tab" role="tabpanel" aria-labelledby="write-review-tab" tabindex="0">
                    <div class="mt-5">
                        <div class="row justify-content-center">
                            <div class=" col-lg-5  col-md-7 col-10">
                                <div class="rating">
                                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                </div>
                                <div class="my-3">
                                    <div class="my-3">
                                        <div class="my-2">
                                            <input type="text" name="title" class="form-control border-black rounded-0" placeholder="Enter review title (Eg. Love It)" id="reviewTitle">
                                            <small id="title-error" class="text-danger"></small>
                                        </div>
                                        <textarea name="message" class="form-control border-black rounded-0" placeholder="Enter message" cols="30" rows="10" id="reviewMessage"></textarea>
                                        <small id="message-error" class="text-danger"></small>
                                    </div>
                                </div>
                                @if (Auth::check())
                                    @if (Auth::user()->role == 'user')
                                        <button  class="ReviewBtn btn btn-dark rounded-0">Submit</button>
                                    @else
                                        <a href="{{ route('customer.login') }}" class="btn btn-dark rounded-0">Login to submit review</a>
                                    @endif
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-dark rounded-0">Login to submit review</a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab" tabindex="0">
                    <div class="mt-5">
                        information tab
                    </div>
                </div>
            </div>
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
                    @foreach ($topRateProducts as $product)
                    <div class="swiper-slide">
                        <a href="{{ route('product.detail', $product->id) }}">
                            <img src="{{ asset('dbImg/products/'.$product->image) }}"
                                class="w-75" alt="" />
                            <div class="mt-3">
                                <h6 class="product-name">{{ $product->name }}</h6>
                                <span class="fs-5">
                                    @php
                                        $filledStars = floor($averageRating);
                                        $halfStar = ($averageRating - $filledStars) >= 0.5;
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
                        </a>
                    </div>
                    @endforeach
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

    <section id="similar-products" class="my-5">
        <div class="container py-5">
            <h5 class=" ">Discover similar products!</h5>
        </div>

        <div class="container">
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($similarProducts as $product)
                    <div class="swiper-slide">
                        <a href="{{ route('product.detail', $product->id) }}">
                            <img src="{{ asset('dbImg/products/'.$product->image) }}"
                                class="w-75" alt="" />
                            <div class="mt-3">
                                <div class="d-flex flex-wrap gap-5">
                                    <h6 class="product-name">{{ $product->name }}</h6>
                                    <span>{{ $product->dicount_price ? $product->dicount_price : $product->original_price . " MMK"}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
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
    const addToCart = document.querySelector('.addToCart');
    const addToFavBtn = document.querySelector('.addToFavBtn');
    const removeFavBtn = document.querySelector('.removeFavBtn');
    const quantityNo = parseInt(quantity.value);
    let count = quantityNo;

    removeQty.addEventListener('click',removeQuantity);
    addQty.addEventListener('click',addQuantity);
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

    addToCart.addEventListener('click',function(){
        const cartData = {
            'id': {{ $product->id }},
            'title': '{{ $product->name }}',
            'price': {{ $product->discount_price ? $product->discount_price : $product->original_price }},
            'image': document.querySelector('.product_img').src,
            'color' : document.querySelector('#product_color') ? document.querySelector('#product_color')?.value : '',
        }
        if (user_id !== undefined) {
            const data = {
                'product_id': {{ $product->id }},
                'quantity': quantity.value,
                'user_id': document.querySelector('.user_id').value,
                'color' : document.querySelector('#product_color') ? document.querySelector('#product_color')?.value : ''
            }
            console.log(data);
            axios.post('/addToCart', {
                    data
                })
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
        RemoveEmptyInCart();
        createItemInCart(cartData);
    })

    addToFavBtn?.addEventListener('click',function(){
        const data = {
            'product_id': {{ $product->id }},
            'user_id': document.querySelector('.user_id').value,
        }
        axios.post('/user/addToFav', {
                data
            })
            .then(function(response) {
                if(response?.data?.status == 'false'){
                   Swal.fire(
                      'Good job!',
                      'Already added to favourite',
                      'success'
                    )
                }else if(response?.data){
                    location.reload();
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    })

    removeFavBtn?.addEventListener('click',function(){
        const data = {
            'product_id': {{ $product->id }},
            'user_id': document.querySelector('.user_id').value,
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
    })


    //review
    const ReviewBtn = document.querySelector('.ReviewBtn');
    ReviewBtn.addEventListener('click',function(){
        validateReviewForm();
        const data = {
            'product_id': {{ $product->id }},
            'user_id': document.querySelector('.user_id').value,
            'rating': document.querySelector('input[name="rating"]:checked')?.value,
            'title': document.querySelector('#reviewTitle').value,
            'message': document.querySelector('#reviewMessage').value,
        }
        axios.post('/user/submit/review', {
            data
        })
        .then(function(response) {
            console.log(response);
            if(response?.data ){
                document.querySelector('#reviewTitle').value = '';
                document.querySelector('#reviewMessage').value  = '';
                document.querySelector('input[name="rating"]:checked').checked = false;
                Swal.fire(
                  'Good job!',
                  'Your message has been sent!',
                  'success'
                )
            }
        })
        .catch(function(error) {
            console.log(error);
        });
    });
    function validateReviewForm() {
        let titleInput = document.getElementById("reviewTitle");
        let messageInput = document.getElementById("reviewMessage");
        let titleError = document.getElementById("title-error");
        let messageError = document.getElementById("message-error");
        let isValid = true;

        // Reset error messages
        titleError.textContent = "";
        messageError.textContent = "";

        if (titleInput.value.trim() === "") {
            titleError.textContent = "Please enter a review title.";
            titleInput.focus();
            isValid = false;
        }

        if (messageInput.value.trim() === "") {
            messageError.textContent = "Please enter a review message.";
            messageInput.focus();
            isValid = false;
        }

        return isValid;
    }

    function myFunction() {
      var dots = document.getElementById("dots");
      var moreText = document.getElementById("more");
      var btnText = document.getElementById("myBtn");

      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
      }
    }
</script>

@endsection
