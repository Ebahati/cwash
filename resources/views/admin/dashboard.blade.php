@extends('admin.layouts.app')

@section('title', 'CarLux | Admin Dashboard')

@section('styles')
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('assets/css/morris.css') }}" type="text/css"/>
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('assets/css/icon-font.min.css') }}" type='text/css' />
@endsection

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a> <i class="fa fa-angle-right"></i></li>
    </ol>
     <!-- Chart.js Graph -->
    <h3 class="chart-heading" style="text-align: center; margin-top: 20px;">Statistics</h3>
    <div class="chart-container" style="position: relative; height:40vh; width:80vw; margin: 0 auto;">
        <canvas id="bookingsChart"></canvas>
        
        
    </div>
    <!-- Dashboard Grid -->
    <div class="four-grids">
        <a href="{{ url('admin/all-bookings') }}" target="_blank">
            <div class="col-md-3 four-grid">
                <div class="four-agileits">
                    <div class="icon">
                        <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                    </div>
                    <div class="four-text">
                        <h3>Total Bookings</h3>
                        <h4>{{ $totalBookings }}</h4>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ url('admin/new-bookings') }}" target="_blank">
            <div class="col-md-3 four-grid">
                <div class="four-agileinfo">
                    <div class="icon">
                        <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                    </div>
                    <div class="four-text">
                        <h3>New Bookings</h3>
                        <h4>{{ $newBookings }}</h4>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ url('admin/completed-bookings') }}" target="_blank">
            <div class="col-md-3 four-grid">
                <div class="four-wthree">
                    <div class="icon">
                        <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                    </div>
                    <div class="four-text">
                        <h3>Completed Bookings</h3>
                        <h4>{{ $completedBookings }}</h4>
                    </div>
                </div>
            </div>
        </a>
        <!-- <a href="{{ route('enquiries.index') }}" target="_blank">
            <div class="col-md-3 four-grid">
                <div class="four-w3ls">
                    <div class="icon">
                        <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                    </div>
                    <div class="four-text">
                        <h3>Enquiries</h3>
                        <h4>{{ $enquiries }}</h4>
                    </div>
                </div>
            </div>
        </a>
        <div class="clearfix"></div>
    </div> -->

    <div class="four-grids">
        <a href="{{ url('admin/manage-car-washpoints') }}" target="_blank">
            <div class="col-md-3 four-grid">
                <div class="four-w3ls">
                    <div class="icon">
                        <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                    </div>
                    <div class="four-text">
                        <h3>Washing Points</h3>
                        <h4>{{ $washingPoints }}</h4>
                    </div>
                </div>
            </div>
        </a>
        <div class="clearfix"></div>
    </div>

    
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/js/morris.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            var ctx = document.getElementById('bookingsChart').getContext('2d');
            var bookingsChart = new Chart(ctx, {
                type: 'line', // Line chart to show trend
                data: {
                    labels: {!! json_encode($months) !!}.map(month => {
                        const [year, monthNumber] = month.split('-');
                        return new Date(year, monthNumber - 1).toLocaleString('default', { month: 'short', year: 'numeric' });
                    }),
                    datasets: [{
                        label: 'Monthly Bookings Trend',
                        data: {!! json_encode($counts) !!},
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return 'Bookings: ' + tooltipItem.raw;
                                }
                            }
                        },
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        x: {
                            type: 'category', // X-axis as categories
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Bookings'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
