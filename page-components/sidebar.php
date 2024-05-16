<!-- Side Navigation Bar Start -->
<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
          			<span class="align-middle">FedUp Admin</span>
        		</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item <?php if($activePage == 'dashboard'){echo'active';}?>">
						<a class="sidebar-link" href="admin.php">
              				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            			</a>
					</li>

					<li class="sidebar-item <?php if($activePage == 'packages'){echo'active';}?>">
						<a class="sidebar-link" href="packages.php">
              				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Packages</span>
            			</a>
					</li>

					<li class="sidebar-item <?php if($activePage == 'sendpackage'){echo'active';}?>">
						<a class="sidebar-link" href="sendpackage.php">
              				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Send Package</span>
            			</a>
					</li>

					<li class="sidebar-item <?php if($activePage == 'create-account'){echo'active';}?>">
						<a class="sidebar-link" href="create-account.php">
							<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Create Account</span>
            			</a>
					</li>

					<li class="sidebar-item <?php if($activePage == 'view-accounts'){echo'active';}?>">
						<a class="sidebar-link" href="view-accounts.php">
              				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">View Accounts</span>
            			</a>
					</li>

					<li class="sidebar-item <?php if($activePage == 'profile'){echo'active';}?>">
						<a class="sidebar-link" href="profile.php">
              				<i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            			</a>
					</li>

					<li class="sidebar-header">
						Tools & Components
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-buttons.php">
              				<i class="align-middle" data-feather="square"></i> <span class="align-middle">Buttons</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-forms.php">
              				<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-cards.php">
              				<i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-typography.php">
              				<i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Typography</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="icons-feather.php">
              				<i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
            			</a>
					</li>

					<li class="sidebar-header">
						Plugins & Addons
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="charts-chartjs.php">
              				<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="maps-google.php">
              				<i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
            			</a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- Sidebar Navigation Bar End -->