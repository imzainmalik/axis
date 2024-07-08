@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Create Payments!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Create Payment</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('store_payment') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="tenants">Tenants</label>
                            <select name="tenants" id="tenants" class="form-control" required>
                                <option value="" selected disabled></option>
                                @foreach ($tenants as $item)
                                    <option value="{{ $item->id }}">{{ $item->first_name . ' ' . $item->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="get_properties">Property</label>
                            <select name="get_properties" id="get_properties" class="form-control" required>
                                <option value="" selected disabled></option>
                                @foreach ($get_properties as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->property_name . ' ' . '(' . $item->address . ')' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="unit">Unit</label>
                            <select name="unit" id="unit" class="form-control" required>
                                <option value="" selected disabled></option>
                                @foreach ($unit as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->unit_name . ' ' . '(FCFA ' . $item->property_rent_amount . ')' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="month_year">Rent of month</label>
                            <input type="date" class="form-control" name="month_year" required>
                        </div>
                        <div class="col-6">
                            <label for="amount">Rent Amount</label>
                            <input type="number" class="form-control" name="amount" required>
                        </div>
                        <div class="col-6">
                            <label for="payment_status">Payment status</label>
                            <select name="payment_status" required id="payment_status" class="form-control">
                                <option value="" selected disabled></option>
                                <option value="Paid">Paid</option>
                                <option value="Unpaid">Unpaid</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
