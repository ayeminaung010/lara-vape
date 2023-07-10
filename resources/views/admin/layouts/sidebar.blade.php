<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0"
            target="_blank">
            <img src="{{ asset('admin/assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Vape Dashboard</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white  @if(Route::currentRouteName() == 'admin.dashboard') bg-gradient-primary @endif" href="../pages/dashboard.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white   " data-bs-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">list</i>
                    </div>
                    <span class="nav-link-text ms-1">Posts</span>
                </a>
                <div class="collapse" id="collapseExample">
                    <a href="{{ route('category.index') }}" class="nav-link text-white @if(Route::currentRouteName() == 'category.index') bg-gradient-primary @endif" >
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">widgets</i>
                        </div>
                        <span class="nav-link-text ms-1">Category</span>
                    </a>
                    <a href="{{ route('subCategory.index') }}" class="nav-link text-white @if(Route::currentRouteName() == 'subCategory.index') bg-gradient-primary @endif" >
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">widgets</i>
                        </div>
                        <span class="nav-link-text ms-1">Sub Category</span>
                    </a>
                    <a href="{{ route('brands.index') }}" class="nav-link text-white @if(Route::currentRouteName() == 'brands.index') bg-gradient-primary @endif" >
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">widgets</i>
                        </div>
                        <span class="nav-link-text ms-1">Brand</span>
                    </a>
                    <a href="{{ route('productColor.index') }}" class="nav-link text-white @if(Route::currentRouteName() == 'productColor.index') bg-gradient-primary @endif" >
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">widgets</i>
                        </div>
                        <span class="nav-link-text ms-1">Product Colors</span>
                    </a>
                    <a href="{{ route('products.index') }}" class="nav-link text-white @if(Route::currentRouteName() == 'products.index') bg-gradient-primary @endif" >
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">widgets</i>
                        </div>
                        <span class="nav-link-text ms-1">Products</span>
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " data-bs-toggle="collapse" href="#menuCollapse" role="button"
                    aria-expanded="false" aria-controls="menuCollapse">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">lunch_dining</i>
                    </div>
                    <span class="nav-link-text ms-1">Menu</span>
                </a>
                <div class="collapse" id="menuCollapse">
                    <a class="nav-link text-white @if(Route::currentRouteName() == 'admin.dashboard') bg-gradient-primary @endif" >
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">lunch_dining</i>
                        </div>
                        <span class="nav-link-text ms-1">Menu Lists</span>
                    </a>
                    <a class="nav-link text-white  @if(Route::currentRouteName() == 'admin.dashboard') bg-gradient-primary @endif" >
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">fastfood</i>
                        </div>
                        <span class="nav-link-text ms-1">Menu Items</span>
                    </a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " data-bs-toggle="collapse" href="#frontendCollapse" role="button"
                    aria-expanded="false" aria-controls="frontendCollapse">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">widgets</i>
                    </div>
                    <span class="nav-link-text ms-1">Frontend</span>
                </a>
                <div class="collapse" id="frontendCollapse">
                    <a  href="{{ route('product_type.index') }}" class="nav-link text-white @if(Route::currentRouteName() == 'product_type.index') bg-gradient-primary @endif" >
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">checklist</i>
                        </div>
                        <span class="nav-link-text ms-1">Product Type</span>
                    </a>
                    <a href="{{ route('review.index') }}" class="nav-link text-white @if(Route::currentRouteName() == 'review.index') bg-gradient-primary @endif" >
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">reviews</i>
                        </div>
                        <span class="nav-link-text ms-1">Reviews</span>
                    </a>
                    <a href="{{ route('frontend.index') }}" class="nav-link text-white @if(Route::currentRouteName() == 'frontend.index') bg-gradient-primary @endif" >
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">widgets</i>
                        </div>
                        <span class="nav-link-text ms-1">Frontend</span>
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('orders.index') }}" class="nav-link text-white @if(Route::currentRouteName() == 'orders.index') bg-gradient-primary @endif" >
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">shopping_cart</i>
                    </div>
                    <span class="nav-link-text ms-1">Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('payments.index') }}" class="nav-link text-white @if(Route::currentRouteName() == 'payments.index') bg-gradient-primary @endif" >
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">paid</i>
                    </div>
                    <span class="nav-link-text ms-1">Payments</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link text-white @if(Route::currentRouteName() == 'users.index') bg-gradient-primary @endif" >
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">people</i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('subscriber.index') }}" class="nav-link text-white @if(Route::currentRouteName() == 'subscriber.index') bg-gradient-primary @endif" >
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">subscriptions</i>
                    </div>
                    <span class="nav-link-text ms-1">Subscribers</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contact.index') }}" class="nav-link text-white @if(Route::currentRouteName() == 'contact.index') bg-gradient-primary @endif" >
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">contact_mail</i>
                    </div>
                    <span class="nav-link-text ms-1">Contact Message</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('seo.index') }}" class="nav-link text-white @if(Route::currentRouteName() == 'seo.index') bg-gradient-primary @endif" >
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">find_in_page</i>
                    </div>
                    <span class="nav-link-text ms-1">SEO</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages
                </h6>
            </li>

            <li class="nav-item">
                <a href="{{ route("profile.index") }}" class="nav-link text-white @if(Route::currentRouteName() == 'profile.index') bg-gradient-primary @endif" >
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile.password') }}" class="nav-link text-white " >
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Change Password</span>
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <div class=" d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary d-flex   ">
                            <div class=" text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">login</i>
                            </div>
                            <span class="nav-link-text ms-1">Log Out</span>
                        </button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn btn-outline-primary mt-4 w-100"
                href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree"
                type="button">Documentation</a>
        </div>
    </div>
</aside>
