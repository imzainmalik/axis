@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Edit Leases!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6>Edit Lease</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('lease_update', $lease->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="">Property</label>
                            <select name="property_id" id="property_id" required class="form-control" onchange="get_unit()">
                                <option value="" disabled></option>
                                @foreach ($units as $unit)
                                    @php
                                        $property = App\Models\Property::where('id', $unit->property_id)->first();
                                    @endphp
                                    <option value="{{ $property->id }}" @if ($property->id == $lease->property_id) selected @endif>
                                        {{ $property->property_name }}</option>
                                @endforeach

                                @foreach ($properties as $item)
                                    <option value="{{ $item->id }}">{{ $item->property_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">

                            <label for="">Unit</label>
                            <select name="unit_id" id="unit_id" multiple required class="form-control">
                                <option value="" disabled></option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}" @if ($unit->id == $lease->unit_id) selected @endif>
                                        {{ $unit->unit_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <label for="">Tenant</label>
                            <select name="tenant_id" id="tenant_id" required class="form-control">
                                <option value="" disabled selected></option>
                                @foreach ($tenants as $tenant)
                                    <option value="{{ $tenant->id }}" @if ($tenant->id == $lease->tenant_id) selected @endif>
                                        {{ $tenant->first_name }} {{ $tenant->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="">Owners</label>
                            <select name="owner_id" id="owner_id" required class="form-control">
                                <option value="" disabled selected></option>
                                @foreach ($owners as $owner)
                                    <option value="{{ $owner->id }}" @if ($owner->id == $lease->owner_id) selected @endif>
                                        {{ $owner->first_name }} {{ $owner->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <label for="">Start Date</label>
                            <input type="date" value="{{ $lease->start_date }}" name="start_date" id="start_date"
                                required class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="">End Date</label>
                            <input type="date" value="{{ $lease->end_date }}" name="end_date" id="end_date" required
                                class="form-control">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="col-6">
                        <label for="">Rent Amount</label>
                        <input type="text" value="{{ $lease->rent_amount }}" name="rent_amount" id="rent_amount"
                            required class="form-control">
                    </div>
                    <br>
                    <div class="col-6">
                        <button class="btn btn-primary">Save changes</button>
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
            // console.log(property_id);
            $.ajax({
                'url': '/get_units_by_property/' + property_id + ' ',
                'type': 'get',

                success: function(response) {
                    $('#unit_id').empty();
                    // var block = '<option value="'++'"></option>'
                    response.data.forEach(function(item, index) {

                        $('#unit_id').append('<option value="' + item.id + '">' + item.unit_name +
                            '</option>');
                    });
                }
            })
        }
    </script>
@endpush
