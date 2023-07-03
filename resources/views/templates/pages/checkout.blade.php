@extends('templates.layouts.app')
@section('content')
    <div class="container">
        <div class="row   justify-content-center my-5">
            <div class="col-lg-6 ">
                <h4>Delivery Details</h4>
                <div class="row">
                    <div class="col-lg-10">
                        <form action="#" method="POST" class="d-flex flex-column">
                            @csrf
                            <div class="my-2">
                                <input type="text" name="name" class="form-control rounded-0 py-3 "
                                placeholder="Enter Name">
                                @error('name')
                                <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="text" name="email" class="form-control rounded-0 py-3 "
                                placeholder="Email">
                                @error('email')
                                <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-2">
                                {{-- <textarea name="address" id="" placeholder="Enter Address" class=" form-control" cols="30" rows="10"></textarea> --}}
                                <input type="text"  name="address" id="" placeholder="Enter Address" class=" form-control rounded-0 py-3" >
                                @error('email')
                                <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="text"  name="phone" id="" placeholder="Phone(09xxxxx)" class=" form-control rounded-0 py-3" >
                                @error('phone')
                                <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-2">
                                <textarea name="note" id="" placeholder="Enter Message(Optional)" class=" form-control" cols="30" rows="10"></textarea>
                                @error('note')
                                <small class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button class=" btn btn-dark rounded-0  py-2">Continue to payment</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
