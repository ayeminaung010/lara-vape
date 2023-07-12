@extends('templates.layouts.app')
@section('content')
    <main class=" mt-2">
        <div class=" text-center backgroundImage d-flex align-items-center  justify-content-center" style="background-image: url('{{ asset('user/images/background/About.webp') }}')">
            <h1 class=" text-white">About Us</h1>
        </div>

        <section class="bg-body-tertiary ">
            <div class="container bg-white my-5 py-5">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 px-5">
                        <h1>Who We Are</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit.</p>
                    </div>
                    <div class="col-lg-6">
                        <img class=" w-100" src="{{ asset("user/images/about/profile.webp") }}"  alt="about-our-store">
                    </div>
                </div>
            </div>

        </section>

        <section id="our-team">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center">
                            <h5>A Few Words About</h5>
                            <h1>Our Team</h1>
                            <p class="">Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center my-5">
                    <div class="col-lg-7">
                        <div class="row justify-content-center align-items-center gap-3">
                            <div class="col-lg-3 py-5 bg-body-tertiary shadow-sm">
                                <div class="d-flex flex-wrap justify-content-center  align-items-center gap-3">
                                    <img src="{{ asset('dbImg/logo/64ac26f2165c3.Vape-Vibe-PNG-1-100x100.png') }}" alt="">
                                    <div class=" text-center">
                                        <h5 class=" font-weight-bold">Harvey Spector</h5>
                                        <span>Founder - CEO</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 py-5 bg-body-tertiary shadow-sm">
                                <div class="d-flex flex-wrap justify-content-center  align-items-center gap-3">
                                    <img src="{{ asset('dbImg/logo/64ac26f2165c3.Vape-Vibe-PNG-1-100x100.png') }}" alt="">
                                    <div class=" text-center">
                                        <h5 class=" font-weight-bold">Harvey Spector</h5>
                                        <span>Founder - CEO</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 py-5 bg-body-tertiary shadow-sm">
                                <div class="d-flex flex-wrap justify-content-center  align-items-center gap-3">
                                    <img src="{{ asset('dbImg/logo/64ac26f2165c3.Vape-Vibe-PNG-1-100x100.png') }}" alt="">
                                    <div class=" text-center">
                                        <h5 class=" font-weight-bold">Harvey Spector</h5>
                                        <span>Founder - CEO</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 py-5 bg-body-tertiary shadow-sm">
                                <div class="d-flex flex-wrap justify-content-center  align-items-center gap-3">
                                    <img src="{{ asset('dbImg/logo/64ac26f2165c3.Vape-Vibe-PNG-1-100x100.png') }}" alt="">
                                    <div class=" text-center">
                                        <h5 class=" font-weight-bold">Harvey Spector</h5>
                                        <span>Founder - CEO</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 py-5 bg-body-tertiary shadow-sm">
                                <div class="d-flex flex-wrap justify-content-center  align-items-center gap-3">
                                    <img src="{{ asset('dbImg/logo/64ac26f2165c3.Vape-Vibe-PNG-1-100x100.png') }}" alt="">
                                    <div class=" text-center">
                                        <h5 class=" font-weight-bold">Harvey Spector</h5>
                                        <span>Founder - CEO</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 py-5 bg-body-tertiary shadow-sm">
                                <div class="d-flex flex-wrap justify-content-center  align-items-center gap-3">
                                    <img src="{{ asset('dbImg/logo/64ac26f2165c3.Vape-Vibe-PNG-1-100x100.png') }}" alt="">
                                    <div class=" text-center">
                                        <h5 class=" font-weight-bold">Harvey Spector</h5>
                                        <span>Founder - CEO</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="social" class=" text-center">
            <div class="container">
                <h2>Follow Us</h2>
                <div class="d-flex flex-wrap justify-content-center gap-5">
                    <a href=""><i class="bi fs-4 bi-facebook"></i></a>
                    <a href="">
                        <i class="bi fs-4 bi-twitter"></i>
                    </a>
                    <a href=""><i class="bi fs-4 bi-instagram"></i></a>
                </div>
            </div>
        </section>

        <section id="">
            <div class="container">
                <div class="row justify-content-center py-5">
                    <div class="col-10">
                        <div class="row ">
                            <div class=" col-lg-3  ">
                                <div class=" py-4 px-2 bg-white text-center">
                                    <i class="bi bi-globe-asia-australia fs-1 "></i>
                                    <div class="">
                                        <h5 class=" font-weight-bold">Worldwide Shipping</h5>
                                        <p><small>It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</small></p>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-3  ">
                                <div class=" py-4 px-2 bg-white text-center">
                                    <i class="bi fs-1 bi-pin"></i>
                                    <div class="">
                                        <h5 class=" font-weight-bold">Best Quality</h5>
                                        <p><small>It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</small></p>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-3  ">
                                <div class=" py-4 px-2 bg-white text-center">
                                    <i class="bi fs-1 bi-heart-pulse-fill"></i>
                                    <div class="">
                                        <h5 class=" font-weight-bold">Best Offers</h5>
                                        <p><small>It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</small></p>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-3  ">
                                <div class=" py-4 px-2 bg-white text-center">
                                    <i class="bi fs-1 bi-shield-check"></i>
                                    <div class="">
                                        <h5 class=" font-weight-bold">Secure Payments</h5>
                                        <p><small>It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

