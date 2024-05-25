<?php
	session_start();

	if (isset($_SESSION["email"]) && isset($_SESSION["password"])){

	}
	else{
		header("location:sign-in.php");
	}

	include "conn.php";
?>

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
	<link rel="shortcut icon" href="assets/img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Fed Up Admin</title>

	<link href="assets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

	<div class="wrapper">

	<?php
		$activePage = "agentpkg";
		include "assets/page-components/sidebar.php";	
	?>
		
		<div class="main">

		<?php
			include "assets/page-components/topnavbar.php";	
		?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Agent Packages</strong> Dashboard</h1>

					<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">View Packages </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                            <div class="table-responsive table--no-card m-b-30">
                                 <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Package Id</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Delivery Type</th>
                                                <th>Special Instructions</th>
                                                <th>Current Location</th>
												<th>Assigned Agent</th>
                                                <th>Price</th>
                                                <th>Cost</th>
                                                <th>Assigned Agent</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        
										<?php

										$selectQuery= "SELECT * FROM packages";
										$res= mysqli_query($conn,$selectQuery);

										while ($row=mysqli_fetch_array($res)){
											?>

										<tr>
											<td><?php echo $row['package_id']; ?></td>
											<td><?php echo $row['from_address']; ?></td>
											<td><?php echo $row['to_address']; ?></td>
											<td><?php echo $row['delivery_type']; ?></td>
											<td><?php echo $row['special_instructions']; ?></td>
											<td><?php echo $row['current_location']; ?></td>
											<td><?php echo $row['assigned_agent']; ?></td>
											<td><a href="agentpkg.php?EditedId=<?php echo $row['package_id'] ?>" class="btn btn-success">Edit</a></td>
                                            <td><a href="agentpkg.php?DeletedId=<?php echo $row['package_id'] ?>" class="btn btn-danger">Delete</a></td>
											<td><a href="agentpkg.php?<?php echo $row['package_id'] ?>" class="btn btn-primary">Location Update</a></td>
										</tr>

											<?php
										}
										?>

										<!-- Delete -->

										<?php
										
										if(isset($_GET['DeletedId'])){
											$id= $_GET['DeletedId'];
											$deleteQuery= "DELETE FROM packages WHERE package_id= $id ";
											$res= mysqli_query($conn,$deleteQuery);
											if($res){
												echo '<script>
												alert("Record deleted successfully");
												window.location.href = "packages.php";
												</script>';
											}else{
												echo '<script>alert("Something went wrong")</script>';
											}
										}

										?>

										<!-- Delete -->


                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

					

				</div>
			</main>

			<!-- Footer Start -->
			<?php
				include "assets/page-components/footer.php";
			?>
			<!-- Footer End -->
		</div>
	</div>

	<script src="assets/js/app.js"></script>

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