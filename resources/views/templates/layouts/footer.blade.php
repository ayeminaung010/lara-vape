<!-- footer section  -->
<footer>
    <div class="container py-6">
      <div class="row gap-3  justify-content-center">
        <div class="col-lg-4 col-md-3">
          <div class="">
            <img src="{{ asset('dbImg/logo/'.$frontend->logo) }}" alt="">
          </div>
          <div class="d-flex flex-wrap gap-3 ms-3">
            <a href="{{ $frontend->facebook_url }}" class="fs-4">
              <i class="bi bi-facebook text-info"></i>
            </a>
            <a href="{{ $frontend->instagram_url }}" class="fs-4">
              <i class="bi bi-instagram text-danger"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-6  col-md-8">
          <div class="d-flex flex-wrap gap-7">
            <div class="">
              <h6 class="fw-bold">Vape Vibe</h6>
              <ul class="list-unstyled">
                <li>
                  <a href="{{ url('/about') }}">About Us</a>
                </li>
                <li>
                  <a href="{{ url('/contact') }}">Contact Us</a>
                </li>
              </ul>
            </div>
            <div class="">
              <h6 class="fw-bold">Useful Links</h6>
              <ul class="list-unstyled">
                @foreach (App\Models\Category::get() as $category)
                    <li>
                    <a href="{{ route('product.slugProducts', $category->slug) }}">{{ $category->name }}</a>
                  </li>
                @endforeach
              </ul>
            </div>

            <div class="">
              <h6 class="fw-bold">BRANDS</h6>
              <ul class="list-unstyled">
                @foreach (App\Models\Brands::take(5)->get() as $brand)
                    <li>
                    <a href="">{{ $brand->name }}</a>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr />
    <div class="container my-4">
      <div class="d-flex flex-wrap justify-content-center">
        <div class="">
            <span>Copyright © 2023 Vape Vibe. Powered by <a href="https://yolodigitalmyanmar.com/" target="_blink">Yolo Digital Myanmar</a>.</span>
        </div>
      </div>
    </div>
  </footer>
