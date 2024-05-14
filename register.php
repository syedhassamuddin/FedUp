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
        $username =$_POST['username'];
        $email =$_POST['email'];
        $contact =$_POST['contact'];
        $password =$_POST['password'];


        $verify_query = mysqli_query($con,"SELECT email FROM users WHERE  email= '$email'");
        if(mysqli_num_rows($verify_query) !=0)
        {
            echo
             "<div class='message'>
             <p>This email is used, Try another One Please!</p>
            </div><br>" ;
            echo "<a href='javascript:self.history.back()'> <button class='btn'>Go Back</button>";
           
        }
        else{
            mysqli_query($con,"INSERT INTO users(username,email,contact,password) VALUES('$username','$email','$contact','$password',)");
            echo
            "<div class='message'>
            <p>Registration Successfully!</p>
           </div><br>";
           echo "<a href='index.php'> <button class='btn'>Login Now</button>";
          
       }
        }

 
    ?>


    <div class="container">
        <div class="box form-box">
            <header>Sign Up</header>
            <div class="field inbox">
                <label for="username">Usersname</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="field inbox">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" autocomplete="off">
            </div>
            <div class="field inbox">
                <label for="contact">Contact</label>
                <input type="number" name="contact" id="contact" requireautocomplete="off">
            </div>
            <div class="field inbox">
                <label for="password">password</label>
                <input type="password" name="password" id="password" requireautocomplete="off">
            </div>
            
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="login"requireautocomplete="off">
                </div>
                
            <div class="link">
                Already a member <a href="login.php">Sign In</a>
            </div>
        </div>
    </div>
    
</body>
</html>