<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>
<body>
    <?php
    include("conn.php");
    if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        mysqli_query ($conn,"INSERT INTO customer (first_name, last_name, Email, Password) VALUES('$first_name','$last_name','$email','$password')");

        echo "done";
    }
        ?>






    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <form action="login.php" method="post">

            <div class="field inbox">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" required>
                </div>
                <div class="field inbox">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" required>
                </div>
                <div class="field inbox">
                    <label for="email">Email</label>
                    <input type="email" name="email" required autocomplete="off">
                </div>
                <div class="field inbox">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                </div>
                
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="login">
                </div>
                
                <div class="link">
                    Don't have account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
            </div>
        </div>
    
</body>
</html>