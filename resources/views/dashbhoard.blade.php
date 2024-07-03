@extends('layouts.app')
@section('content')
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
                                <ul class="togg-btn">
                                    <li><i class="fal fa-ellipsis-h"></i></li>
                                    <ul class="togg-drop">
                                        <li><a href="#">Edit</a></li>
                                        <li><a href="#">Delete</a></li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="chart-container">
                                <div id="donutchart"></div>
                                <div class="legend">
                                    <div class="legend-item">
                                        <div class="legend-color" style="background-color: #FF3A29;"></div>
                                        <div class="legend-text">Vacant <span>{{ $occupancyRate['vacant_percentage'] }}% - {{ $occupancyRate['vacant'] }} Units</span></div>
                                    </div>
                                    <div class="legend-item">
                                        <div class="legend-color" style="background-color: #FFE5D3;"></div>
                                        <div class="legend-text">Occupied <span>{{ $occupancyRate['occupied_percentage'] }}% - {{ $occupancyRate['occupied'] }} Units</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Recent Tenant Requests</h6>
                                <ul class="togg-btn">
                                    <li><i class="fal fa-ellipsis-h"></i></li>
                                    <ul class="togg-drop">
                                        <li><a href="#">Edit</a></li>
                                        <li><a href="#">Delete</a></li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="txt">
                                <h4>Nothing Here Yet</h4>
                                <p>Please add data, refresh the page, or reset your filters</p>
                                <a href="#" class="grey-btn"><i class="fas fa-sync-alt"></i> Refresh</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Leasing Activity Next 7 Days</h6>
                                <ul class="togg-btn">
                                    <li><i class="fal fa-ellipsis-h"></i></li>
                                    <ul class="togg-drop">
                                        <li><a href="#">Edit</a></li>
                                        <li><a href="#">Delete</a></li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="txt">
                                <h4>Nothing Here Yet</h4>
                                <p>Please add data, refresh the page, or reset your filters</p>
                                <a href="#" class="grey-btn"><i class="fas fa-sync-alt"></i> Refresh</a>
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
                                <ul class="togg-btn">
                                    <li><i class="fal fa-ellipsis-h"></i></li>
                                    <ul class="togg-drop">
                                        <li><a href="#">Edit</a></li>
                                        <li><a href="#">Delete</a></li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="scroll-elem">
                                <div class="balance-box">
                                    <div class="left">
                                        <i class="fas fa-info-circle"></i>
                                        <div class="txt-left">
                                            <h6>Martin Saris</h6>
                                            <p>Violet Home - Apartment 01</p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <p>FCFA 6,500,000</p>
                                    </div>
                                </div>
                                <div class="balance-box">
                                    <div class="left">
                                        <i class="fas fa-info-circle"></i>
                                        <div class="txt-left">
                                            <h6>Martin Saris</h6>
                                            <p>Violet Home - Apartment 01</p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <p>FCFA 6,500,000</p>
                                    </div>
                                </div>
                                <div class="balance-box">
                                    <div class="left">
                                        <i class="fas fa-info-circle"></i>
                                        <div class="txt-left">
                                            <h6>Martin Saris</h6>
                                            <p>Violet Home - Apartment 01</p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <p>FCFA 6,500,000</p>
                                    </div>
                                </div>
                                <div class="balance-box">
                                    <div class="left">
                                        <i class="fas fa-info-circle"></i>
                                        <div class="txt-left">
                                            <h6>Martin Saris</h6>
                                            <p>Violet Home - Apartment 01</p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <p>FCFA 6,500,000</p>
                                    </div>
                                </div>
                                <div class="balance-box">
                                    <div class="left">
                                        <i class="fas fa-info-circle"></i>
                                        <div class="txt-left">
                                            <h6>Martin Saris</h6>
                                            <p>Violet Home - Apartment 01</p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <p>FCFA 6,500,000</p>
                                    </div>
                                </div>
                                <div class="balance-box">
                                    <div class="left">
                                        <i class="fas fa-info-circle"></i>
                                        <div class="txt-left">
                                            <h6>Martin Saris</h6>
                                            <p>Violet Home - Apartment 01</p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <p>FCFA 6,500,000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Things To Do</h6>
                                <ul class="togg-btn">
                                    <li><i class="fal fa-ellipsis-h"></i></li>
                                    <ul class="togg-drop">
                                        <li><a href="#">Edit</a></li>
                                        <li><a href="#">Delete</a></li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="scroll-elem">
                                <div class="balance-box past-box">
                                    <div class="left">
                                        <i class="fas fa-info"></i>
                                        <div class="txt-left">
                                            <h6>Past Due Leases</h6>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <p>3</p>
                                    </div>
                                </div>
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
                                <ul class="togg-btn">
                                    <li><i class="fal fa-ellipsis-h"></i></li>
                                    <ul class="togg-drop">
                                        <li><a href="#">Edit</a></li>
                                        <li><a href="#">Delete</a></li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="bar-chart">
                                <div class="chart-container">
                                    <div id="columnchart_material"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Recent Payment Recieved</h6>
                                <ul class="togg-btn">
                                    <li><i class="fal fa-ellipsis-h"></i></li>
                                    <ul class="togg-drop">
                                        <li><a href="#">Edit</a></li>
                                        <li><a href="#">Delete</a></li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="txt">
                                <h4>Nothing Here Yet</h4>
                                <p>Please add data, refresh the page, or reset your filters</p>
                                <a href="#" class="grey-btn"><i class="fas fa-sync-alt"></i> Refresh</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Task-My Next 7 Days</h6>
                                <ul class="togg-btn">
                                    <li><i class="fal fa-ellipsis-h"></i></li>
                                    <ul class="togg-drop">
                                        <li><a href="#">Edit</a></li>
                                        <li><a href="#">Delete</a></li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="txt">
                                <h4>Nothing Here Yet</h4>
                                <p>Please add data, refresh the page, or reset your filters</p>
                                <a href="#" class="grey-btn"><i class="fas fa-sync-alt"></i> Refresh</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="stats-sec3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-box">
                            <div class="hd">
                                <h6>Task-Open by Status</h6>
                                <ul class="togg-btn">
                                    <li><i class="fal fa-ellipsis-h"></i></li>
                                    <ul class="togg-drop">
                                        <li><a href="#">Edit</a></li>
                                        <li><a href="#">Delete</a></li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="txt">
                                <h4>Nothing Here Yet</h4>
                                <p>Please add data, refresh the page, or reset your filters</p>
                                <a href="#" class="grey-btn"><i class="fas fa-sync-alt"></i> Refresh</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="map-img-main">
                            <img src="assets/images/map1.png" alt="">
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
                    width: '{{ $occupancyRate["occupied_percentage"] }}%',
                    height: '{{ $occupancyRate["vacant_percentage"] }}%'
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
