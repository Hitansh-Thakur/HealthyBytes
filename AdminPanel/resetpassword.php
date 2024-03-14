<?php
session_start();
include "../db_connect.php";  // Include the database connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the form
    $email = $_POST["email"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validate the email (you might want to add more robust validation)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email address";
    }

    // Validate the password (you might want to add more robust validation)
    // regex for atleast one special character: /[!@#$%^&*(),.?":{}|<>]/;

    if (strlen($newPassword) < 6 || !(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $newPassword))) {
        $_SESSION['error'] = "Invalid password. It must be at least 6 characters long and contain at least one special character.";
    }
    if($newPassword != $confirmPassword){
        $_SESSION['error'] = "Passwords do not match";
    }

    if (!isset($_SESSION['error']) ||    $_SESSION['error'] == null) {
        $_SESSION['message'] = "Password reset successful";
        // hash the password
        $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        
        // Execute SQL query to update the password for the user with the given email
        $updateQuery = "UPDATE users SET password = '$newPassword' WHERE email = '$email'";
        if ($conn->query($updateQuery) === TRUE) {
            $_SESSION['message'] = "Password reset successful";
            header("refresh:3;url=../login.php");
        } else {
            $_SESSION['error'] = "Error updating password: " . $conn->error;
        }
    } 


} 
$conn->close();

// Close database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="mb-4">Reset Password</h2>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error'];
                        unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['message'];
                        unset($_SESSION['message']); ?>
                    </div>
                <?php endif; ?>
                <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                    onsubmit="return validatePassword()">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" name="newPassword" id="newPassword"
                            placeholder="Enter your new password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword"
                            placeholder="Confirm your new password" required>
                        <small id="passwordMatch" class="form-text text-danger d-none">Passwords do not
                            match</small>
                        <small id="passwordError" class="form-text text-danger d-none">Password must contain at
                            least one special character and be at least 6 characters long.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>


                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function validateForm() {
            var newPassword = document.getElementById("newPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (newPassword !== confirmPassword) {
                document.getElementById("passwordMatch").classList.remove("d-none");
                return false;
            } else {
                document.getElementById("passwordMatch").classList.add("d-none");
            }

            // Regular expression to check for at least one special character
            var specialCharRegex = /[!@#$%^&*(),.?":{}|<>]/;

            if (newPassword.length < 6 || !specialCharRegex.test(newPassword)) {
                document.getElementById("passwordError").classList.remove("d-none");
                return false;
            } else {
                document.getElementById("passwordError").classList.add("d-none");
            }

            return true;
        }
    </script>

</body>

</html>