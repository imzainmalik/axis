@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>All Owners!</h6>
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
                            <h4>{{ $owners->count() }} <span>Owners</span></h4>
                            <a href="{{ route('add_owners') }}" class="btn btn-primary text-white">Create Owners</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="one-row-elem">
                            <div class="property-search">
                                <input type="search" placeholder="Search Owners">
                                <button><i class="fas fa-search"></i></button>
                            </div>
                            <ul class="togg-btn">
                                <li class="first"><i class="fal fa-sliders-h"></i></li>
                                <ul class="togg-drop">
                                    <li class="first"><a href="javascript:;">Sort By:Area</a></li>
                                    <li class="last"><a href="javascript:;">Sort By:Date</a></li>
                                </ul>
                            </ul>
                        </div>
                        <table class="table table-hover data-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Owner</th>
                                    <th>Properties</th>
                                    <th>Contact Information</th>
                                    <th>Owner Portal</th>
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
                ajax: "{{ route('owners') }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'owner',
                        name: 'owner'
                    },
                    {
                        data: 'properties',
                        name: 'properties'
                    },
                    {
                        data: 'contact_Information',
                        name: 'contact_Information'
                    },
                    {
                        data: 'owner_portal',
                        name: 'owner_portal'
                    },
                    {
                        data: 'action',
                        name: 'action' , sortable: false,
                    }
                ]
            });
        }); 
    </script>
@endpush