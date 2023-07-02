<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <div class="">
            @yield('btn')
        </div>
        {{-- <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <form action="{{ route(Route::currentRouteName()) }}" method="GET">
                    @csrf
                    <div class=" d-flex  ">
                        <input type="text" name="search" placeholder="Search You Wish" class="form-control">
                        <button type="submit" class=" btn btn-dark">Search</button>
                    </div>
                </form>
            </div>
        </div> --}}
    </div>
</nav>
