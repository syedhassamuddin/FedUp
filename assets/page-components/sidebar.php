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

					<li class="sidebar-item <?php if($activePage == 'sendpackage'){echo'active';}?>">
						<a class="sidebar-link" href="sendpackage.php">
							<i class="align-middle" data-feather="truck"></i> <span class="align-middle">Send Package</span>
            			</a>
					</li>

					<li class="sidebar-item <?php if($activePage == 'packages'){echo'active';}?>">
						<a class="sidebar-link" href="packages.php">
							  <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Packages</span>
						</a>
					</li>
					<li class="sidebar-item <?php if($activePage == 'agentpkg'){echo'active';}?>">
						<a class="sidebar-link" href="agentpkg.php">
							  <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Agent Package</span>
						</a>
					</li>
					<li class="sidebar-item <?php if($activePage == 'custmpkg'){echo'active';}?>">
						<a class="sidebar-link" href="custmpkg.php">
							  <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Customer Package</span>
						</a>
					</li>
					
					<li class="sidebar-item <?php if($activePage == 'create-account'){echo'active';}?>">
						<a class="sidebar-link" href="create-account.php">
							<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Create Account</span>
            			</a>
					</li>

					<li class="sidebar-item <?php if($activePage == 'view-accounts'){echo'active';}?>">
						<a class="sidebar-link" href="view-accounts.php">
              				<i class="align-middle" data-feather="list"></i> <span class="align-middle">View Accounts</span>
            			</a>
					</li>

					<li class="sidebar-item <?php if($activePage == 'profile'){echo'active';}?>">
						<a class="sidebar-link" href="profile.php">
              				<i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            			</a>
					</li>

					<li class="sidebar-item <?php if($activePage == 'reports'){echo'active';}?>">
						<a class="sidebar-link" href="reports.php">
              				<i class="align-middle" data-feather="bar-chart"></i> <span class="align-middle">Reports</span>
            			</a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- Sidebar Navigation Bar End -->