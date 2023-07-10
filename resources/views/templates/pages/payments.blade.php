@extends('templates.layouts.app')
@section('content')
    <div class="container">
        <div class="row   justify-content-center align-items-center my-5">
            <div class="col-lg-6 mt-3">
                <h4>Review & Payments</h4>
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Fail!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Updated!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-10">
                        <form action="{{ route('user.submitOrder') }}" enctype="multipart/form-data" method="POST" class="d-flex flex-column">
                            @csrf
                            <input type="hidden" name="total_price" class="total_price" value="" >
                            <div class="my-2">
                                <label for="">Upload Your Payments Transaction <strong class=" text-danger">*</strong></label>
                                <input type="file" name="payment_img" class="form-control rounded-0 py-3 "
                                >
                                @error('name')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <input type="hidden" name="order_code" class="order_code" value="" >
                            <div class="my-2">
                                <textarea name="note" id="" placeholder="Enter Message(Optional)" class=" form-control" cols="30" rows="10"></textarea>
                                @error('note')
                                    <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="">
                                <input type="hidden" name="deliveryName" value="" >
                                <input type="hidden" name="deliveryEmail" value="" >
                                <input type="hidden" name="deliveryPhone" value="" >
                                <input type="hidden" name="deliveryAddress" value="" >
                                <input type="hidden" name="deliveryNote" value="" >
                            </div>
                            <button type="submit" class="confirmPayment btn btn-dark rounded-0  py-2">Confirm Payment</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-md-first">
                <h4 class=" fw-bold">Please Follow the instruction below</h4>
                <div class=" mt-3">
                    <h5 class=" text-warning">*Please Send to below Payoneer Account*</h5>
                    <p>Account Name: <strong>U Aung Ko Ko</strong></p>
                    <p>Account Number: <strong>123456789</strong></p>
                    <p>Amount: <strong id="total_amount">1000 MMK</strong></p>
                    <p>Order ID:<strong id="order_id"> 123456789</strong></p>
                    <p>After you send the money, please upload the transaction slip and confirm the payment.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const orderCode = localStorage.getItem('orderCode');
        const totalPrice = localStorage.getItem('total_price');
        const deliveryData  = JSON.parse(localStorage.getItem('deliveryAddress'));
        const orderList = JSON.parse(localStorage.getItem('orderList'));

        const confirmPayment = document.querySelector('.confirmPayment');
        const total_amount = document.querySelector('#total_amount');
        const order_id  = document.querySelector('#order_id');
        const order_code = document.querySelector('.order_code');
        const total_price = document.querySelector('.total_price');

        total_amount.innerText = totalPrice + " " + "MMK";
        order_id.innerText = " " + orderCode;
        order_code.value = orderCode;
        total_price.value = totalPrice;

        const deliveryName = document.querySelector('input[name="deliveryName"]');
        const deliveryEmail = document.querySelector('input[name="deliveryEmail"]');
        const deliveryPhone = document.querySelector('input[name="deliveryPhone"]');
        const deliveryAddress = document.querySelector('input[name="deliveryAddress"]');
        const deliveryNote = document.querySelector('input[name="deliveryNote"]');
        deliveryName.value = deliveryData?.name;
        deliveryEmail.value = deliveryData?.email;
        deliveryNote.value = deliveryData?.note;
        deliveryPhone.value = deliveryData?.phone;
        deliveryAddress.value = deliveryData?.address;
    </script>
@endsection
