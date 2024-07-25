@extends('layouts.app')
@section('content')
<div class="main-area">
    <div class="top-main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="hello">
                        <h6>All Properties!</h6>
                    </div>
                </div>
                @include('includes.sub_header')
            </div>
        </div>
    </div>

    <div class="property-sec1">
        <div class="Container container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="one-row-elem">
                            <div class="property-search">
                                <input type="search" placeholder="Search Property">
                                <button><i class="fas fa-search"></i></button>
                            </div>
                            <ul class="togg-btn">
                                <li class="first"><i class="fal fa-sliders-h"></i></li>
                                <ul class="togg-drop">
                                    <li class="first"><a href="javascript:;">Sort By:Area</a></li>
                                    <li class="last"><a href="javascript:;">Sort By:Date</a></li>
                                </ul>
                            </ul>
                        </div> -->
                    <div class="table-responsive">
                        <table class="table table-hover data-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Property</th>
                                    <th>Type</th>
                                    <th>Active Units</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
<script type="text/javascript">
$(document).ready(function() {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('properties') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'property',
                name: 'property'
            },
            {
                data: 'type',
                name: 'type'
            },
            {
                data: 'units',
                name: 'units'
            },
            {
                data: 'action',
                name: 'action',
            }
        ]
    });
});
// $.ajax({
//     url: "{{ route('properties') }}",
//     method: "GET",
//     success: function(data) {
//         console.log(data); // Check the data structure here
//     },
//     error: function(xhr, status, error) {
//         console.error(error);
//     }
// });
</script>
@endpush