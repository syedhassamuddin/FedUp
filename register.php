<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>register</title>
</head>
<body>
    <?php
    include ("conn.php");
    if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];


            mysqli_query ($conn,"INSERT INTO customers (first_name, last_name, email, phone_number, password, account_type) VALUES('$first_name','$last_name','$email','$phone_number', '$password', 'Customer')");
            echo
            "<div class='message'>
            <p>Registration Successfully!</p>
           </div><br>";
    
          
       }

    ?>


    <div class="container">
        <div class="box form-box">
            <header>Sign Up</header>
            <form action="register.php" method="post">
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
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" required autocomplete="off">
                </div>
                <div class="field inbox">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required autocomplete="off">
                </div>
                
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Register">
                    </div>
            </form>
                
            <div class="link">
                Already a member <a href="login.php">Sign In</a>
            </div>
        </div>
    </div>
    
</body>
</html>