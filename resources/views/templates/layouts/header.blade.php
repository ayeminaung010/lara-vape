<section id="header" class="bg-dark text-white py-3">
    <div class="container">
        <div class="text-center">
            <marquee behavior="" direction="">
                <h6>
                    Get FREE EXPRESS shipping with all orders over $100! Click here to
                    find out more.
                </h6>
            </marquee>
        </div>
    </div>
</section>

<section id="navbar" class="bg-body-tertiary">
    <nav class="navbar navbar-expand-lg py-4">
        <div class="container">
            <a class="navbar-brand order-last order-lg-first" href="{{ url('/') }}">
                <!-- <img src="" loading="lazy" class="" alt=""> -->
                Logo
            </a>
            <div class="order-last order-lg-first d-flex gap-3 d-lg-none">
                <a href="#">
                    <i class="bi bi-person fs-1"></i>
                </a>
                <a class="text-decoration-none text-dark" aria-current="page" href="#" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="bi bi-cart fs-1"></i>
                    <span class="cart-count"> 0 </span>
                </a>
            </div>
            <!-- <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navBarMobile"
          aria-controls="navBarMobile"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button> -->

            <button class="hamburger navbar-toggler" type="button">
                <i class="menuIcon material-icons"><i class="bi bi-list fs-2"></i></i>
                <i class="closeIcon material-icons"><i class="bi bi-x fs-2"></i></i>
            </button>

            <div class="collapse navbar-collapse">
                <form class="d-flex ms-auto w-50" role="search">
                    <input class="form-control me-2 search-box py-3 px-4 rounded-0" type="search"
                        placeholder="Search for vapes, pods, kits and more..." aria-label="Search" />
                </form>
                <ul class="navbar-nav ms-auto d-flex flex-wrap align-items-center mb-2 mb-lg-0">
                    <i class="bi bi-person fs-5"></i>
                    @if (Auth::check())
                        @if (Auth::user()->role !== 'user')
                            <li class="nav-item border-end border-1 border-dark sign-in-btn">
                                <a class="nav-link" aria-current="page" href="{{ route('customer.login') }}">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page"
                                    href="{{ route('customer.register') }}">Register</a>
                            </li>
                        @else
                            <li class="nav-item border-end border-1 sign-in-btn">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="nav-link" aria-current="page">Logout</button>
                                </form>
                            </li>
                        @endif
                    @else
                        <li class="nav-item border-end border-1 border-dark sign-in-btn">
                            <a class="nav-link" aria-current="page" href="{{ route('customer.login') }}">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('customer.register') }}">Register</a>
                        </li>
                    @endif
                    <li class="nav-item ms-4">
                        <a class="text-decoration-none text-dark" aria-current="page" href="#" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <i class="bi bi-cart fs-5"></i>
                            My Bag
                            <span id="cartCount" class="cart-count animate__animated ">0</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- checkout modal  --}}
    <div class="modal fade" id="checkOutModal" tabindex="-1" aria-labelledby="checkOutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="checkOutModalLabel">Confirm Checkout</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure to checkout this cart?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="continueCheckOut()" class="btn btn-primary">Continue</button>
                </div>
            </div>
        </div>
    </div>

    {{-- no auth modal  --}}
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModalLabel">Please Login to Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    To Buy this product, you need to login first.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('customer.login') }}"  class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- offcanvas  -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">My Cart</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ">
            <div class="cartBox"></div>
        </div>
        <div class="offcanvas-footer ">
            <div class="d-flex flex-column gap-2 px-3 py-2">
                <div class=" d-flex  justify-content-between">
                    <h6>CART SUBTOTAL</h6>
                    <span id="subTotal">0 Kyats</span>
                </div>
                <button onclick="clearCart(event)" class=" btn btn-danger rounded-0 py-2 ">
                    Clear Cart
                </button>
                <button class=" btn btn-dark rounded-0 py-2 " data-bs-toggle="modal" @if(Auth::check()) @if(Auth::user()->role === 'user') data-bs-target="#checkOutModal" @else data-bs-target="#loginModal" @endif @else data-bs-target="#loginModal" @endif >
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>
    <!-- end offcanvas -->
    <div class="container">
        <ul class="menu">
            <li><a class="menuItem" href="#">Home</a></li>
            <li><a class="menuItem" href="#">Profile</a></li>
            <li><a class="menuItem" href="#">About</a></li>
            <li><a class="menuItem" href="#">Contacts</a></li>
        </ul>
        <div class="d-flex flex-wrap d-none d-lg-flex">
            @foreach (App\Models\Category::get() as $category)
                <div class="dropdown">
                    <button class="btn btn-close-white dropdown--btn py-2" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ $category->name }}
                        <!-- <div class="triangle-bottom"></div> -->
                    </button>
                    <ul class="dropdown-menu rounded-0 p-0 m-0">
                        <div class="d-flex flex-column justify-content-between">
                            <div class="d-flex gap-5 flex-wrap p-5">
                                <div class="single-dropdown-item">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a class="" href="#">
                                                <h6>New Pod Kits</h6>
                                            </a>
                                        </li>
                                        <hr />
                                        <li>
                                            <a class="" href="#"> UWELL Caliburn A3 Pod Kit </a>
                                        </li>
                                        <li>
                                            <a class="" href="#"> UWELL Crown D Pod Kit </a>
                                        </li>
                                        <li>
                                            <a class="" href="#"> SMOK Novo X Pod Kit </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <span class="bg-dark py-2 px-5 rounded-0 mt-auto text-start">
                                <a href="{{ route('product.slugProducts', $category->slug) }}"
                                    class="d-flex flex-wrap align-items-center gap-2 text-decoration-none text-white">
                                    Show All Products
                                    <i class="bi bi-arrow-right fs-4"></i>
                                </a>
                            </span>
                        </div>
                    </ul>
                </div>
            @endforeach
            {{-- <div class="dropdown">
                <button class="btn btn-close-white dropdown--btn py-2" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    New Products
                </button>
                <ul class="dropdown-menu rounded-0 p-0 m-0">
                    <div class="d-flex flex-column justify-content-between">
                        <div class="d-flex gap-5 flex-wrap p-5">
                            <div class="single-dropdown-item">
                                <ul class="list-unstyled">
                                    <li>
                                        <a class="" href="#">
                                            <h6>New Pod Kits</h6>
                                        </a>
                                    </li>
                                    <hr />
                                    <li>
                                        <a class="" href="#"> UWELL Caliburn A3 Pod Kit </a>
                                    </li>
                                    <li>
                                        <a class="" href="#"> UWELL Crown D Pod Kit </a>
                                    </li>
                                    <li>
                                        <a class="" href="#"> SMOK Novo X Pod Kit </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="single-dropdown-item">
                                <ul class="list-unstyled">
                                    <li>
                                        <a class="" href="#">
                                            <h6>New Pod Kits</h6>
                                        </a>
                                    </li>
                                    <hr />
                                    <li>
                                        <a class="" href="#"> UWELL Caliburn A3 Pod Kit </a>
                                    </li>
                                    <li>
                                        <a class="" href="#"> UWELL Crown D Pod Kit </a>
                                    </li>
                                    <li>
                                        <a class="" href="#"> SMOK Novo X Pod Kit </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="single-dropdown-item">
                                <ul class="list-unstyled">
                                    <li>
                                        <a class="" href="#">
                                            <h6>New Pod Kits</h6>
                                        </a>
                                    </li>
                                    <hr />
                                    <li>
                                        <a class="" href="#"> UWELL Caliburn A3 Pod Kit </a>
                                    </li>
                                    <li>
                                        <a class="" href="#"> UWELL Crown D Pod Kit </a>
                                    </li>
                                    <li>
                                        <a class="" href="#"> SMOK Novo X Pod Kit </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <span class="bg-dark py-2 px-5 rounded-0 mt-auto text-start">
                            <a href=""
                                class="d-flex flex-wrap align-items-center gap-2 text-decoration-none text-white">
                                Show All Products
                                <i class="bi bi-arrow-right fs-4"></i>
                            </a>
                        </span>
                    </div>
                </ul>
            </div> --}}
        </div>
    </div>
</section>
