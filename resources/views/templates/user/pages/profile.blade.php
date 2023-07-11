@extends('templates.layouts.app')

@section('content')
    <main>
        <section id="login-section">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-lg-3 ">
                        <ul class=" list-unstyled p-4">
                            <a href="{{ route('user.profile') }}">
                                <li class=" bg-body-tertiary @if(Route::currentRouteName() == 'user.profile') user_active @endif text-uppercase  py-3 px-4">My Profile</li>
                            </a>
                            <a href="{{ route('user.passwordChange') }}">
                                <li class=" bg-body-tertiary text-uppercase @if(Route::currentRouteName() == 'user.passwordChange') user_active @endif py-3 px-4">Password Change</li>
                            </a>
                            <a href="{{ route('user.orderLists') }}">
                                <li class=" bg-body-tertiary text-uppercase @if(Route::currentRouteName() == 'user.orderLists') user_active @endif  py-3 px-4">My Orders</li>
                            </a>
                            <a href="{{ route('user.history') }}">
                                <li class=" bg-body-tertiary text-uppercase @if(Route::currentRouteName() == 'user.history') user_active @endif  py-3 px-4">My History</li>
                            </a>
                            <a href="#">
                                <li class=" bg-body-tertiary text-uppercase  py-3 px-4">My Favourites</li>
                            </a>
                            <hr>
                            <form action="{{ route('logout') }}" class="" method="POST">
                                @csrf
                                <button type="submit" class="bg-body-tertiary  w-100 text-uppercase py-3 border-0">LogOut</button>
                            </form>
                        </ul>
                    </div>
                    <div class="col-lg-7 p-5">
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

                        @php
                            $user = Auth::user();
                        @endphp
                        <form action="{{ route('user.profile.update',$user->id) }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-6">
                                    <input type="text" name="first_name" class=" form-control rounded-0 " value="{{ $user->first_name }}" placeholder="Enter First Name" id="" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="last_name" class=" form-control rounded-0" value="{{ $user->last_name }}" placeholder="Enter Last Name" id="">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <input type="email" name="email" class=" form-control rounded-0" value="{{ $user->email }}" placeholder="Enter Email" id="">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class=" mb-3">
                                <input type="number" name="phone" class=" form-control rounded-0" value="{{ $user->ph_no }}" placeholder="Enter Phone Number" id="">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class=" mb-3">
                                <input type="text" name="address" class=" form-control rounded-0" value="{{ $user->address }}" placeholder="Enter Address" id="">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class=" mb-3">
                                <select name="gender" class=" form-control" id="">
                                    <option value="" disabled selected>Choose An Option</option>
                                    <option value="0" @selected($user->gender == '0')>Male</option>
                                    <option value="1" @selected($user->gender == '1')>Female</option>
                                    <option value="2" @selected($user->gender == '2')>Not Specified</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <button class="btn btn-dark rounded-0 w-100">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
