@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Create Tenants!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h1>Create tenants</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('create_tenants') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="">Properties</label>
                            <select name="property_id" id="property_id" onchange="get_unit()" required class="form-control">
                                <option value="" disabled selected></option>
                                @foreach ($get_properties as $get_property)
                                    <option value="{{ $get_property->id }}" title="{{ $get_property->address }}">
                                        {{ $get_property->property_name }} <br>
                                        <small>{{ $get_property->address }}</small>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="">Unit</label>
                            <select name="units" class="form-control" id="units" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 py-4">
                        <label for="">First name</label>
                        <input type="text" name="first_name" required class="form-control">
                    </div>
                    <div class="py-3">
                        <label for="">last name</label>
                        <input type="text" name="last_name" required class="form-control">
                    </div>
                    <div class="py-3">
                        <label for="">Image</label>
                        <input type="file" name="image" required class="form-control">
                    </div>
                    <div class="py-3">
                        <label for="">Email</label>
                        <input type="email" name="email" required class="form-control">
                    </div>
                    <div class="py-3">
                        <label for="">Phone number</label>
                        <input type="phone" name="phone_number" required class="form-control">
                    </div>
                    <div class="py-3">
                        <label for="">Date of birth</label>
                        <input type="date" name="date_of_birth" required class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-6 py-3">
                            <label for="">Lease start date</label>
                            <input type="date" name="lease_start_date" required class="form-control">
                        </div>
                        <div class="col-6 py-3">
                            <label for="">Lease end date</label>
                            <input type="date" name="lease_end_date" required class="form-control">
                        </div>
                    </div>
                    <div class="py-3">
                        <button class="btn btn-primary">Create Tenant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script>
        function get_unit() {
            var property_id = document.getElementById('property_id').value;
            $.ajax({
                'url': '/get_units_by_property/' + property_id + ' ',
                'type': 'get',

                success: function(response) {
                    // var block = '<option value="'++'"></option>'
                    response.data.forEach(function(item, index) {
                        $('#units').append('<option value="' + item.id + '">' + item.unit_name +
                            '</option>');
                    });
                }
            })
        }
    </script>
@endpush
