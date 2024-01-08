<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Validate and process the data (add more validation as needed)
    if (!empty($username) && !empty($password) && !empty($email)) {
        // Hash the password (for security)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Save the data to your database or perform further actions
        // Example: Insert into a users table
        // $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";
        
        // Display success message or redirect to a success page
        // Example: header("Location: success.php");
    } else {
        // Display an error message for incomplete form
        echo "Please fill in all the required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="signup.css">
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>