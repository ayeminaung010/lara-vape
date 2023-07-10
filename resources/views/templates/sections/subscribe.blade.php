<!-- subscribe section -->
<section id="subscribe" class="">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6  bg-black text-white py-6">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-7">
                        <h4>Get 10% off your first order!</h4>
                        <p>
                            Plus, be the first to know about exclusive promotions, Black
                            Friday deals, discounts and more.
                        </p>
                        <form action="{{ route('subscribe.store') }}" class="d-flex flex-column gap-2" id="subscribe--form"
                            method="POST">
                            @csrf
                            <div class="d-flex flex-column">
                                <div class="d-flex gap-3">
                                    <div class="input-group">
                                        <input type="text" name="first_name" class="form-control rounded-0"
                                            placeholder="First Name" required />
                                    </div>
                                    <div class="input-group">
                                        <input type="text" name="last_name" class="form-control rounded-0"
                                            placeholder="Last Name" />
                                    </div>
                                </div>
                                <div class="input-group mt-3">
                                    <input type="email" name="email" class="form-control rounded-0"
                                        placeholder="Email Address" required />
                                </div>
                                <div class="input-group mt-3">
                                    <input type="number" name="phone" class="form-control rounded-0"
                                        placeholder="Phone Number" required />
                                </div>
                            </div>
                            <small class="my-2">
                                By submitting this form and signing up for texts, you
                                consent to receive marketing text messages (e.g. promos,
                                cart reminders) from VAPO AU at the number provided,
                                including messages sent by autodialer. Consent is not a
                                condition of purchase. Msg & data rates may apply. Msg
                                frequency varies. Unsubscribe at any time by replying STOP
                                or clicking the unsubscribe link (where available).
                                <a href="#" class="text-decoration-none text-info">Privacy Policy &
                                    Terms.</a>
                            </small>
                            <button class="btn btn--white rounded-0 text-uppercase fw-bold" type="submit">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 bg-body-tertiary  col-md-6 py-6">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h4 class="fw-bold">Prescription</h4>
                        <div class="mt-3">
                            <img src="{{ asset('user/images/subscribe/subscribe1.png') }}" class="w-100"
                                alt="" />
                        </div>
                        <button class="btn btn-dark text-uppercase rounded-0 px-5 py-3 mt-3">
                            Find Out More
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
