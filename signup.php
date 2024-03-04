<?php
session_start();

include_once 'db_connect.php';

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // validate username by checking if it already exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $errors['username'] = "Username already exists";
    }

    // validate email by checking if it already exists in the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $errors['email'] = "Email already exists";
    }






    // Validate password

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Save the data to your database or perform further actions
    // Example: Insert into a users table
    if (empty($errors)) {
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";
        $conn->query($sql);

        $last_id = $conn->insert_id;
        $_SESSION['user_id'] = $last_id;
        $_SESSION['username'] = $username;
        header("Location: index.php");

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./signup.css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Sign Up</h2>
        <form class="needs-validation" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
            novalidate>
            <div class="form-grofup">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" minlength="8" required>
                <?php if (!empty($errors['username']))
                    echo '<div class="error">' . $errors['username'] . '</div>'; ?>
                <div class="invalid-feedback">
                    Username should be minimum 8 characters
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" minlength="8" required>
                <?php if (!empty($errors['password']))
                    echo '<div class="error">' . $errors['password'] . '</div>'; ?>
                <div class="invalid-feedback">
                    Password should be minimum 8 characters
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
                <?php if (!empty($errors['password']))
                    echo '<div class="error">' . $errors['email'] . '</div>'; ?>
                <div class="invalid-feedback">
                    Email is required
                </div>
            </div>

            <input type="submit" value="Sign Up"></input>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"
        integrity="sha384-/zFjtkM9a6Mvfb0JpuziJj6H+dItVjYK73c52ObJrJig9MBA+0NRbqzFArto2C+C"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script>
        // Bootstrap validation
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>