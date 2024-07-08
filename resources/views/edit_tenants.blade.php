@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Edit Tenants!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h1>Edit tenants</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('update_tenants',$get_tenant->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Properties</label>
                            <select name="property_id" id="property_id" onchange="get_unit()" required class="form-control">
                                <option value="" disabled selected></option>
                                @foreach ($get_properties as $get_property)
                                    @php
                                        $get_propertybyTenant = App\Models\Unit::where(
                                            'id',
                                            $get_tenant->unit_id,
                                        )->first();
                                    @endphp
                                    <option value="{{ $get_property->id }}" title="{{ $get_property->address }}"
                                        @if ($get_property->id == $get_propertybyTenant->property_id) selected @endif>
                                        {{ $get_property->property_name }}
                                        {{ $get_property->address }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Unit</label>
                            <select name="units" class="form-control" id="units" required>
                                <option value=""disabled selected></option>
                                @foreach ($get_properties as $get_property)
                                    @php
                                        $get_units = App\Models\Unit::where('property_id', $get_property->id)->get();
                                    @endphp
                                    @foreach ($get_units as $get_unit)
                                        <option value="{{ $get_unit->id }}"
                                            @if ($get_unit->id == $get_tenant->unit_id) selected @endif>{{ $get_unit->unit_name }}
                                        </option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <label for="">First name</label>
                        <input type="text" name="first_name" value="{{ $get_tenant->first_name }}" required
                            class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Last name</label>
                        <input type="text" name="last_name" value="{{ $get_tenant->last_name }}" required
                            class="form-control">
                    </div>
                   
                    <div class="col-md-6">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ $get_tenant->email }}" required
                            class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Phone number</label>
                        <input type="text" name="phone_number" value="{{ $get_tenant->phone_number }}" required
                            class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Date of birth</label>
                        <input type="date" name="date_of_birth" value="{{ $get_tenant->date_of_birth }}" required
                            class="form-control">
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Lease start date</label>
                            <input type="date" name="lease_start_date" value="{{ $get_tenant->lease_start_date }}"
                                required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Lease end date</label>
                            <input type="date" name="lease_end_date" value="{{ $get_tenant->lease_end_date }}" required
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control"><br>
                        <p>Preview</p>
                        <img src="{{ asset('tenants_image/' . $get_tenant->image . ' ') }}" alt="" style="width: 168px;" class="img-thumb">
                    </div>
                    <div class="col-md-12">
                        <button class="red-btn">Save changes</button>
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
                    $('#units').empty();
                    response.data.forEach(function(item, index) {
                        
                        $('#units').append('<option value="' + item.id + '">' + item.unit_name +
                            '</option>');
                    });
                }
            })
        }
    </script>
@endpush
