<?php
include "db.php";  // Include the database connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the form
    $email = $_POST["email"];
    $newPassword = $_POST["newPassword"];

    // Validate the email (you might want to add more robust validation)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
        exit;
    }

    // Validate the password (you might want to add more robust validation)
    if (strlen($newPassword) < 6 || !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $newPassword)) {
        echo "Invalid password. It must be at least 6 characters long and contain at least one special character.";
        exit;
    }

    // Execute SQL query to update the password for the user with the given email
    $updateQuery = "UPDATE user SET password = '$newPassword' WHERE email = '$email'";
    
    // Check if the update query was successful
    if ($conn->query($updateQuery) === TRUE) {
        echo "Password reset successful";
    } else {
        echo "Error updating password: " . $conn->error;
    }

} else {
    // Handle the case when the form is not submitted via POST
    echo "Invalid request method";
}

// Close database connection
$conn->close();
?>
