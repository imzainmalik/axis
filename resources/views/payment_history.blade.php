@extends('layouts.app')
@section('content')
<style>
    table .past {
    font-size: 10px;
    font-weight: 400;
    color: wheat;
    background-color: red;
    border-radius: 10px;
    padding: 5px 10px;
    margin-left: 15px;
}
</style>
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Payments History!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>

        <div class="owners-sec1">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-md-12"> 
                        <table class="table table-hover data-table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Tenant</th>
                                    <th scope="col">Property</th>
                                    <th scope="col">Rent of month</th>
                                    <th scope="col">Pay Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Payment status</th>
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
                ajax: "{{ route('payment_history', $tenant_id) }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    }, 
                    {
                        data: 'tenant',
                        name: 'tenant'
                    },
                    {
                        data: 'property_details',
                        name: 'property_details'
                    },
                    {
                        data: 'rent_of_month',
                        name: 'rent_of_month'
                    },
                    {
                        data: 'payment_date',
                        name: 'payment_date'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'payment_status',
                        name: 'payment_status',
                        sortable: false,
                    }
                ]
            });
        });
    </script>
@endpush
