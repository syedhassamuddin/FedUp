<?php
	session_start();
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
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Sign In | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

	<?php
		include ("conn.php");
		if(isset($_POST['submit'])){

			$email = $_POST['email'];
			$password = $_POST['password'];

			$stmt = $conn->prepare("SELECT * FROM customers WHERE email = ? AND password = ?");
			$stmt->bind_param("ss", $email, $password);
			$result = $stmt->execute();
			if($stmt->errno){
				echo "Error";
			}
			else{
				$result = $stmt->get_result();
				if(mysqli_num_rows($result) != 0){
					$retreivedData = mysqli_fetch_assoc($result);
					$_SESSION['first_name'] = $retreivedData['first_name'];
					$_SESSION['last_name'] = $retreivedData['last_name'];
					$_SESSION['email'] = $retreivedData['email'];
					$_SESSION['password'] = $retreivedData['password'];
					$_SESSION['phone_number'] = $retreivedData['phone_number'];
					$_SESSION['account_type'] = "customer";
					echo "
						<script>
							window.location.href = 'admin.php'; 
						</script>";
				}
				else{
					echo "Something happened";
				}    
		}
		$stmt->close();
		}
		else{

		}
	?>

	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome back!</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form action="sign-in.php" method="post">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
										</div>
										<div>
											<div class="form-check align-items-center">
												<input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked>
												<label class="form-check-label text-small" for="customControlInline">Remember me</label>
											</div>
										</div>
										<div class="d-grid gap-2 mt-3">
											<input class="btn btn-primary" type="submit" name="submit">
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							Don't have an account? <a href="sign-up.php">Sign up</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>