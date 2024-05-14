<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <div class="field inbox">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="field inbox">
                <label for="password">password</label>
                <input type="password" name="password" id="password" required>
            </div>
            
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="login"required>
                </div>
                
            <div class="link">
                Don't have account? <a href="register.php">Sign Up Now</a>
            </div>
        </div>
    </div>
    
</body>
</html>