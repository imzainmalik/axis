@extends('layouts.app')
@section('content')
<style>
.badge-danger {
    display: inline-block;
    padding: .35em .65em;
    font-size: .75em;
    font-weight: 700;
    line-height: 1;
    color: #ffffff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    background-color: red;
}

.badge-success {
    display: inline-block;
    padding: .35em .65em;
    font-size: .75em;
    font-weight: 700;
    line-height: 1;
    color: #ffffff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    background-color: rgb(0, 255, 55);
}
</style>
<div class="main-area">
    <div class="top-main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="hello">
                        <h6>Tasks details!</h6>
                    </div>
                </div>
                @include('includes.sub_header')
            </div>
        </div>
    </div>
    @php
    $property = App\Models\Property::where('id', $task->related_to)->first();
    $unit = App\Models\Unit::where('id', $task->unit)->first();
    @endphp
    <div class="card">
        <div class="card-header">
            <h3 class="page-title float-left mb-0">Tasks details</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Subject</th>
                                <td>{{ $task->subject }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $task->description }}</td>
                            </tr>
                            <tr>
                                <th>Start date</th>
                                <td>{{ $task->start_date ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>End date</th>
                                <td>{{ $task->end_date ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Frequency</th>
                                <td>{{ $task->frequency ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Days untill due</th>
                                <td>{{ $task->days_until_due ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Repeat Forever</th>
                                <td>{{ $task->repeat_forever ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Task Type</th>
                                @if ($task->recurring == 0)
                                <td>One-time</td>
                                @else
                                <td>Recuring</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $task->status ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Assignees</th>
                                <td>{{ $task->assignees ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Notify Assignees</th>
                                <td>
                                    @if ($task->notify_assignees == 'off')
                                    <div class="badge badge-danger">Not notified</div>
                                    @else
                                    <div class="badge badge-success">Notification send</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Property</th>
                                <td>{{ $property->property_name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Unit</th>
                                <td>{{ $unit->unit_name ?? '' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div><!-- Nav tabs -->

        </div>
    </div>
</div>
@endsection