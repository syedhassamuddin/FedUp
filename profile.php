<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="profilephp.css">
</head>
<body>
    <div class="container">
        <h1>Profile Page</h1>
        <div class="tabs">
            <button class="tab-button" onclick="showTab('packages')">Packages</button>
            <button class="tab-button" onclick="showTab('admins')">Admins</button>
            <button class="tab-button" onclick="showTab('agents')">Agents</button>
            <button class="tab-button" onclick="showTab('customers')">Customers</button>
        </div>

        <div class="tab-content" id="packages">
            <h2>Packages</h2>
            <!-- Add form for Packages if needed -->
        </div>

        <div class="tab-content" id="admins">
            <h2>Admins</h2>
            <!-- Add form for Admins if needed -->
        </div>

        <div class="tab-content" id="agents">
            <h2>Agents</h2>
            <!-- Add form for Agents if needed -->
        </div>

        <div class="tab-content" id="customers">
            <h2>Customers</h2>
            <form action="save_customer.php" method="POST">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function showTab(tabName) {
            var i;
            var tabContent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabContent.length; i++) {
                tabContent[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "block";
        }
        // Show the first tab by default
        document.getElementsByClassName("tab-button")[0].click();
    </script>
</body>
</html>
