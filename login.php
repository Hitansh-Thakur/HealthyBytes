<?php
session_start();

require 'db_connect.php'; // Include your database connection file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();


    if ($user && password_verify($password, $user['password'])) {
        // Successful login
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        // echo "session user id: " . $_SESSION['user_id'] . "<br>";
        //redirect to home page
        echo '
        <div class="fixed-top alert alert-success alert-dismissible fade show" role="alert">
            <strong>Login Successfull</strong>
        </div>
        ';
        header("refresh:2;url=index.php");
        
    } else {
        // Invalid credentials
        // header("Location: login.php");
        // automatically redirect to login page after 3 seconds
        // header("Location:login.php");
        echo '
        <div class="fixed-top alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalid Credentials</strong>
        </div>
        ';
        header("refresh:2");
    }
}
?>

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

<body>.
    <div class="main-container">
        <div class="login-container">
            <h2>Login</h2>
            <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validatePassword()">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <small id="passwordError" class="form-text text-danger d-none">Password must contain at least one special character and be at least 6 characters long.</small>

                <div class="signup-options">
                    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                </div>
                <div class="Reset password?"><p> <a href= "./AdminPanel/resetpassword.php" >forget password?</a></p></div>


                <button type="submit">Login</button>
            </form>
        </div>
    </div>

    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var passwordError = document.getElementById("passwordError");

            // Regular expression to check for at least one special character
            var specialCharRegex = /[!@#$%^&*(),.?":{}|<>]/;

            if (password.length < 6 || !specialCharRegex.test(password)) {
                passwordError.classList.remove("d-none");
                
                return false;
            } else {
                passwordError.classList.add("d-none");
                return true;
            }
        }
    </script>
</body>

</html>
