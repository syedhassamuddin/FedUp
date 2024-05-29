<?php
session_start();

if (isset($_SESSION["email"]) && isset($_SESSION["password"])){
    if($_SESSION["account_type"] == "admin"){

    }
    else{
        header("location:dashboard.php");
    }

}
else{
    header("location:sign-in.php");
}

// Include the database connection file
include "conn.php";

// Fetch data from the contactus table
$query = "SELECT * FROM contactus";
$result = $conn->query($query);
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

    <title>Contact Us Submissions | AdminKit Demo</title>

    <link href="assets/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <?php
        // Include the sidebar
        $activePage = "contact-us-submissions";
        include "assets/page-components/sidebar.php";
        ?>

        <div class="main">
            <?php
            // Include the top navigation bar
            include "assets/page-components/topnavbar.php";
            ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3">Contact Us Submissions</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Submitted Messages</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Display the data fetched from the database
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>
                                                            <td>{$row['message_id']}</td>
                                                            <td>{$row['name']}</td>
                                                            <td>{$row['email']}</td>
                                                            <td>{$row['subject']}</td>
                                                            <td>{$row['message']}</td>
                                                        </tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='5'>No submissions found</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer Start -->
            <?php
            // Include the footer
            include "assets/page-components/footer.php";
            ?>
            <!-- Footer End -->
        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>

</html>
