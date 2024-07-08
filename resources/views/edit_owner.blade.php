@extends('layouts.app')
@section('content')


    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Edit Owner!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h1>Edit Owners</h1>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="py-4">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div> <br> <br>
                @endif

                <form action="{{ route('update_owner', $id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="">Properties</label>
                            <select name="property_id" id="property_id" onchange="get_unit()" class="form-control">
                                {{-- <option value="" disabled selected></option> --}}
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
                            <select name="units[]" class="form-control" id="units" multiple>
                                <option value=""></option>
                                @foreach ($property_owners as $property_owner)
                                    @php
                                        $get_units = App\Models\Unit::where('id', $property_owner->unit_id)->first();
                                    @endphp
                                    <option value="{{ $property_owner->unit_id }}"
                                        @if ($get_units->id == $property_owner->unit_id) selected @endif>{{ $get_units->unit_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 py-4">
                        <label for="">First name</label>
                        <input type="text" name="first_name" value="{{ $owner_details->first_name }}" required
                            class="form-control">
                    </div>
                    <div class="py-3">
                        <label for="">last name</label>
                        <input type="text" name="last_name"value="{{ $owner_details->last_name }}" required
                            class="form-control">
                    </div>
                    <div class="py-3">
                        <label for="">Image</label>
                        <input type="file" name="image" value="{{ old('image') }}" class="form-control">
                        <br>
                        <p>Preview</p>
                        <img src="{{ asset('owners_image/'.$owner_details->image.' ') }}" style="width: 80px;" alt="" srcset="">
                    </div>
                    <div class="py-3">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ $owner_details->email }}" required
                            class="form-control">
                    </div>
                    <div class="py-3">
                        <label for="">Phone number</label>
                        <input type="phone" name="phone_number" value="{{ $owner_details->phone_number }}" required
                            class="form-control">
                    </div>
                    <div class="py-3">
                        <button class="btn btn-primary">Update Owners</button>
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
