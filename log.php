<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require 'db.php'; // Include your database connection file
    
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        // echo $user['password'] . "<br" . $hashed_password;
        if ($user && password_verify($password, $user['password'])) {
            // Successful login
            $_SESSION['user_id'] = $user['id'];
            //redirect to home page
            header("Location: index.php");
        } else {
            // Invalid credentials
            header("Location: login.php");
            echo "Invalid credentials";
        }
    }
?>