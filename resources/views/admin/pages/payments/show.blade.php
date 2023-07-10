@extends('admin.layouts.app')

@section('btn')
    <a href="{{ route('payments.index') }}" class=" btn btn-dribbble">
        Back
    </a>
@endsection

@section('css')
    <style>
        table.GeneratedTable {
            width: 100%;
            background-color: #ffffff;
            border-collapse: collapse;
            border-width: 2px;
            border-color: #f79e02;
            border-style: solid;
            color: #000000;
        }

        table.GeneratedTable td,
        table.GeneratedTable th {
            border-width: 2px;
            border-color: #f79e02;
            border-style: solid;
            padding: 3px;
        }

        table.GeneratedTable thead {
            background-color: #fff700;
        }
    </style>
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-5 offset-2 shadow py-4 px-3">
            <div class="">
                <h5>User Payment</h5>

                <table class="GeneratedTable mt-3">
                    <thead>
                        <tr>
                            <th>Account Info</th>
                            <th>User Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $payment->user->first_name . ' ' . $payment->user->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $payment->user->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $payment->user->ph_no }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>
                                @if ($payment->user->gender == '1')
                                    Male
                                @elseif ($payment->user->gender == '2')
                                    Female
                                @else
                                    Not Specified
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="GeneratedTable mt-3">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Payment Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Image</td>
                            <td>
                                <img src="{{ asset('dbImg/payments/'.$payment->image) }}" width="200" h alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <td>{{ $payment->note }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                @if ($payment->status == '0')
                                    <div class="">
                                        <h6>
                                            Pending Payment...
                                            <i class="material-icons opacity-10 align-middle">directions_run    </i>
                                        </h6>
                                        <div class="">
                                            <a href="{{ route('payments.approve',$payment->id) }}" class="btn btn-success">
                                                Approve
                                            </a>
                                            <a href="{{ route('payments.reject',$payment->id) }}" class="btn btn-danger">
                                                Reject
                                            </a>
                                        </div>
                                    </div>
                                @elseif ($payment->status == '1')
                                    <h6>Approved Payment
                                        <i class="material-icons opacity-10 align-middle">check_circle</i>
                                    </h6>
                                @else
                                    <h6>Rejected Payment
                                        <i class="material-icons opacity-10 align-middle">dangerous</i>
                                    </h6>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
