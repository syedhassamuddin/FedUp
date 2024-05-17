<?php
// Database connection code
$servername = "localhost"; 
$username = "root"; // Default username for XAMPP/WAMP is 'root'
$password = ""; // Default password for XAMPP/WAMP is empty
$database = "fedupdb"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume a user ID of 1 for testing purposes
$user_id = 1;

// Retrieve user information from the database
$sql = "SELECT first_name, email FROM admins WHERE admin_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($fullName, $email);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo $fullName; ?></h1>
        <p>Email: <?php echo $email; ?></p>
    </div>

    <div class="container">
        <h2>Update Profile</h2>
        <form action="update_profile.php" method="post">
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" value="<?php echo $fullName; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>
