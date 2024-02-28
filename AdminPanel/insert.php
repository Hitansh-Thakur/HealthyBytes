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




    <div class="container mt">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Salad Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea class="form-control" id="desc" name="desc"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <textarea class="form-control" id="category" name="category"></textarea>
            </div>
            <div class="form-group">
                <label for="ingredients">Ingredients:</label>
                <select class="form-control" id="ingredients" name="ingredients">
                    <option value="option1">Option 1</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="file">Image:</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Upload</button>
        </form>
    </div>
</body>

</html>