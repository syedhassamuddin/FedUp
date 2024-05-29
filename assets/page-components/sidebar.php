<!-- Side Navigation Bar Start -->
<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="index.php">
			<span class="align-middle">
				FedUp
				<?php
					if($_SESSION["account_type"] == "admin"){
						echo "Admin Portal";
					}
					elseif($_SESSION["account_type"] == "agent"){
						echo "Agent Portal";
					}
					else{
						echo "Customer Portal";
					}
				?>
			</span>
		</a>

		<ul class="sidebar-nav">
			<li class="sidebar-header">
				Pages
			</li>

			<li class='sidebar-item <?php if($activePage == 'dashboard'){echo'active';}?>'>
				<a class='sidebar-link' href='dashboard.php'>
						<i class='align-middle' data-feather='sliders'></i> <span class='align-middle'>Dashboard</span>
				</a>
			</li>

			<?php
				if($_SESSION['account_type'] == "admin"){
					echo "
						<li class='sidebar-item'";
						if($activePage == 'all-packages'){
							echo' active';
						}
						echo ">
						<a class='sidebar-link' href='all-packages.php'>
							<i class='align-middle' data-feather='layers'></i> <span class='align-middle'>All Packages</span>
						</a>
						</li>

						<li class='sidebar-item'";
						if($activePage == 'create-account'){
							echo' active';
						}
						echo ">
						<a class='sidebar-link' href='create-account.php'>
							<i class='align-middle' data-feather='user-plus'></i> <span class='align-middle'>Create Account</span>
						</a>
						</li>

						<li class='sidebar-item'";
						if($activePage == 'view-accounts'){
							echo' active';
						}
						echo ">
						<a class='sidebar-link' href='view-accounts.php'>
							<i class='align-middle' data-feather='list'></i> <span class='align-middle'>View Accounts</span>
						</a>
						</li>
						
						<li class='sidebar-item'";
						if($activePage == 'contact-us-submissions'){
							echo' active';
						}
						echo ">
						<a class='sidebar-link' href='contact-us-submissions.php'>
							<i class='align-middle' data-feather='inbox'></i> <span class='align-middle'>Contact Request</span>
						</a>
						</li>
						";
				}
				elseif($_SESSION['account_type'] == "agent"){

				}
				else{
					
				}
			?>

			<?php 
				if($_SESSION['account_type'] == "agent"){
					echo "
						<li class='sidebar-item'";
						if($activePage == 'agentpkg'){
							echo' active';
						}
						echo ">
						<a class='sidebar-link' href='agentpkg.php'>
							<i class='align-middle' data-feather='layers'></i> <span class='align-middle'>View Packages</span>
						</a>
						</li>
					";
				}
				else{

				}
			?>
<?php 
				if($_SESSION['account_type'] == "customer"){
					echo "
						<li class='sidebar-item'";
						if($activePage == 'sendpackage'){
							echo' active';
						}
						echo ">
						<a class='sidebar-link' href='sendpackage.php'>
							<i class='align-middle' data-feather='truck'></i> <span class='align-middle'>Send Package</span>
						</a>
						</li>

						<li class='sidebar-item'";
						if($activePage == 'custmpkg'){
							echo' active';
						}
						echo ">
						<a class='sidebar-link' href='custmpkg.php'>
							<i class='align-middle' data-feather='layers'></i> <span class='align-middle'>View Packages</span>
						</a>
						</li>
					";
				}
				else{

				}	
			?>

			<li class='sidebar-item <?php if($activePage == 'profile'){echo'active';}?>'>
				<a class='sidebar-link' href='profile.php'>
					<i class='align-middle' data-feather='user'></i> <span class='align-middle'>Profile</span>
				</a>
			</li>

			<li class='d-none sidebar-item <?php if($activePage == ''){echo'active';}?>'>
				<a class='sidebar-link' href='dashboard.php'>
					<i class='align-middle' data-feather=''></i> <span class='align-middle'></span>
				</a>
			</li>
		</ul>
	</div>
</nav>
		<!-- Sidebar Navigation Bar End -->