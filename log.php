<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db.php'; // Include your database connection file

    $username = $_POST['username'];
    $password = $_POST['password'];
    echo 'pass:'. $password."\n";
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password



    // check if password matches the password in database
    $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
    $row = $result->fetch_assoc();
    echo $row['password']."<br>";
    echo $hashed_password;
    if (password_verify($hashed_password, $row['password'])) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
    } else {

        echo "Invalid username or password";
    }


}
?>