<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="img/logo.png" alt=""> -->
        <h1>FEDUP</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" <?php if($activePage == "index"){echo "class='active'";}?>>Home</a></li>
          <li><a href="about.php" <?php if($activePage == "about"){echo "class='active'";}?>>About</a></li>
          <li><a href="services.php" <?php if($activePage == "services"){echo "class='active'";}?>>Services</a></li>
          <li><a href="pricing.php" <?php if($activePage == "pricing"){echo "class='active'";}?>>Pricing</a></li>
          <li><a href="contact.php" <?php if($activePage == "contact"){echo "class='active'";}?>>Contact</a></li>
          <?php
            if(isset($_SESSION["account_type"])){
              echo "<li><a class='get-a-quote' href='dashboard.php'>Go To Dashboard</a></li>";
            }
            else{
              echo "
                <li><a class='get-a-quote' href='sign-in.php'>Login</a></li>
                <li><a class='get-a-quote' href='sign-up.php'>Register</a></li>";
            }
          ?>
        </ul>
      </nav>
      <!-- .navbar -->

    </div>
  </header>