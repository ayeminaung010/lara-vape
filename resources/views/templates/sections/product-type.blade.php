
<!-- product types section -->
<section id="product-type" class="container my-5">
    <div class="d-flex flex-wrap justify-content-center gap-3">
        @foreach ($productTypes as $productType)
        <div class="d-flex align-items-center gap-4 bg-body-tertiary product--type--item p-3">
            <img src="{{ asset('dbImg/product-type/'.$productType->image) }}" class="w-25 product--type--image"
                alt="{{ $productType->name }}" />
            <a href="#" class="text-center w-50 product--type--text">{{ $productType->name }}</a>
        </div>
        @endforeach
    </div>
</section>
