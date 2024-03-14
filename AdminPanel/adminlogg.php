<?php
// Database configuration
include_once '../db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values submitted by the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate the username and password (you may want to perform more thorough validation)
    $sql = "SELECT id, admin_name, admin_password FROM admin WHERE admin_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    // Verify the password submitted by the user without the password_hash() function

    if ($password == $admin['admin_password']){
        // Successful login
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['adminName'] = $admin['admin_name'];
        // Authentication successful, redirect to the admin dashboard or perform any other action
        header("Location: admin.php");
        exit();
    } else {
        // Authentication failed, display an error message or redirect to the login page
        header("Location:login.php");
        echo '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Invalid Credentials</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ';
    }


    $stmt->close();
}

// Close the database connection
$conn->close();
?>