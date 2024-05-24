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
	<link rel="stylesheet" href="css/extra.css">
</head>

<body>

	<div class="wrapper">

	<?php
		$activePage = "create-account";
		include "assets/page-components/sidebar.php";	
	?>

		
		<div class="main">

		<?php
			include "assets/page-components/topnavbar.php";	
		?>

			<?php

				if(isset($_POST["create_account"])){

				$first_name = $_POST['first_name'];
        		$last_name = $_POST['last_name'];
        		$email = $_POST['email'];
        		$phone_number = $_POST['phone_number'];
        		$password = $_POST['password'];
				$account_type = $_POST['account_type'];

				$file = $_FILES['profile_picture'];

				$fileName = $_FILES['profile_picture']['name'];
				$fileTmpName = $_FILES['profile_picture']['tmp_name'];
				$fileSize = $_FILES['profile_picture']['size'];
				// $fileType = $_FILES['profile_picture']['type'];
				$fileError = $_FILES['profile_picture']['error'];
				
				$fileExt = explode(".",$fileName);
				$fileActualExt = strtolower(end($fileExt));
				$allowedExt = array ("jpg","jpeg","png");
				$fileNewName = $email.".".$fileActualExt;

				if($fileError == 0){
					if ($fileSize < 100 * 1024 * 1024) {
						if(in_array($fileActualExt,$allowedExt)){
							//Remember to Check if user already exists
							if($account_type == 'admin'){
								$stmt = $conn->prepare("INSERT INTO admins VALUES(NULL, ?, ?, ?, ?, ?)");
								$stmt->bind_param("sssss", $first_name, $last_name, $email, $phone_number, $password);
								$stmt->execute();
								if ($stmt->errno) {
									// Handle the error
									echo "Error: " . $stmt->error;
								} else {
									// Insertion successful
									echo "<div class='alert-success'>Admin Account Creation Successful</div>";
								}
								$stmt->close();
								move_uploaded_file($fileTmpName,"img/users/admins/".$fileNewName);
							}
							elseif($account_type == 'agent'){
								$stmt = $conn->prepare("INSERT INTO agents VALUES(NULL, ?, ?, ?, ?, ?)");
								$stmt->bind_param("sssss", $first_name, $last_name, $email, $phone_number, $password);
								$stmt->execute();
								if ($stmt->errno) {
									// Handle the error
									echo "Error: " . $stmt->error;
								} else {
									// Insertion successful
									echo "<div class='alert-success'>Agent Account Creation Successful</div>";
								}
								$stmt->close();
								move_uploaded_file($fileTmpName,"img/users/agents/".$fileNewName);
							}
							elseif($account_type == 'customer'){
								$stmt = $conn->prepare("INSERT INTO customers VALUES(NULL, ?, ?, ?, ?, ?)");
								$stmt->bind_param("sssss", $first_name, $last_name, $email, $phone_number, $password);
								$stmt->execute();
								if ($stmt->errno) {
									// Handle the error
									echo "Error: " . $stmt->error;
								} else {
									// Insertion successful
									echo "<div class='alert-success'>Customer Account Creation Successful</div>";
								}
								$stmt->close();
								move_uploaded_file($fileTmpName,"img/users/customers/".$fileNewName);
							}
							else{
								echo "<div class='alert-failure'>Account Creation Failure</div>";
							}
						}
						else{
							"<div class='alert-failure'>File Extension is not supported</div>";
						}
					} else {
						echo "<div class='alert-failure'>File size is too large, please select a file that is smaller than 100 MBs</div>";
					}
				}
				else{
					echo "<div class='alert-failure'>There was an error with file upload</div>";
				}

				


				}
			?>
			
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Create</strong> Accounts</h1>

					<form action="create-account.php" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">First Name</h5>
									</div>
									<div class="card-body">
										<input name="first_name" type="text" class="form-control" placeholder="Adam">
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Last Name</h5>
									</div>
									<div class="card-body">
										<input name="last_name" type="text" class="form-control" placeholder="Sandler">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12 col-md-6">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Email</h5>
									</div>
									<div class="card-body">
										<input name="email" type="text" class="form-control" placeholder="user@fedup.com">
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Phone Number</h5>
									</div>
									<div class="card-body">
										<input name="phone_number" type="text" class="form-control" placeholder="Phone Number">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12 col-md-6">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Password</h5>
									</div>
									<div class="card-body">
										<input name="password" type="password" class="form-control" placeholder="letmein123">
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Account Type</h5>
									</div>
									<div class="card-body">
										<select name="account_type" class="form-select mb-3">
											<option selected disabled>Select Account Type</option>
											<option value="admin">Admin</option>
											<option value="agent">Agent</option>
											<option value="customer">Customer</option>
										</select>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Profile Picture Upload</h5>
									</div>
									<div class="card-body">
										<input type="file" name="profile_picture">
									</div>
								</div>
							</div>
						</div>

						<button type="submit" name="create_account" class="btn btn-primary btn-lg">Create Account</button>

					</form>

				</div>
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