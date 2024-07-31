@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Rent roll!</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="tenants-sec2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Unit Number</th>
                                        <th>Tenant Name</th>
                                        <th>Lease Status</th>
                                        <!-- Add more columns as needed -->
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
                ajax: "{{ route('rent_roll') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'unit_num',
                        name: 'unit_num'
                    },
                    {
                        data: 'tenant_name',
                        name: 'tenant_name'
                    },
                    {
                        data: 'lease_status',
                        name: 'lease_status'
                    }
                    // Add more columns as needed
                ],
            });
        });
    </script>
@endpush
