@extends('templates.layouts.app')
@section('content')
    <main class=" mt-2">
        <div class=" text-center backgroundImage d-flex align-items-center  justify-content-center" style="background-image: url('{{ asset('user/images/background/contact-cover.webp') }}')">
            <h1 class=" text-white">Contact Us</h1>
        </div>

        <section class="bg-body-tertiary ">
            <div class="container ">
                <div class="text-center pt-5">
                    <h6>Have any queries?</h6>
                    <h1>We're here to help.​</h1>
                </div>

                <div class="row justify-content-center py-5">
                    <div class="col-10">
                        <div class="row gap gap-md-3">
                            <div class=" col-lg-3    ">
                                <div class=" py-4 px-2 bg-white text-center">
                                    <h3>Sales</h3>
                                    <p>Please call me if you need some help in buying through our website.</p>
                                    <strong class=" text-primary">09123456789</strong>
                                </div>
                            </div>
                            <div class=" col-lg-3   ">
                                <div class=" py-4 px-2 bg-white text-center">
                                    <h3>Complaints</h3>
                                    <p>Please do ntot hesitate to contact us, if you got an inconveniences.</p>
                                    <strong class=" text-primary">09123456789</strong>
                                </div>
                            </div>
                            <div class=" col-lg-3   ">
                                <div class=" py-4 px-2 bg-white text-center">
                                    <h3>Hot Line</h3>
                                    <p>We are here to assist you , if you need some help.</p>
                                    <strong class=" text-primary">09123456789</strong>
                                </div>
                            </div>
                            <div class=" col-lg-3   ">
                                <div class=" py-4 px-2 bg-white text-center">
                                    <h3>Wholesale</h3>
                                    <p>Please contact us for your business to grow together with us.</p>
                                    <strong class=" text-primary">09123456789</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- contact form  --}}
        <section id="contactForm" class=" ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5  col-md-8 py-5 ">
                        <span>Don't be a stranger!</span>
                        <h2>You tell us. We listen.</h2>
                        <p>Cras elementum finibus lacus nec lacinia. Quisque non convallis nisl, eu condimentum sem. Proin dignissim libero lacus, ut eleifend magna vehicula et. Nam mattis est sed tellus.</p>
                    </div>
                    <div class="col-lg-5 col-md-8 ">
                        <form action="" class=" my-2 p-lg-5 ">
                            <div class=" input-group my-3">
                                <input type="text" class=" form-control rounded-0" placeholder="Name">
                            </div>
                            <div class=" input-group my-3">
                                <input type="text" class=" form-control rounded-0" placeholder="Subject">
                            </div>
                            <div class=" input-group my-3">
                                <input type="text" class=" form-control rounded-0" placeholder="Email">
                            </div>
                            <div class=" input-group my-3">
                                <textarea name="" class=" form-control" placeholder="Message" id="" cols="30" rows="10"></textarea>
                            </div>
                            <button class=" btn btn-dark rounded-0 px-5 py-2">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </main>
@endsection

