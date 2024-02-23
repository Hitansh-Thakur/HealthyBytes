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
        header("Location: index.php");
    } else {
        // Invalid credentials
        // header("Location: login.php");
        // automatically redirect to login page after 3 seconds
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
}
?>