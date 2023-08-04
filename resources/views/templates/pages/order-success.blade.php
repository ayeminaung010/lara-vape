@extends('templates.layouts.app')
@section('css')
<style>
    .card-success {
      text-align: center;
      padding: 40px 0;
      background: #EBF0F5;
    }
      h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
      }
      p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size:20px;
        margin: 0;
      }
    .checkmark {
      color: #9ABC66;
      font-size: 100px;
      line-height: 200px;
      margin-left:-15px;
    }
    .card-success {
      background: white;
      padding: 60px;
      border-radius: 4px;
      box-shadow: 0 2px 3px #C8D0D8;
      display: inline-block;
      margin: 0 auto;
    }
  </style>
@endsection
@section('content')
    <div class="container">
        <div class="row   justify-content-center align-items-center my-5">
            <div class="card-success">
                <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                  <i class="checkmark">✓</i>
                </div>
                  <h1>Success Order</h1>
                  <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
                  <p>Thank you for shopping with us. We will contact you soon.</p>

                  <div class=" mt-4">
                    <a href="{{ route("user.orderLists") }}" class=" btn btn-outline-dark rounded-0">Go to My Orders</a>
                      <a href="{{ url('/') }}" class=" btn btn-dark rounded-0">Go to Home</a>
                  </div>
            </div>
        </div>
    </div>
@endsection
