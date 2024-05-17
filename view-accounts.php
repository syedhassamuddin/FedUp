<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Fed Up Admin</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

	<div class="wrapper">

		<?php
			$activePage = "view-accounts";
			include "page-components/sidebar.php";
		?>

		
		<div class="main">

		<?php
			include "page-components/topnavbar.php";
		?>

			<main class="content">

					<h1 class="h1 mb-3"><strong>All Users</strong></h1>

					<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Admin</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                            <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Admin Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>phone</th>
                                                <th>Password</th>
                                                <th>Account Type</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        
										<?php
										
										include("conn.php");

										$selectQuery= "SELECT * FROM admin";
										$res= mysqli_query($conn,$selectQuery);

										while ($row=mysqli_fetch_array($res)){
											?>

										<tr>
											<td>
											<?php echo $row['admin_id'] ?>
											</td>
											<td>
											<?php echo $row['first_name'] ?>
											</td>
											<td>
											<?php echo $row['last_name'] ?>
											</td>
											<td>
											<?php echo $row['email'] ?>
											</td>
											<td>
											<?php echo $row['phone'] ?>
											</td>
                                            <td>
											<?php echo $row['password'] ?>
											</td>
                                            <td>
											<?php echo $row['account_type'] ?>
											</td>
											<td>
                                                <a href=".php?EditedId=<?php echo $row['admin_id'] ?>" class="btn btn-success">Edit</a>
                                                <a href=".php?DeletedId=<?php echo $row['admin_id'] ?>" class="btn btn-danger">Delete</a> 
												
                                            </td>
										</tr>

											<?php
										}
										?>


										


                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
				</div>

                <!-- agent  -->

                <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Agent</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                            <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Agent Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>phone</th>
                                                <th>Password</th>
                                                <th>Account Type</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        
										<?php
										
										include("conn.php");

										$selectQuery= "SELECT * FROM agent";
										$res= mysqli_query($conn,$selectQuery);

										while ($row=mysqli_fetch_array($res)){
											?>

										<tr>
											<td>
											<?php echo $row['agent_id'] ?>
											</td>
											<td>
											<?php echo $row['first_name'] ?>
											</td>
											<td>
											<?php echo $row['last_name'] ?>
											</td>
											<td>
											<?php echo $row['email'] ?>
											</td>
											<td>
											<?php echo $row['phone'] ?>
											</td>
                                            <td>
											<?php echo $row['password'] ?>
											</td>
                                            <td>
											<?php echo $row['account_type'] ?>
											</td>
											<td>
                                                <a href=".php?EditedId=<?php echo $row['agent_id'] ?>" class="btn btn-success">Edit</a>
                                                <a href=".php?DeletedId=<?php echo $row['agent_id'] ?>" class="btn btn-danger">Delete</a> 
                                            </td>
										</tr>

											<?php
										}
										?>


										


                                    </table>
                                </div>
                        </div>
                    </div>

                    <!-- agent  -->

                    <!-- customer  -->

                <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Customer</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                            <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Customer Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>phone</th>
                                                <th>Password</th>
                                                <th>Account Type</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        
										<?php
										
										include("conn.php");

										$selectQuery= "SELECT * FROM customer";
										$res= mysqli_query($conn,$selectQuery);

										while ($row=mysqli_fetch_array($res)){
											?>

										<tr>
											<td>
											<?php echo $row['customer_id'] ?>
											</td>
											<td>
											<?php echo $row['first_name'] ?>
											</td>
											<td>
											<?php echo $row['last_name'] ?>
											</td>
											<td>
											<?php echo $row['email'] ?>
											</td>
											<td>
											<?php echo $row['phone_number'] ?>
											</td>
                                            <td>
											<?php echo $row['password'] ?>
											</td>
                                            <td>
											<?php echo $row['account_type'] ?>
											</td>
											<td>
                                                <a href=".php?EditedId=<?php echo $row['customer_id'] ?>" class="btn btn-success">Edit</a>
                                                <a href=".php?DeletedId=<?php echo $row['customer_id'] ?>" class="btn btn-danger">Delete</a> 
                                            </td>
										</tr>

											<?php
										}
										?>


										


                                    </table>
                                </div>
                        </div>
                    </div>

                    <!-- customer  -->
                

                
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
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
								stepSize: 1000
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
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>

</body>

</html>