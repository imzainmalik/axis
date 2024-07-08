@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Create Units!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card">
                <div class="card-header">Update Units</div>
                <div class="card-body">
                    <form action="{{ route('update_units', $units->id) }}" method="post">
                        @csrf
                        <div class="container">
                            <label for="">Properties</label>
                            <select name="property_id" id="" required class="form-control">
                                <option value="" disabled selected></option>
                                @foreach ($get_properties as $get_property)
                                    <option value="{{ $get_property->id }}"
                                        @if ($units->property_id == $get_property->id) selected @endif
                                        title="{{ $get_property->address }}">
                                        {{ $get_property->property_name }} <br>
                                        <small>{{ $get_property->address }}</small>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="container py-3">
                            <label for="">Unit name</label>
                            <input type="text" name="unit_name" value="{{ $units->unit_name }}" required
                                class="form-control">
                        </div>
                        <div class="container py-3">
                            <label for="">Unit number</label>
                            <input type="number" name="unit_num" value="{{ $units->unit_num }}" required
                                class="form-control">
                        </div>
                        <div class="container py-3">
                            <label for="">Bedrooms</label>
                            <input type="number" name="bedrooms" value="{{ $units->bedrooms }}"
                                class="form-control">
                        </div>
                        <div class="container py-3">
                            <label for="">Bathrooms</label>
                            <input type="number" name="bathrooms" value="{{ $units->bathrooms }}" 
                                class="form-control">
                        </div>
                        <div class="container py-3">
                            <label for="">Square feet</label>
                            <input type="number" name="square_feet" value="{{ $units->square_feet }}" required
                                class="form-control">
                        </div>
                        <div class="container py-3">
                            <label for="">Rent amount</label>
                            <input type="number" name="property_rent_amount" value="{{ $units->property_rent_amount }}"
                                required class="form-control">
                        </div>
                        <div class="container py-3">
                            <label for="">Available for rent</label>
                            <div class="form-check py-3">
                                <input class="form-check-input" type="radio" name="is_available" id="is_available"
                                    value="0" @if ($units->is_available == 0) checked @endif>
                                <label class="form-check-label" for="is_available">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_available" id="is_available" checked
                                    value="1" @if ($units->is_available == 1) checked @endif>
                                <label class="form-check-label" for="is_available">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="container py-3">
                            <button class="btn btn-primary">Update Unit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
