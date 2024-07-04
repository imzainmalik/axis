@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/core@4.3.1/main.min.css">
<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.css">
<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.css">
<script src="https://unpkg.com/@fullcalendar/core@4.3.1/main.min.js"></script>
<script src="https://unpkg.com/@fullcalendar/interaction@4.3.0/main.min.js"></script>
<script src="https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.js"></script>
<script src="https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.js"></script>  
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Calender!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>


        <div class="calendar-sec">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var Calendar = FullCalendar.Calendar;
            var calendarEl = document.getElementById('calendar');

            // Initialize the calendar
            var calendar = new Calendar(calendarEl, {
                plugins: ['dayGrid', 'timeGrid'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                editable: true, // Enable dragging and resizing events
                events: [
                    // You can optionally prepopulate events here
                ],
                contentHeight: 'auto', // Adjust height dynamically based on content
                height: 'auto', // Adjust height dynamically based on content
                timeZone: 'local', // Use local timezone
                eventClick: function(info) {
                    var date = info.event.start;
                    var title = prompt('Enter event title:');
                    if (title) {
                        calendar.addEvent({
                            title: title,
                            start: date,
                            allDay: true // All events are all-day by default on month view
                        });
                    }
                },
                // dateClick: function(info) {
                //     var date = info.dateStr;
                //     var title = prompt('Enter event title:');
                //     if (title) {
                //         calendar.addEvent({
                //             title: title,
                //             start: date,
                //             allDay: true // All events are all-day by default on month view
                //         });
                //     }
                // }
            });

            calendar.render();

            // Add text dynamically to specific dates
            var eventTexts = {
                @foreach($tasks as $task)
                    "{{ $task->start_date }}": "{{ $task->subject }}", 
                @endforeach
                // Add more dates and texts as needed
            };

            calendar.addEventSource({
                events: function(info, successCallback, failureCallback) {
                    var events = [];
                    Object.keys(eventTexts).forEach(function(date) {
                        events.push({
                            title: eventTexts[date],
                            start: date,
                            allDay: true // All events are all-day by default on month view
                        });
                    });
                    successCallback(events);
                }
            });
        });
    </script>
@endpush
