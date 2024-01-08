<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login Page</title>
</head>

<body>
    <div class="main-container">
        <div class="login-container">
            <h2>Login</h2>
            <form class="login-form" action="log.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <div class="signup-options">
                    <p>Don't have an account? <a href="signup1.php">Sign Up</a></p>

                </div>
                <button type="submit">Login</button>
            </form>
        </div>

    </div>
</body>

</html>