@extends('layouts.app')
@section('content')


    </style>
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Add Properties!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>
        <div class="send-app">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <div class="txt">
                            <p>Vitae pulvinar faucibus amet lectus. Nunc eget dui ut ullamcorper a lacus pretium
                                porttitor. In adipiscing ultrices risus cursus.</p>
                            <div class="btns">
                                <a href="#" class="white-btn">Send Application</a>
                                <a href="#" class="link-btn">Get Shareable Link</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 p-0">
                        <div class="img-box">
                            <img src="assets/images/send.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="stats-sec1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Occupancy Rate</h6>
                            </div>
                            <div class="chart-container">
                                <div id="donutchart"></div>
                                <div class="legend">
                                    <div class="legend-item">
                                        <div class="legend-color" style="background-color: #FF3A29;"></div>
                                        <div class="legend-text">Vacant <span>{{ $occupancyRate['vacant_percentage'] }}% -
                                                {{ $occupancyRate['vacant'] }} Units</span></div>
                                    </div>
                                    <div class="legend-item">
                                        <div class="legend-color" style="background-color: #FFE5D3;"></div>
                                        <div class="legend-text">Occupied <span>{{ $occupancyRate['occupied_percentage'] }}%
                                                - {{ $occupancyRate['occupied'] }} Units</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Recent Tenant Requests</h6>
                            </div>
                            <div class="txt">
                                <h4>Nothing Here Yet</h4>
                                <p>Please add data, refresh the page, or reset your filters</p>
                                <a href="#" class="grey-btn"><i class="fas fa-sync-alt"></i> Refresh</a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-9">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Leasing Activity Next 7 Days</h6>
                            </div>
                            <div class="txt" id="Leasing_Activity"
                                @if ($leasingActivities->count() > 0) style=" height: 27%;" @endif>
                                @if ($leasingActivities->count() > 0)
                                    @foreach ($leasingActivities as $leasingActivity)
                                        <div class="scroll-elem col-12">
                                            <div class="balance-box">
                                                <div class="left">
                                                    <i class="fas fa-info-circle"></i>
                                                    <div class="txt-left">
                                                        <h6>{{ $leasingActivity->Owners->first_name . ' ' . $leasingActivity->Owners->last_name }}
                                                        </h6>
                                                        <p>{{ $leasingActivity->Unit->Property->property_name }} -
                                                            {{ $leasingActivity->Unit->unit_name }}</p>
                                                    </div>
                                                </div>
                                                <div class="right">
                                                    <p>{{ $leasingActivity->start_date }} - {{ $leasingActivity->end_date }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h4>Nothing Here Yet</h4>
                                    <p>Please add data, refresh the page, or reset your filters</p>
                                    {{-- <a href="#" id="refresh-leasing-activities" class="grey-btn"><i class="fas fa-sync-alt"></i> Refresh</a> --}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="stats-sec2 no-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Leases With Outstanding Balances</h6>
                            </div>
                            <div class="scroll-elem">
                                @if ($leaseWithoutstanding_balance->count() > 0)
                                    @foreach ($leaseWithoutstanding_balance as $leaseWithoutstanding_balances)
                                        <div class="balance-box">
                                            <div class="left">
                                                <i class="fas fa-info-circle"></i>
                                                <div class="txt-left">
                                                    <h6>{{ $leaseWithoutstanding_balances->tenant->first_name }}</h6>
                                                    <p>{{ $leaseWithoutstanding_balances->Unit->Property->property_name }}
                                                        - {{ $leaseWithoutstanding_balances->Unit->unit_name }}</p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <p>FCFA {{ $leaseWithoutstanding_balances->amount }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h4>Nothing Here Yet</h4>
                                    <p>Please add data, refresh the page, or reset your filters</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Things To Do</h6>
                            </div>
                            <div class="scroll-elem">
                                @if ($task_due_date->count() > 0)
                                    {{-- @foreach ($task_due_date as $item) --}}
                                    <div class="balance-box past-box">
                                        <div class="left">
                                            <i class="fas fa-info"></i>
                                            <div class="txt-left">
                                                <h6>Past Due Tasks</h6>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <p>{{ $task_due_date->count() }}</p>
                                        </div>
                                    </div>
                                @else
                                    <h4>Nothing Here Yet</h4>
                                    <p>Please add data, refresh the page, or reset your filters</p>
                                    {{-- @endforeach --}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="stats-sec3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Occupancy Rate</h6>
                            </div>
                            <div class="bar-chart">
                                <div class="chart-container">
                                    <div id="columnchart_material"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Recent Payment Recieved</h6>
                            </div>
                            <div class="scroll-elem">
                                @if ($recent_payment_recieved->count() > 0)
                                    @foreach ($recent_payment_recieved as $recent_payment_recieved)
                                        <div class="balance-box">
                                            <div class="left">
                                                <i class="fas fa-info-circle"></i>
                                                <div class="txt-left">
                                                    <h6>{{ $recent_payment_recieved->tenant->first_name }}</h6>
                                                    <p>{{ $recent_payment_recieved->Unit->Property->property_name }}
                                                        - {{ $recent_payment_recieved->Unit->unit_name }}</p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <p>FCFA {{ $recent_payment_recieved->amount }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h4>Nothing Here Yet</h4>
                                    <p>Please add data, refresh the page, or reset your filters</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Task-My Next 7 Days</h6>
                            </div>
                            @if ($tasksDueInNext7Days->count() > 0)
                                @foreach ($tasksDueInNext7Days as $item)
                                    <div class="balance-box">
                                        <div class="left">
                                            <i class="fas fa-info-circle"></i>
                                            <div class="txt-left">
                                                <h6>{{ $item->subject }}</h6>
                                                <p>{{ $item->start_date }}
                                                    - {{ $item->end_date }}</p>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <p>{{ $item->status }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="txt">
                                    <h4>Nothing Here Yet</h4>
                                    <p>Please add data, refresh the page, or reset your filters</p>
                                    <a href="#" class="grey-btn"><i class="fas fa-sync-alt"></i> Refresh</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Task-Open by Status</h6>
                            </div>
                            @if ($tasksByStatus->count() > 0)
                                @foreach ($tasksByStatus as $item)
                                    <div class="balance-box">
                                        <div class="left">
                                            <i class="fas fa-info-circle"></i>
                                            <div class="txt-left">
                                                <h6>{{ $item->status }}</h6>

                                            </div>
                                        </div>
                                        <div class="right">
                                            <p>{{ $item->total }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="txt">
                                    <h4>Nothing Here Yet</h4>
                                    <p>Please add data, refresh the page, or reset your filters</p>
                                    <a href="#" class="grey-btn"><i class="fas fa-sync-alt"></i> Refresh</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="stats-sec3">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8">
                        <div class="map-img-main">
                            <img src="assets/images/map1.png" usemap="#image-map">

                            {{-- <img src="map-main.png" usemap="#image-map"> --}}
                            <map name="image-map">
                                <area target="" alt="butique" title="butique" href="#" coords="835,242,96"
                                    shape="circle"></area>
                            </map>
                            {{-- <img src="assets/images/map1.png" alt=""> --}}
                            <div class="txt">
                                <a href="map-properties.php" class="white-btn">View Full Map</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </div>
@endsection

@push('custom_js')
    <script>
        $(document).ready(function() {
            $('#refresh-leasing-activities').click(function() {
                $.ajax({
                    url: '{{ route('home') }}',
                    type: 'GET',
                    success: function(data) {
                        $('#Leasing_Activity').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error refreshing leasing activities:', error);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Status', 'Units'],
                ['Occupied', {{ $occupancyRate['occupied'] }}],
                ['Vacant', {{ $occupancyRate['vacant'] }}]
            ]);
            var options = {
                // title: 'Occupancy Status',
                pieHole: 0.5,
                colors: ['#FF3A29', '#FFE5D3'], // Custom colors for segments
                chartArea: {
                    width: '{{ $occupancyRate['occupied_percentage'] }}%',
                    height: '{{ $occupancyRate['vacant_percentage'] }}%'
                }, // Adjust chart area
                legend: {
                    position: 'none'
                } // Hide default legend
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);

            // Redraw chart on window resize
            window.addEventListener('resize', function() {
                chart.draw(data, options);
            });
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Date', 'Profit', 'Loss'],
                ['01 / 12', 200, 100],
                ['02 / 12', 250, 150],
                ['03 / 12', 300, 100],
                ['04 / 12', 350, 200],
                ['05 / 12', 400, 250],
                ['06 / 12', 450, 300],
                ['07 / 12', 500, 350],
                ['08 / 12', 550, 400],
                ['09 / 12', 600, 450],
                ['10 / 12', 650, 500],
                ['11 / 12', 700, 550],
                ['12 / 12', 750, 600]
            ]);

            var options = {
                chart: {
                    // title: 'Company Performance',
                    // subtitle: 'Profit and Loss: 01 / 12 - 12 / 12',
                },
                colors: ['#34B53A', '#02A0FC'], // Custom colors for segments
                vAxis: {
                    gridlines: {
                        color: 'transparent'
                    },
                    textPosition: 'none' // Hide axis values
                },
                hAxis: {
                    gridlines: {
                        color: 'transparent'
                    },
                    slantedText: true, // Slant the text to fit more labels
                    slantedTextAngle: 45 // Angle for the slanted text
                },
                legend: {
                    position: 'top',
                    alignment: 'start'
                }, // Show legend on top left
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));

            // Redraw chart on window resize
            window.addEventListener('resize', function() {
                chart.draw(data, google.charts.Bar.convertOptions(options));
            });
        }
    </script>
@endpush
