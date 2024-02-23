<?php
include '../db_connect.php';

include 'adminNav.php';


// Get the product ID from the query string
$id = $_GET['id'];

// Get the product details
$stmt = $conn->prepare("SELECT * FROM salads WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$salad = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['salad_name'];
    $desc = $_POST['salad_desc'];
    $price = $_POST['salad_price'];
    $ingredients = $_POST['ingredients'];
    $nutritional_content = $_POST['nutritional_content'];

    // Update the product
    $stmt = $conn->prepare("UPDATE salads SET salad_name = ?, salad_desc = ?, salad_price = ?, ingredients = ?, nutritional_content = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $name, $desc, $price, $ingredients, $nutritional_content, $id);
    $stmt->execute();

    // Check if a new image file is uploaded
    if ($_FILES['salad_image']['name']) {
        $image = $_FILES['salad_image']['name'];
        $temp = $_FILES['salad_image']['tmp_name'];
        $folder = "../uploads/";

        // Move the uploaded image to the images folder
        move_uploaded_file($temp, $folder.$image);

        // Update the image file name in the database
        $stmt = $conn->prepare("UPDATE salads SET salad_img = ? WHERE id = ?");
        $stmt->bind_param("si", $image, $id);
        $stmt->execute();
    }
    // Redirect to the admin page
    header('Location: ../admin.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>


    <!-- Your form goes here, pre-filled with the product details -->
    <form class="container" action="" method="post" enctype="multipart/form-data">
        <!-- Bootstrap CSS -->

        <div class="form-group">
            <label for="name">Salad Name:</label>
            <input type="text" class="form-control" id="name" name="salad_name"
                value="<?php echo $salad['salad_name']; ?>">
        </div>
        <div class="form-group">
            <label for="desc">Description:</label>
            <textarea class="form-control" id="desc" name="salad_desc"><?php echo $salad['salad_desc']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="salad_price"
                value="<?php echo $salad['salad_price']; ?>">
        </div>
        <div class="form-group">
            <label for="nutritional_content">Nutritional Content:</label>
            <textarea class="form-control" id="nutritional_content"
                name="nutritional_content"><?php echo $salad['nutritional_content']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="ingredients">Ingredients:</label>
            <textarea class="form-control" id="ingredients"
                name="ingredients"><?php echo $salad['ingredients']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="salad_image">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</body>

</html>