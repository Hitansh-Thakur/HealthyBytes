<?php
session_start();

include_once 'db.php';

// Define variables and initialize with empty values
$usernameErr = $emailErr = $passwordErr = "";
$username = $email = $password = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input($_POST["username"]);
        // check if username already exists
        $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
        if ($result->num_rows > 0) {
            $usernameErr = "Username already exists";
        }

        // Check if username only contains letters and numbers
        if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
            $usernameErr = "Only letters and numbers allowed";
        }


    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate password
    // if (empty($_POST["password"])) {
    //     $passwordErr = "Password is required";
    // } else {
    //     $password = test_input($_POST["password"]);
    //     // Check if password is strong
    //     if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$password)) {
    //         $passwordErr = "Password must be minimum eight characters, at least one letter and one number";
    //     }
    // }

    // Check input errors before inserting in database
    if (empty($usernameErr) && empty($passwordErr) && empty($emailErr)) {
        // Hash the password (for security)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Save the data to your database or perform further actions
        // Example: Insert into a users table
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";
        $conn->query($sql);
        // Display success message or redirect to a success page
        $_SESSION['username'] = $username;
        header("Location: index.php");
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup1.css">
    <title>Sign Up</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Sign Up</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <span class="error"> <?php echo $usernameErr;?></span><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <span class="error"> <?php echo $passwordErr;?></span><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <span class="error "> <?php echo $emailErr;?></span><br>

        <input type="submit" value="Sign Up">
    </form>
</body>

</html>