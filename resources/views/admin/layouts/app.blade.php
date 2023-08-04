<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="#">
    <title>
        @yield('title')
    </title>
    @include('admin.layouts.css')
    @yield('css')
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('admin.layouts.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('admin.layouts.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @yield('content')
            @include('admin.layouts.footer')
        </div>
    </main>
    @include('admin.layouts.ui-setting')

    @include('admin.layouts.js')
</body>
@yield('js')

</html>
