@extends('base')

@section('style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body{
            background-color: #F4F5F7;
        }
    </style>
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('analyst.analyst_navigation')

    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width-->

        <div class="stats-card-section">
            <div class="stats-card-container">
                <div class="stats-card">
                    <h4> Cases assigned today. </h4>
                    <h3> </h3>   <!-- making the numeric data look bigger than their description to give them more importance -->
                </div>
                <div class="stats-card">
                    <h4> Stats </h3>
                    <h3>   </h3>
                </div>
                <div class="stats-card">
                    <h4> Stats </h4>
                    <h3>   </h3>
                </div>

                <div class="stats-card">
                    <h4> Stats </h4>
                    <h3>   </h3>
                </div>
            </div>
        </div>
        <!-- end of displaying stats data -->
        <!--
            ######################################################################################
            END OF STATS SECTION
            ######################################################################################
         -->
        <br><br>
        <div class="stats-card-section">
            <h2> Monthly Data </h2>

            <div class="stats-card-container-analyst">
                <div class="stats-card">
                </div>

                <div class="stats-card">
                </div>
            </div>
            <div class="stats-card">
            </div>
        <div>

        <br>
        <div class="stats-card-section">
            <h2> Yearly Data </h2>

            <div class="stats-card">
            </div>
        </div>

        <div>
            <canvas id="hardwareChart"></canvas>
        </div>

        <div>
            <canvas id="softwareChart"></canvas>
        </div>

        <div>
            <canvas id="typesChart"></canvas>
        </div>

        <div>
            <canvas id="specialistChart"></canvas>
        </div>

        <script>

            var hardwareChart = new Chart( document.getElementById('hardwareChart'),{
                type: 'bar',
                data: {
                    labels: {!!json_encode($hardware['labels'])!!},
                    datasets: [{
                        label: "Hardware problems",
                        data: {!!json_encode($hardware['qty'])!!},
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                }
            });

            var softwareChart = new Chart( document.getElementById('softwareChart'),{
                type: 'bar',
                data: {
                    labels: {!!json_encode($software['labels'])!!},
                    datasets: [{
                        label: "Software problems",
                        data: {!!json_encode($software['qty'])!!},
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                }
            });

            var typesChart = new Chart( document.getElementById('typesChart'),{
                type: 'bar',
                data: {
                    labels: {!!json_encode($problem['labels'])!!},
                    datasets: [{
                        label: "Problem Type problems",
                        data: {!!json_encode($problem['qty'])!!},
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                }
            });

            var specialistChart = new Chart( document.getElementById('specialistChart'),{
                type: 'bar',
                data: {
                    labels: {!!json_encode($specialist['labels'])!!},
                    datasets: [{
                        label: "Solved problems",
                        data: {!!json_encode($specialist['solved'])!!},
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },{
                        label: "Queued problems",
                        data: {!!json_encode($specialist['queue'])!!},
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },{
                        label: "Verify problems",
                        data: {!!json_encode($specialist['verify'])!!},
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                }
            });

        </script>

    </div>

@endsection
