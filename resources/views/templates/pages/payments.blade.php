@extends('templates.layouts.app')
@section('content')
    <div class="container">
        <div class="row   justify-content-center align-items-center my-5">
            <div class="col-lg-6 ">
                <h4>Review & Payments</h4>
                <div class="row">
                    <div class="col-lg-10">
                        <form action="#" method="POST" class="d-flex flex-column">
                            @csrf
                            <div class="my-2">
                                <label for="">Upload Your Payments Transaction <strong class=" text-danger">*</strong></label>
                                <input type="file" name="payment_img" class="form-control rounded-0 py-3 "
                                >
                                @error('name')
                                <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-2">
                                <textarea name="note" id="" placeholder="Enter Message(Optional)" class=" form-control" cols="30" rows="10"></textarea>
                                @error('note')
                                <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button class=" btn btn-dark rounded-0  py-2">Confirm Payment</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h4 class=" fw-bold">Please Follow the instruction below</h4>
                <div class=" mt-3">
                    <h5 class=" text-warning">*Please Send to below Payoneer Account*</h5>
                    <p>Account Name: <strong>U Aung Ko Ko</strong></p>
                    <p>Account Number: <strong>123456789</strong></p>
                    <p>Amount: <strong>1000 MMK</strong></p>
                    <p>Remark: <strong>Order ID: 123456789</strong></p>
                    <p>After you send the money, please upload the transaction slip and confirm the payment.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
