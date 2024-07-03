@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Property details!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>

        <div class="property-sec1">
            <div class="container-fluid">
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
                        <table class="table table-hover data-table">
                           
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Unit</th>
                                        <th>Current Status</th>
                                        <th>Future Status</th>
                                        <th>Listing Status</th>
                                        <th>Open For Applications</th>
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
@endsection 
@push('custom_js') 

    <script type="text/javascript">
        $(function() {
            var table = $('.data-table').DataTable({
                processing: false,
                serverSide: true,
                ajax: "{{ route('property_details', $id) }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    
                    {
                        data: 'Unit',
                        name: 'Unit'
                    },
                    {
                        data: 'current_status',
                        name: 'current_status'
                    },
                    {
                        data: 'future_status',
                        name: 'future_status'
                    },
                    {
                        data: 'listing_status',
                        name: 'listing_status'
                    },
                    {
                        data: 'open_application',
                        name: 'open_application'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

        });
    </script> 
    <script>
        function deleteUnitCofirm(id) {
            Swal.fire({
                title: "Do you want to Delist this unit?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Yes",
                denyButtonText: `No`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        'url': "/delete_unit/" + id + " ",
                        'type': 'get',
                        success: function(response) {
                            Swal.fire("Unit Delisted successfuly", "", "success");
                            location.reload();
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire("Delisted unit Cancelled", "", "info");
                }
            });
        }


        function listUnitCofirm(id) {
            Swal.fire({
                title: "Do you want to list this unit again?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Yes",
                denyButtonText: `No`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        'url': "/list_unit/" + id + " ",
                        'type': 'get',
                        success: function(response) {
                            Swal.fire("Unit listed successfuly", "", "success");
                            location.reload();
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire("listed unit Cancelled", "", "info");
                }
            });
        }
    </script>
@endpush
