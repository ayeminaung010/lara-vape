@extends('templates.layouts.app')
@section('content')
    <div class="container">
        <div class="row   justify-content-center align-items-center my-5">
            <div class="col-lg-6 mt-3">
                <h5>Successfully Order!</h5>
                <p>Thank you for your order. We will contact you soon.</p>
                <a href="{{ url('/') }}" class=" btn btn-dark rounded-0">Go to Home</a>
            </div>
        </div>
    </div>
@endsection
