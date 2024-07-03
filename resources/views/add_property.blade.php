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
                        <div class="container py-3">
                            <label for="">Unit</label>
                            <input type="number" name="unit" required class="form-control">
                        </div>
                        <div class="container py-3">
                            <label for="">Address</label>
                            <input type="text" name="address" required class="form-control">
                        </div>
                        <div class="container py-3">
                            <button class="btn btn-primary">Create property</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
