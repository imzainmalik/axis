@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>All Tenants!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>

        <div class="tenants-sec1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="tenant-box">
                            <div class="hd">
                                <h6>Balance Due</h6>
                                <ul class="togg-btn">
                                    <li class="first"><i class="fal fa-ellipsis-h"></i></li>
                                    <ul class="togg-drop">
                                        <li class="first"><a href="javascript:;">Edit</a></li>
                                        <li class="last"><a href="javascript:;">Delete</a></li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="txt">
                                <h3>FCFA {{ $totalDueBalance }}</h3>
                                <a href="javascript:;">See Tenants</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tenant-box">
                            <div class="txt">
                                <h4>Monthly Rent</h4>
                                <a href="{{ route('create_rent') }}" class="black-btn">Monthly Rent</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tenant-box">
                            <div class="txt">
                                <h4>{{ $get_tenants->count() }} <span>Tenants</span></h4>
                                <a href="{{ route('add_tenants') }}" class="black-btn">Create Tenants</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="tenants-sec2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> 
                        <table class="table table-hover data-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tenant</th>
                                    <th>Contact Info</th>
                                    <th>Balance</th>
                                    {{-- <th>Tenant Portal Status</th> --}}
                                    <th>Action</th>
                                    {{-- <th></th> --}}
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
            ajax: "{{ route('tenants') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'tenant',
                    name: 'tenant'
                },
                {
                    data: 'contact_Info',
                    name: 'contact_Info'
                },
                {
                    data: 'balance',
                    name: 'balance'
                },
                // {
                //     data: 'tenant_portal_status',
                //     name: 'tenant_portal_status'
                // },
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
    <script>
        function deleteTenantCofirm(id) {
            Swal.fire({
                title: "Do you want to Delete this Tenant?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Yes",
                denyButtonText: `No`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        'url': "/delete_tenant/" + id + " ",
                        'type': 'get',
                        success: function(response) {
                            Swal.fire("Tenant Deleted successfuly", "", "success");
                            location.reload();
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire("Deleting Tenant Cancelled", "", "info");
                }
            });
        }
    </script>
@endpush
