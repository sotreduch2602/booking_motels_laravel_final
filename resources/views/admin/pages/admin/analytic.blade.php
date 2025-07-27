@extends('admin.layouts.master')

@section('main-content')
    {{-- Main Content --}}
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Hotel Analytics</strong> Dashboard</h1>

            <div class="row">
                <div class="col-xl-6 col-xxl-5 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Total Bookings</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">{{ $totalBookings }}</h1>
                                        <div class="mb-0">
                                            <span class="text-success">{{ $completedBookings }} completed</span>
                                            <span class="text-muted"> | {{ $pendingBookings }} pending</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Total Users</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="users"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">{{ $totalUsers }}</h1>
                                        <div class="mb-0">
                                            <span class="text-success">Active users</span>
                                            <span class="text-muted"> registered</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Total Revenue</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">${{ number_format($totalRevenue, 2) }}</h1>
                                        <div class="mb-0">
                                            <span class="text-success">From completed bookings</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Total Reviews</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">{{ $totalReviews }}</h1>
                                        <div class="mb-0">
                                            <span class="text-success">User feedback</span>
                                            <span class="text-muted"> received</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-xxl-7">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Monthly Revenue (Total Price from Completed Bookings)</h5>
                        </div>
                        <div class="card-body py-3">
                            <div class="chart chart-sm">
                                <canvas id="chartjs-dashboard-line"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Location Booking Distribution</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="py-3">
                                    <div class="chart chart-xs">
                                        <canvas id="chartjs-dashboard-pie"></canvas>
                                    </div>
                                </div>

                                <table class="table mb-0">
                                    <tbody>
                                        @foreach($topLocations as $city => $count)
                                        <tr>
                                            <td>{{ $city }}</td>
                                            <td class="text-end">{{ $count }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('custom-js')
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");

			// Line chart for Monthly Revenue
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: {!! json_encode(array_keys($monthlyRevenue)) !!},
					datasets: [{
						label: "Revenue ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: {!! json_encode(array_values($monthlyRevenue)) !!}
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false,
						callbacks: {
							label: function(tooltipItem, chart) {
								return 'Revenue: $' + tooltipItem.yLabel.toLocaleString();
							}
						}
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								callback: function(value, index, values) {
									return '$' + value.toLocaleString();
								}
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
        
			var colors = [
				window.theme.primary,
				window.theme.warning,
				window.theme.danger,
				window.theme.success,
				window.theme.info,
				'#FF6B6B',
				'#4ECDC4',
				'#45B7D1',
				'#96CEB4',
				'#FFEAA7',
				'#DDA0DD',
				'#98D8C8',
				'#F7DC6F',
				'#BB8FCE',
				'#85C1E9'
			];

			var locationData = {!! json_encode($topLocations) !!};
			var locationLabels = Object.keys(locationData);
			var locationValues = Object.values(locationData);

			var backgroundColor = locationLabels.map(function(item, index) {
				return colors[index % colors.length];
			});

			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: locationLabels,
					datasets: [{
						data: locationValues,
						backgroundColor: backgroundColor,
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						callbacks: {
							label: function(tooltipItem, chart) {
								var dataset = chart.datasets[tooltipItem.datasetIndex];
								var total = dataset.data.reduce(function(previousValue, currentValue) {
									return previousValue + currentValue;
								});
								var currentValue = dataset.data[tooltipItem.index];
								var percentage = Math.round(((currentValue/total) * 100) + 0.5);
								return chart.labels[tooltipItem.index] + ': ' + currentValue + ' bookings (' + percentage + '%)';
							}
						}
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>

@endsection
