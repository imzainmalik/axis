@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Add Properties!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card">
                <div class="card-header">Add Property</div>
                <div class="card-body">
                    <form action="{{ route('create_property') }}" method="post">
                        @csrf
                        <div class="container">
                            <label for="">Property Type</label>
                            <select name="property_type" id="" required class="form-control">
                                <option value="" disabled selected></option>
                                <option value="0">Office</option>
                                <option value="1">House</option>
                                <option value="2">Mall</option>
                                <option value="3">Condo</option>
                            </select>
                        </div>
                        <div class="container py-3">
                            <label for="">Property name</label>
                            <input type="text" name="property_name" required class="form-control">
                        </div>

                        <div class="container">Unit</div>
                        <div class="container py-3">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-3">
                                        <input type="text" class="form-control" placeholder="Unit name" required
                                            name="unit_details[]">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control" placeholder="Unit number" required
                                            name="unit_details[]">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control" placeholder="Size" required
                                            name="unit_details[]">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control" placeholder="Beds" name="unit_details[]">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control" placeholder="Bath" name="unit_details[]">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control" placeholder="Rent Amount" required
                                            name="unit_details[]">
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-primary" type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container py-4">Address</div>
                        <div class="container py-3">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Street 1" required
                                            name="street1">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Street 2" required
                                            name="street2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="State" required
                                            name="state">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="City" required
                                            name="city">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Country" required
                                            name="country">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Zip Code" required
                                            name="zipcode">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container py-3">
                            Owners
                        </div>
                        <div class="container py-3">
                            <div class="col-6">

                                <input class="form-check-input" type="radio" value="own_by_me" name="own_by"
                                    id="own_by_me">
                                <label class="form-check-label" for="own_by_me">
                                    Own by me
                                </label>

                                <input class="form-check-input" type="radio" value="own_by_someoneelse" name="own_by"
                                    id="own_by_someoneelse">
                                <label class="form-check-label" for="own_by_someoneelse">
                                    Own by someone else
                                </label>
                            </div>
                        </div>
                        <div class="container">
                            <select name="owners[]" class="form-control" id="ownersDropdown" multiple>
                                @foreach ($owner as $item)
                                    <option value="{{ $item->id }}">{{ $item->first_name . ' ' . $item->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="container py-3">
                            <button class="btn  btn-primary">Create property</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script>
        $(document).ready(function() {
            $('#ownersDropdown').hide();
            $('input[name="own_by"]').change(function() {
                if ($(this).val() === 'own_by_someoneelse') {
                    $('#ownersDropdown').show();
                } else {
                    $('#ownersDropdown').hide();
                }
            });
        });
    </script>
@endpush
