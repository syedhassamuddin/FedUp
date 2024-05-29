<?php
	session_start();

	if (isset($_SESSION["email"]) && isset($_SESSION["password"])){
		$userEmail = $_SESSION["email"];

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

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-profile.html" />

	<title>Profile | FedUp</title>

	<link href="assets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">

	<?php
		$activePage = "profile";
		include "assets/page-components/sidebar.php";	
	?>

		<div class="main">
		
		<?php
			include "assets/page-components/topnavbar.php";	
		?>

			<main class="content">
				<div class="container-fluid p-0">
 
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Profile</h1>
						<a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
      Get more page examples
  </a>
					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="assets/img/users/<?php echo $_SESSION['account_type'].'s/'.$_SESSION['email'].'.png'?>" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0">
										<?php
                                         echo $_SESSION['first_name']." ".$_SESSION['last_name'];
										?>


									</h5>
									<div class="text-muted mb-2">Lead Developer</div>

									<div>
										<a class="btn btn-primary btn-sm" href="#">Follow</a>
										<a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Message</a>
									</div>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Skills</h5>
									<a href="#" class="badge bg-primary me-1 my-1">HTML</a>
									<a href="#" class="badge bg-primary me-1 my-1">JavaScript</a>
									<a href="#" class="badge bg-primary me-1 my-1">Sass</a>
									<a href="#" class="badge bg-primary me-1 my-1">Angular</a>
									<a href="#" class="badge bg-primary me-1 my-1">Vue</a>
									<a href="#" class="badge bg-primary me-1 my-1">React</a>
									<a href="#" class="badge bg-primary me-1 my-1">Redux</a>
									<a href="#" class="badge bg-primary me-1 my-1">UI</a>
									<a href="#" class="badge bg-primary me-1 my-1">UX</a>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">About</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a href="#">San Francisco, SA</a></li>

										<li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <a href="#">GitHub</a></li>
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a href="#">Boston</a></li>
									</ul>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Elsewhere</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><a href="#">staciehall.co</a></li>
										<li class="mb-1"><a href="#">Twitter</a></li>
										<li class="mb-1"><a href="#">Facebook</a></li>
										<li class="mb-1"><a href="#">Instagram</a></li>
										<li class="mb-1"><a href="#">LinkedIn</a></li>
									</ul>
								</div>
							</div>
						</div>
<!-- password  -->

            <?php 
			include "conn.php";

			if(isset($_GET['EditedId']))
			{
				$id = $_GET['EditedId'];
				$editQuery = "SELECT password FROM admins WHERE id = '$id'";
				$res = mysqli_query($conn,$editQuery);
				$row = mysqli_fetch_array($res);
			}

?> 

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">Personal Information</h5>
								</div>
								<div class="container-fluid p-0">
								<h1 class="h3 p-4">Update <strong>Password</strong></h1>

								<form action="profile.php" method="post">
							<div class="col-6">
								<div class="card mb-0">
									<div class="card-header">
										<h5 class="card-title ">Old Password</h5>
									</div>
									<div class="card-body">
										<input type="text" class="form-control" placeholder="Enter Your Old Password" name="old_password" value="<?php echo @$row['']?>">
									</div>
								</div>
							</div>

							<div class="col-6">
								<div class="card mb-0">
								  <div class="card-header">
									  <h5 class="card-title ">New Password</h5>
								  </div>
								  <div class="card-body">
								  <input type="text" class="form-control" placeholder="Enter Your New Password" name="new_password" value="<?php echo @$row['']?>">
								  </div>
							  </div>
							</div>
							<div class="col-6">
								<div class="card mb-0">
								  <div class="card-header">
									  <h5 class="card-title mb-0">Confirm New Password</h5>
								  </div>
								  <div class="card-body">
								  <input type="text" class="form-control" placeholder="Confirm Your New Password" name="cnfmnew_password" value="<?php echo @$row['']?>">
								  </div>
							  </div>
							</div>
							<div class="p-4"><a href="insertstd.php?EditedId=<?php echo $row['std_id'] ?>" class="btn btn-success">Update</a></div>
							

								</form>

								</div>
							</div>
						</div>
						<!-- password  -->

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

</body>

</html>