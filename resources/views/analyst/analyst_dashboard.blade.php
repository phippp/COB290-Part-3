@extends('base')

@section('style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
    
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

                <!--  Numerical data -->
                <div class="stats-card">
                    <h4> Number Of Problem Types </h4>
                    <h3> {{ $problem['labels']->count() }}</h3>   <!-- making the numeric data look bigger than their description to give them more importance -->
                </div>
                <div class="stats-card">
                    <h4> Solved : Queued Problems </h3>
                    <h3> {{ array_sum($specialist['solved'])}} : {{ array_sum($specialist['queue'])}}  </h3>
                </div>
                <div class="stats-card">
                    <h4> Number of Employees </h4>
                    <h3>{{ $employees }}</h3>
                </div>

                <div class="stats-card">
                    <h4> Number of Branches </h4>
                    <h3>{{$branches}}</h3>
                </div>

                <!-- Graph snapshot -->
                <div class="stats-card">
                    <canvas id="importanceChart"></canvas>
                </div>

                <div class="stats-card">
                    <canvas id="equipmentChart"></canvas>
                </div>
                
                <div class="stats-card">
                    <canvas id="solvedAndAssignedChart" width="400", height="400"></canvas>
                </div>
                
                <div class="stats-card">
                    <canvas id="avgTimeTakenForSolution" width="400", height="400"></canvas>
                </div>


            </div>
        </div>
        <br>

        <!-- end of displaying 8 small stats card -->


        <div class="white-bg-card"> 
            <canvas id="last12MonthCases"></canvas>
        </div>
        <br>


        <div class="stats-card-section">
            <div class="stats-card-container-analyst">
                <div class="stats-card">
                    <canvas id="weeklyReportComparison"></canvas>
                </div>
                
                
                <div class="stats-card">
                    <canvas id="hardwareChart"></canvas>
                </div>



                <div class="stats-card">
                    <canvas id="softwareChart"></canvas>
                </div>
            
                <div class="stats-card">
                    <canvas id="typesChart"></canvas>
                </div>

                <div class="stats-card">
                    <canvas id="specialistChart"></canvas>
                </div>


            </div>
        <div>


        
        <script>

            var importanceChart = new Chart(document.querySelector("#importanceChart"), {
                type :'doughnut',
                data : {
                    labels: [
                        'Low',
                        'Medium',
                        'High'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [ {{  $importanceLevel["Low"] }},  {{ $importanceLevel["Medium"]  }}, {{ $importanceLevel["High"] }}],
                        backgroundColor: [
                        'rgb(66, 185, 131)',
                        'rgb(255, 159, 64)',
                        'rgb(235, 63, 63)'
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    plugins: {
                        title : {
                            display: true,
                            text: "Ongoing cases importance level"
                        },
                        legend: {
                            position : 'bottom'
                        }
                    }

                }
            });


            var avgTimeTakenForSolutionChart = new Chart(document.querySelector("#avgTimeTakenForSolution"), {
                type :'bar',
                data : {
                    labels: [
                        '1st',
                        '2nd',
                        '3rd',
                        '4th'
                    ],
                    datasets: [{
                        label: 'Weeks',
                        data: {!! json_encode($timeTakenForSolution) !!},
                        backgroundColor: [
                        'rgb(66, 185, 131, 0.7)',
                        'rgb(255, 159, 64, 0.7)',
                        'rgb(204, 178, 255, 0.7)',
                        'rgb(165, 223, 223, 0.7)'
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    plugins: {
                        title : {
                            display: true,
                            text: "Weekly avg time for solution"
                        },
                        legend: {
                            position : 'bottom'
                        }
                    },
                    scales: {
                        y: {
                            title: {
                                display: true,
                                text: 'Days'
                            }
                        }
                    }
                }
            });


            var solvedAndAssignedChart = new Chart(document.querySelector("#solvedAndAssignedChart"), {
                type : 'bar',
                height: 260,
                responsive:true,
                maintainAspectRatio: false,

                data: {
                    labels: ['Specialist required','Solved by client',],
                    datasets: [
                        {
                            label: 'Problem Reported',
                            data:{{ json_encode($registerMethod) }},
                            backgroundColor: [
                                
                                'rgba(75, 192, 192, 0.5)',
                                'rgba(255, 159, 64, 0.5)'
                            ],
                            borderColor: [
                                'rgb(75, 192, 192)',
                                'rgb(255, 159, 64)',
                            ],
                            borderWidth: 1
                        }
                    ],
                }, 
                options :{
                    plugins :{
                        title : {
                            display : true,
                            text : "Cases reported (6 months)"
                        },
                        legend :{
                            position : 'bottom'
                        }
                    }
                }
            });


            var equipmentChart = new Chart(document.querySelector("#equipmentChart"), {
                type :'doughnut',
                data : {
                    labels: [
                        'Software',
                        'Hardware',
                        'Both'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [ 
                            {{ $equipmentReported["software"] }}, 
                            {{ $equipmentReported["hardware"] }}, 
                            {{ $equipmentReported["both"] }}, 
                            
                        ],
                        backgroundColor: [
                            'rgb(255, 205, 86)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 99, 132)',
                        ],
                        hoverOffset: 4
                    }]
                }, // end of data
                options: {
                    plugins: {
                        title : {
                            display: true,
                            text: "Equipment Reported (6 months)"
                        },
                        legend: {
                            position : 'bottom'
                        }
                    }

                }
            });

            
            var last12MonthCases = new Chart(document.querySelector("#last12MonthCases"), {
                type: 'line',
                data: {
                    labels: {!!json_encode($cases12Month['xAxis'])!!},
                    datasets: [{
                        label: 'Cases reported',
                        data: {!!json_encode($cases12Month['issued'])!!},
                        fill: true,
                        backgroundColor: 'rgb(255, 99, 132, 0.1)',
                        borderColor: 'rgb(255, 99, 132)',
                        pointBackgroundColor: 'rgb(255, 99, 132)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(255, 99, 132)',

                        tension: 0.1,
                    }, {
                        label: 'Cases solved',
                        data: {!!json_encode($cases12Month['solved'])!!},
                        fill: true,
                        tension: 0.1,
                        borderColor: 'rgb(54, 162, 235)',
                        backgroundColor: 'rgba(54, 162, 235, 0.1)',
                        pointBackgroundColor: 'rgb(54, 162, 235)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(54, 162, 235)'

                    }],
                },
                options: {
                    responsive: true,
                    plugins: {
                    title: {
                        display: true,
                        text: 'Cases reported and solved (Past 12 months)'
                    },
                    },
                    interaction: {
                        intersect: false,
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Months'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Cases'
                            },
                        }
                    }
                }
            })



            
            var weeklyReportComparison = new Chart(document.querySelector("#weeklyReportComparison"), {
                type : 'line',
                height: 260,
                responsive:true,
                maintainAspectRatio: false,

                data: {
                    labels: ['Mon','Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'],
                    // keep the dataset in the order of (current week, last week, 3rd week)
                    datasets: [
                        {
                            label: 'This week',
                            data: {!!  json_encode($weeklyComparison["thisWeek"]) !!},
                            fill: true,
                            backgroundColor: 'rgba(54, 0, 235, 0.2)',
                            borderColor: 'rgb(54, 0, 235)',
                            pointBackgroundColor: 'rgb(54, 0, 235)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(54, 0, 235)'
                        },
                        {
                            label: 'Last week',
                            data: {!!  json_encode($weeklyComparison["secondWeek"]) !!},
                            fill: true,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgb(255, 99, 132)',
                            pointBackgroundColor: 'rgb(255, 99, 132)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(255, 99, 132)'
                        },{
                            label: 'Second last week',
                            data: {!!  json_encode($weeklyComparison["thirdWeek"]) !!},
                            fill: true,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgb(54, 162, 235)',
                            pointBackgroundColor: 'rgb(54, 162, 235)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(54, 162, 235)'
                        }
                                        
                    ]
                }, 
                options :{
                    responsive: true,
                    plugins: {
                    title: {
                        display: true,
                        text: 'Weekly comparison of cases reported'
                    },
                    },
                }
            });












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
                },
                options: {
                    scales: {
                        x:{
                            ticks : {
                                autoSkip: false,
                                callback: function(val, index){
                                    let labelX = this.getLabelForValue(val);
                                    if(labelX.length > 4){
                                        return labelX.substr(0, 4) + "...";
                                    } else {
                                        return labelX;
                                    }
                                    
                                }
                            }
                        }
                    }
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
                },
                options: {
                    scales: {
                        x:{
                            ticks : {
                                autoSkip: false,
                                callback: function(val, index){
                                    let labelX = this.getLabelForValue(val);
                                    if(labelX.length > 4){
                                        return labelX.substr(0, 4) + "...";
                                    } else {
                                        return labelX;
                                    }
                                    
                                }
                            }
                        }
                    }
                }
            });

            var typesChart = new Chart( document.getElementById('typesChart'),{
                type: 'bar',
                data: {
                    labels: {!!json_encode($problem['labels'])!!},
                    datasets: [{
                        label: "Frequent Category reported",
                        data: {!!json_encode($problem['qty'])!!},
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x:{
                            ticks : {
                                autoSkip: false,
                                callback: function(val, index){
                                    let labelX = this.getLabelForValue(val);
                                    if(labelX.length > 4){
                                        return labelX.substr(0, 4) + "...";
                                    } else {
                                        return labelX;
                                    }
                                    
                                }
                            }
                        }
                    }
                }
            });

            var specialistChart = new Chart( document.getElementById('specialistChart'),{
                type: 'bar',
                data: {
                    labels: {!!json_encode($specialist['labels'])!!},
                    datasets: [{
                        label: "Solved problems",
                        data: {!!json_encode($specialist['solved'])!!},
                        backgroundColor: 'rgba(99, 255, 132, 0.2)',
                        borderColor: 'rgba(99, 255, 132, 0.2)',
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
                        backgroundColor: 'rgba(132, 99, 255, 0.2)',
                        borderColor: 'rgba(132, 99, 255, 1)',
                        borderWidth: 1
                    }]
                }
            });

        </script>

    </div>

@endsection
