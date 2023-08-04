
<section id="recommend-product" class="mt-5 container">
    <div class="mb-4">
        <h4>Discover our recommended products!</h4>
    </div>
    <div class="">
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($recommend as $product)
                <div class="swiper-slide">
                    <a href="{{ route('product.detail',$product->id) }}">
                        <div class=" p-3 " >
                            <img src="{{ asset('dbImg/products/' . $product->image) }}"
                                class=" recomProductImage object-fit-cover"   alt="{{ $product->name }}" />
                            <div class="d-flex justify-content-between mt-3">
                                <h6 class="brand-name">{{ $product->brand->name }}</h6>
                                <p>{{ $product->discount_price ? $product->discount_price : $product->original_price }}Kyats</p>
                            </div>
                            <div class="">
                                <h5 class="product-name">
                                    <a href="{{ route('product.detail',$product->id) }}">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <!-- pagination -->
            <div class="swiper-pagination"></div>

            <!-- navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </div>
</section>
