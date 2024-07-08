@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>All Leases!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>
        <div class="owners-sec1">
            <div class="container-fluid">

                <div class="col-md-4">
                    <div class="tenant-box">
                        <div class="txt">
                            <h4>{{ $lease->count() }} <span>All Leases</span></h4>
                            <a href="{{ route('lease_add') }}" class="btn btn-primary text-white">Create Lease</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12"> 
                        <table class="table table-hover data-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Owner</th>
                                    <th>Tenant</th>
                                    <th>Property</th>
                                    <th>Unit</th>
                                    <th>Rent Amount</th>
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
        $(document).ready(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('leases') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'owner',
                        name: 'owner'
                    },
                    {
                        data: 'tenant',
                        name: 'tenant'
                    },
                    {
                        data: 'property',
                        name: 'property'
                    },
                    {
                        data: 'unit',
                        name: 'unit'
                    },
                    {
                        data: 'rent_amount',
                        name: 'rent_amount'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        sortable: false,
                    }
                ]
            });
        });

        function lease_inactive(id) {
            Swal.fire({
                title: "Do you want to Inactivate this Lease?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Yes",
                denyButtonText: `No`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        'url': "/lease_inactive/" + id + " ",
                        'type': 'get',
                        success: function(response) {
                            Swal.fire("Lease Inactivated successfuly", "", "success");
                            location.reload();
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire("Lease Inactivation Cancelled", "", "info");
                }
            });
        }

        function lease_activate(id) {
            Swal.fire({
                title: "Do you want to Activate this Lease?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Yes",
                denyButtonText: `No`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        'url': "/lease_active/" + id + " ",
                        'type': 'get',
                        success: function(response) {
                            Swal.fire("Lease Activated successfuly", "", "success");
                            location.reload();
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire("Lease Activation Cancelled", "", "info");
                }
            });
        }
    </script>
@endpush
