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

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>Blank Page | AdminKit Demo</title>

	<link href="assets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
    <?php
		$activePage = "contact-us-submissions";
		include "assets/page-components/sidebar.php";	
	?>

		<div class="main">
        
        <?php
			include "assets/page-components/topnavbar.php";
		?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Blank Page</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Things to do</h5>
								</div>
								<div class="card-body">
									1. Osama, the edit button doesn't work in packages Page
									2. Fariyal, make a button to download database, please
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

</body>

</html>