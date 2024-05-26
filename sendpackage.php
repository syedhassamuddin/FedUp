<?php
	session_start();

	if (isset($_SESSION["email"]) && isset($_SESSION["password"])){
		if($_SESSION["account_type"] == "customer"){

		}
		else{
			header("location:dashboard.php");
		}

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
		$activePage = "sendpackage";
		include "assets/page-components/sidebar.php";	
	?>

		<div class="main">

		<?php
			include "assets/page-components/topnavbar.php";	
		?>
			
		<?php
		
		if(isset($_POST['submit'])){

			// Prepare variable
			$from_address = $_POST['from'];
			$to_address = $_POST['to'];
			$from_distance = false;
			$to_distance = false;
			$package_weight = $_POST['package_weight'];
			$special_instructions = $_POST['special_instructions'];
			$delivery_type = $_POST['delivery_type'];
			$package_owner = $_SESSION['id'];
			
			// Fetch all locations from the database
			$allLocationsObject = mysqli_query($conn, "SELECT * FROM locations");
			$locations = mysqli_fetch_all($allLocationsObject);
	
			// Iterate through the locations to find indices
			foreach ($locations as $index => $location) {
				if ($location[0] === $from_address) {
					$from_distance = $index;
				}
				if ($location[0] === $to_address) {
					$to_distance = $index;
				}
			}
			
			// Calculate distance to travel
			$distance_to_travel = (intval($to_distance) - intval($from_distance))*75;

			// Calculate Cost
			$cost = ($distance_to_travel*1.5)+($package_weight*2);

			// Calculate Price
			$price = ($distance_to_travel*8)+($package_weight*50);
			if($delivery_type == "standard"){
				$price = $price + ($distance_to_travel*1);
			}
			elseif($delivery_type == "express"){
				$price = $price + ($distance_to_travel*1.5);
			}
			elseif($delivery_type == "overnight"){
				$price = $price + ($distance_to_travel*2);
			}
			else{
				$price = $price + 500;
			}


			// Insert Into Database
			$insertQuery= "INSERT INTO packages VALUES(NULL, '$from_address','$to_address','$delivery_type','$special_instructions','$package_weight','$distance_to_travel', 'origin','$price', '$cost', NULL, $package_owner)";

			$isInsert = mysqli_query($conn, $insertQuery);

			if($isInsert) {
				echo '<script>alert("Data inserted successfully")</script>';
			} else{
				echo '<script>alert("Something went wrong")</script>';
			}
		}
		?>

		<?php
		if(isset($_GET['Edited_Id'])){
			$id = $_GET['Edited_Id'];
			$_SESSION['package_id_to_update'] = $id;
			$editQuery = "SELECT * FROM packages WHERE package_id = '$id'";
			$res = mysqli_query($conn,$editQuery);
			$row = mysqli_fetch_array($res);
		}
		else{}
		?>

		<?php
			if(isset($_POST['update'])){
				$id = $_SESSION['package_id_to_update'];
				$updated_from_address = $_POST['from'];
				$updated_to_address = $_POST['to'];
				$updated_package_weight = $_POST['package_weight'];
				$updated_special_instructions = $_POST['special_instructions'];
				$updated_delivery_type = $_POST['delivery_type'];

				$updateQuery = "UPDATE packages SET from_address = '$updated_from_address', to_address = '$updated_to_address', package_weight_in_KG = '$updated_package_weight', special_instructions = '$updated_special_instructions', delivery_type = '$updated_delivery_type' WHERE package_id = '$id'";
				$isUpdate = mysqli_query($conn, $updateQuery);
				if ($isUpdate) {
					echo '<script>window.location.href = "packages.php";</script>';
				} else {
					echo '<script>alert("Something went wrong")</script>';
				}
			}
		?>

			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><strong>Send</strong> Package</h1>
					<form action="sendpackage.php" method="post">

						<div class="row">
							<div class="col-6">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">From</h5>
									</div>
									<div class="card-body">
										<input type="text" class="form-control" placeholder="Karachi" name="from" value="<?php echo @$row['from_address']?>">
									</div>
								</div>
							</div>
							
							<div class="col-6">

								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">To</h5>
									</div>
									<div class="card-body">
										<input type="text" class="form-control" placeholder="Lahore" name="to" value="<?php echo @$row['to_address']?>">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-6">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Package Weight (In KGs)</h5>
									</div>
									<div class="card-body">
										<input type="number" class="form-control" placeholder="10" name="package_weight" value="<?php echo @$row['package_weight_in_KG']?>">
									</div>
								</div>
							</div>

							<div class="col-6">
								<div class="card">
								  <div class="card-header">
									  <h5 class="card-title mb-0">Special Instructions</h5>
								  </div>
								  <div class="card-body">
									  <textarea class="form-control" rows="2" name="special_instructions" placeholder="Please keep upright"><?php echo @$row['special_instructions']?></textarea>
								  </div>
							  </div>
							</div>
						</div>

						<div class="row">
							<div class="col-12 col-md-6">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Delivery Type</h5>
									</div>
									<div class="card-body">
										<div>
											<label class="form-check">
												<input class="form-check-input" type="radio" value="standard" name="delivery_type" <?php if(isset($_GET['Edited_Id'])){if($row['delivery_type'] == 'standard'){echo "checked";}else{}}else{}?>>
												<span class="form-check-label">
													Standard Delivery
												</span>
											</label>
											<label class="form-check">
												<input class="form-check-input" type="radio" value="express" name="delivery_type" <?php if(isset($_GET['Edited_Id'])){if($row['delivery_type'] == 'express'){echo "checked";}else{}}else{}?>>
												<span class="form-check-label">
													Express Delivery
												</span>
											</label>
											<label class="form-check">
												<input class="form-check-input" type="radio" value="overnight" name="delivery_type" <?php if(isset($_GET['Edited_Id'])){if($row['delivery_type'] == 'overnight'){echo "checked";}else{}}else{}?>>
												<span class="form-check-label">
												Overnight Delivery
												</span>
												</label>
											  <label class="form-check">
												<input class="form-check-input" type="radio" value="fragile" name="delivery_type" <?php if(isset($_GET['Edited_Id'])){if($row['delivery_type'] == 'fragile'){echo "checked";}else{}}else{}?>>
												<span class="form-check-label">
													Fragile Delivery
												</span>
											</label>
										</div>
									</div>
								</div>
							</div>

						</div>

						<?php
							if(isset($_GET['Edited_Id'])){
								echo "<button class='btn btn-primary btn-lg' type='submit' name='update'>Update Package Details</button>";
							}
							else{
								echo "<button class='btn btn-primary btn-lg' type='submit' name='submit'>Schedule Package Delivery</button>";
							}
						?>
						
					</form>

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