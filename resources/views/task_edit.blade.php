@extends('layouts.app')
@section('content')
<div class="main-area">
    <div class="top-main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="hello">
                        <h6>Create Tasks!</h6>
                    </div>
                </div>
                @include('includes.sub_header')
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Create Task</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks_store') }}" method="POST">
                @csrf
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" value="{{ $task->subject }}" required id="subject"
                            name="subject">
                    </div>
                    <div class="col-md-6">
                        <label for="status">Status *</label>
                        <select class="form-control" required id="status" name="status" required>
                            <option value="Not Started" @if ($task->status == 'Not Started') selected @endif>Not Started
                            </option>
                            <option value="Received" @if ($task->status == 'Received') selected @endif>Received</option>
                            <option value="In Progress" @if ($task->status == 'In Progress') selected @endif>In Progress
                            </option>
                            <option value="Completed" @if ($task->status == 'Completed') selected @endif>Completed
                            </option>
                            <option value="Archived" @if ($task->status == 'Archived') selected @endif>Archived</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="description">Description</label>
                        <textarea class="form-control" required id="description" name="description"
                            rows="3">{{ $task->description }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="task_type">Task Type</label><br>
                        <input type="radio" id="one_time" class="form-check-input" @if ($task->recurring == 0) checked
                        @endif name="task_type" value="one_time">
                        <label for="one_time">One Time Task</label><br>
                        <input type="radio" id="recurring" class="form-check-input" @if ($task->recurring == 1) checked
                        @endif name="task_type" value="recurring">
                        <label for="recurring">Recurring Task</label>
                    </div>
                    <div id="recurring_fields" class=" col-md-6" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="start_date">Start Date *</label>
                                <input type="date" class="form-control" id="start_date" value="{{ $task->start_date }}"
                                    name="start_date">
                            </div>
                            <div class="col-md-6" id="end_date_group">
                                <label for="end_date">End Date *</label>
                                <input type="date" class="form-control" id="end_date" value="{{ $task->end_date }}"
                                    name="end_date">
                            </div>
                            <div class="col-md-6">
                                <label for="frequency">Frequency *</label>
                                <select name="frequency" class="form-control" id="frequency">
                                    <option value="" disabled></option>
                                    <option value="Daily" @if ($task->frequency == 'Daily') selected @endif>Daily
                                    </option>
                                    <option value="Weekly" @if ($task->frequency == 'Weekly') selected @endif>Weekly
                                    </option>
                                    <option value="Every 2 Weeks" @if ($task->frequency == 'Every 2 Weeks') selected
                                        @endif>Every 2
                                        Weeks</option>
                                    <option value="Monthly" @if ($task->frequency == 'Monthly') selected @endif>Monthly
                                    </option>
                                    <option value="Every 2 Months" @if ($task->frequency == 'Every 2 Months') selected
                                        @endif>Every 2
                                        Months</option>
                                    <option value="Quarterly" @if ($task->frequency == 'Quarterly') selected
                                        @endif>Quarterly
                                    </option>
                                    <option value="Every 6 Months" @if ($task->frequency == 'Every 6 Months') selected
                                        @endif>Every 6
                                        Months</option>
                                    <option value="Annually" @if ($task->frequency == 'Annually') selected
                                        @endif>Annually
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="days_until_due">Number of days until due</label>
                                <input type="number" min="0" class="form-control" value="{{ $task->days_until_due }}"
                                    id="days_until_due" name="days_until_due">
                            </div>
                            <div class="col-md-6">
                                <div class="fld-pad">
                                    <input type="checkbox" class="form-check-input" @if ($task->repeat_forever == 'on')
                                    checked
                                    @endif id="repeat_forever"
                                    name="repeat_forever">
                                    <label class="form-check-label" for="repeat_forever">Repeat Forever</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="priority">Priority</label>
                        <select class="form-control" required id="priority" name="priority">
                            <option value="Low" @if ($task->priority == 'Low') selected @endif>Low</option>
                            <option value="Medium" @if ($task->priority == 'Medium') selected @endif>Medium</option>
                            <option value="High" @if ($task->priority == 'High') selected @endif>High</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="assignees">Assignees <small>(If multiple assignees use comma
                                saperated)</small></label>
                        <input type="text" class="form-control" required
                            placeholder="Ex. someone@etc.com, someone@etc.com" id="assignees" name="assignees"
                            value="{{ $task->assignees }}">
                    </div>
                    <div class="col-md-6">
                        <label for="property_id">Related To</label>
                        <select class="form-control" onchange="get_unit()" required id="property_id" name="related_to">
                            <option value="" disabled>Property</option>
                            <option value="{{ $property->id }}" selected>{{ $property->property_name }}</option>
                            @foreach ($properties as $item)
                            <option value="{{ $item->id }}">{{ $item->property_name }}</option>
                            @endforeach
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Unit</label>
                        <select name="unit" class="form-control" id="units" required>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-check py-4">
                        <input type="checkbox" class="form-check-input" @if ($task->notify_assignees == 'on') checked
                        @endif id="notify_assignees" name="notify_assignees">
                        <label class="form-check-label" for="notify_assignees">Notify Assignees</label>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="red-btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const recurringFields = document.getElementById('recurring_fields');
    const taskTypeRadios = document.querySelectorAll('input[name="task_type"]');
    const repeatForeverCheckbox = document.getElementById('repeat_forever');
    const endDateGroup = document.getElementById('end_date_group');

    taskTypeRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            // console.log('ss');
            if (this.value === 'recurring') {
                recurringFields.style.display = 'block';
            } else {
                recurringFields.style.display = 'none';
            }
        });
    });

    repeatForeverCheckbox.addEventListener('change', function() {
        if (this.checked) {
            endDateGroup.style.display = 'none';
        } else {
            endDateGroup.style.display = 'block';
        }
    });
});

function get_unit() {
    var property_id = document.getElementById('property_id').value;
    $.ajax({
        'url': '/get_units_by_property/' + property_id + ' ',
        'type': 'get',

        success: function(response) {
            // var block = '<option value="'++'"></option>'
            response.data.forEach(function(item, index) {
                $('#units').append('<option value="' + item.id + '">' + item.unit_name +
                    '</option>');
            });
        }
    })
}
</script>
@endpush