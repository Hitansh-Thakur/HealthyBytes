<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <?php
        include 'AdminPanel/adminNav.php';
    ?>


<section class="container mt-5">
        <h1 class="mb-4">Admin Panel</h1>
        <h2>Products</h2>
        <div class="table-responsive">


            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Ingredients</th>
                        <th>Nutritional Content</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'db.php';
                    $result = $conn->query("SELECT * FROM salads");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['salad_id'] . "</td>";
                        echo "<td>" . $row['salad_name'] . "</td>";
                        echo "<td>" . $row['salad_desc'] . "</td>";
                        echo "<td>" . $row['salad_price'] . "</td>";
                        echo "<td>" . $row['ingredients'] . "</td>";
                        echo "<td>" . $row['nutritional_content'] . "</td>";
                        echo "<td><img src='uploads/" . $row['salad_img'] . "' width='250' height='250'></td>";
                        echo "<td><a href='AdminPanel/edit.php?id=" . $row['salad_id'] . "' class='btn btn-info'>Edit</a> <a href='AdminPanel/delete.php?id=" . $row['salad_id'] . "' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </section>
</body>

</html>