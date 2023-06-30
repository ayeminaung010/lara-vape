<!-- product brands section -->
<section id="brand-section" class="bg-body-tertiary">
    <div class="container py-5">
        <div class="mb-4">
            <h4>Our brands</h4>
        </div>
        <div class="d-flex flex-wrap gap-3">
            @foreach ($brands as $brand)
                <div class="brands--logo">
                    @if ($brand->image !== null)
                    <a href="#">
                        <img src="{{ asset('dbImg/brands/'.$brand->image) }}" height="120" class="w-100 bg-white" alt="{{ $brand->name }}" />
                    </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
