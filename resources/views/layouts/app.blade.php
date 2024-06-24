<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes/compatibility')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('includes/style')
</head>

<body>
    <div class="main-wrapper">
        @include('includes/header')
 
            @yield('content')
     </div>

    @include('includes/scripts')

    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Status', 'Units'],
                ['Occupied', 18],
                ['Vacant', 3]
            ]);

            var options = {
                // title: 'Occupancy Status',
                pieHole: 0.5,
                colors: ['#FF3A29', '#FFE5D3'], // Custom colors for segments
                chartArea: {
                    width: '100%',
                    height: '80%'
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
    @stack('custom_js')
</body>

</html>
