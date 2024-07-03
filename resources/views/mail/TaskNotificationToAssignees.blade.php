@php
    $property = App\Models\Property::where('id', $task->related_to)->first();
    $unit = App\Models\Unit::where('id', $task->unit)->first();
@endphp

<style>
    .card {
    --bs-card-spacer-y: 1rem;
    --bs-card-spacer-x: 1rem;
    --bs-card-title-spacer-y: 0.5rem;
    --bs-card-border-width: 1px;
    --bs-card-border-color: var(--bs-border-color-translucent);
    --bs-card-border-radius: 0.375rem;
    --bs-card-box-shadow: ;
    --bs-card-inner-border-radius: calc(0.375rem - 1px);
    --bs-card-cap-padding-y: 0.5rem;
    --bs-card-cap-padding-x: 1rem;
    --bs-card-cap-bg: rgba(0, 0, 0, 0.03);
    --bs-card-cap-color: ;
    --bs-card-height: ;
    --bs-card-color: ;
    --bs-card-bg: #fff;
    --bs-card-img-overlay-padding: 1rem;
    --bs-card-group-margin: 0.75rem;
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    height: var(--bs-card-height);
    word-wrap: break-word;
    background-color: var(--bs-card-bg);
    background-clip: border-box;
    border: var(--bs-card-border-width) solid var(--bs-card-border-color);
    border-radius: var(--bs-card-border-radius);
}
.card-header:first-child {
    border-radius: var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius) 0 0;
}
.card-header {
    padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
    margin-bottom: 0;
    color: var(--bs-card-cap-color);
    background-color: var(--bs-card-cap-bg);
    border-bottom: var(--bs-card-border-width) solid var(--bs-card-border-color);
}
.card-body {
    flex: 1 1 auto;
    padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
    color: var(--bs-card-color);
}
</style>

<div class="card">
    <div class="card-header">
        <h3 class="page-title float-left mb-0">Tasks details</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
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
        </div><!-- Nav tabs -->

    </div>
</div>
