<?php
$Yourname = $_POST['name'];       // Correct variable names to match form input names
$Youremail = $_POST['email'];
$Subject = $_POST['subject'];    // Correct variable name to match form input name
$Message = $_POST['message'];    // Correct variable name to match form input name

// Database connection
$conn = new mysqli('localhost', 'root', '', 'fedupdb'); // Correct connection parameters
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO contactus (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $Yourname, $Youremail, $Subject, $Message); // Corrected "bind_param" types and variables
    $stmt->execute();
    echo "Contact successfully added."; // Corrected success message
    $stmt->close();
    $conn->close();
}
?>
