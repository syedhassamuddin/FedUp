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

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

	<title>Sign Up | FedUp</title>

	<link href="assets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

	<?php
		include ("conn.php");
		if(isset($_POST['submit'])){
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$phone_number = $_POST['phone_number'];
			$password = $_POST['password'];


			$stmt = $conn->prepare("INSERT INTO customers VALUES (NULL, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssss", $first_name, $last_name, $email, $phone_number, $password);
			$stmt->execute();
			if($stmt->errno){
				echo "Error";
			}
			else{
				echo
				"<div class='message'>
				<p>Customer Registration Successful!</p>
			</div><br>";    
		}
		$stmt->close();
		}

		?>
	
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Get started</h1>
							<p class="lead">
								Start creating the best possible user experience for you customers.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form action="pages-sign-up.php" method="post">
										<div class="mb-3">
											<label class="form-label">First name</label>
											<input class="form-control form-control-lg" type="text" name="first_name" placeholder="Enter your first name" />
										</div>
										<div class="mb-3">
											<label class="form-label">Last name</label>
											<input class="form-control form-control-lg" type="text" name="last_name" placeholder="Enter your last name" />
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Phone</label>
											<input class="form-control form-control-lg" type="text" name="phone_number" placeholder="Enter your phone number" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
										</div>
										<div class="d-grid gap-2 mt-3">
											<input class="btn btn-primary" type="submit" name="submit">
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							Already have account? <a href="sign-in.php">Log In</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="assets/js/app.js"></script>

</body>

</html>