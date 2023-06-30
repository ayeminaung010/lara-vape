<!-- review section -->
<section id="review-section" class="py-8">
    <div class="container">
        <div class="position-relative py-5">
            <a class="carousel-control-prev w-aut" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next w-aut" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <span class="fs-5">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
            </span>
            <h5 class=" ">Real Reviews From Real Customers</h5>
        </div>
    </div>
    <div class="container text-center my-3">
        <div class="splide" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($reviews as $review )
                    <li class="splide__slide">
                        <div class="review--container py-6 px-4">
                            <span class=" ">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </span>
                            <div class="mt-2">
                                <h5 class="review--title">{{ $review->title }}</h5>
                                <p class="review--text">
                                    {{ Str::substr($review->message, 0, 60). '....' }}
                                </p>
                                <h6 class="review--name">{{ $review->reviewer_name }}</h6>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
