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
        include 'adminNav.php';
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
                    include '../db_connect.php';
                    $result = $conn->query("SELECT * FROM salads");
                    while ($salad = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $salad['id'] . "</td>";
                        echo "<td>" . $salad['salad_name'] . "</td>";
                        echo "<td>" . $salad['salad_desc'] . "</td>";
                        echo "<td>" . $salad['salad_price'] . "</td>";
                        echo "<td>" . $salad['ingredients'] . "</td>";
                        echo "<td>" . $salad['category'] . "</td>";
                        echo "<td><img src='../uploads/" . $salad['salad_img'] . "' width='220' height='220' style='object-fit:cover;'></td>";
                        echo "<td><a href='edit.php?id=" . $salad['id'] . "' class='btn btn-info my-2'>Edit</a> <a href='delete.php?id=" . $salad['id'] . "' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </section>
</body>

</html>