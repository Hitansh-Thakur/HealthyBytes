<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body class="container ">
    
<?php include 'adminNav.php';?>

<h2>Users</h2>
<table class="container table ">
    <thead>
        <tr>
            <th class="thead-dark">#</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>

        <?php
        include '../db.php';
        $result = $conn->query("SELECT * FROM users");
        while ($user = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $user['id'] . '</td>';
            echo '<td>' . $user['username'] . '</td>';
            echo '<td>' . $user['email'] . '</td>';
            echo '</tr>';
        }
        ?>

    </tbody>
</table>

</body>
</html>