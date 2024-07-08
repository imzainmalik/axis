@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>All Tasks!</h6>
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
                            <h4>{{ $tasks->count() }} <span>All Tasks</span></h4>
                            <a href="{{ route('create_task_maintenance') }}" class="black-btn">Create Tasks</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12"> 
                        <table class="table table-hover data-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Task</th>
                                    <th>Assigned to</th>
                                    <th>Priority</th>
                                    <th>Related to</th>
                                    <th>Status</th>
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
                ajax: "{{ route('task_maintenance') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'task',
                        name: 'task'
                    },
                    {
                        data: 'assigned_to',
                        name: 'assigned_to'
                    },
                    {
                        data: 'priority',
                        name: 'priority'
                    },
                    {
                        data: 'related_to',
                        name: 'related_to'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        sortable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        sortable: false,
                    },
                ]
            });
        });
    </script>
@endpush
