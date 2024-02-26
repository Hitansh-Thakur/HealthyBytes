<?php
session_start();
include_once 'db_connect.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM salads WHERE id = $id");
$row = $result->fetch_assoc();
$name = $row['salad_name'];
$desc = $row['salad_desc'];
$price = $row['salad_price'];
$category = $row['category'];
$ingredients = $row['ingredients'];
$img = $row['salad_img'];
$result->free();
// $conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $name ?>| Healthy Bytes</title>
  <link rel="stylesheet" href="product_details.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>
  <?php include 'nav.php'; ?>
  <div class="main container-fluid pt-4" style="width:95vw">
    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo "./uploads/" . $img ?>" class="img-fluid product-image" alt="Product Image"
          style="height:75vh;object-fit:cover">
      </div>
      <div class="col-md-6 text-dark text-justify">
        <h1 class="text-dark">
          <?php echo $name ?>
        </h1>
        <p><b>Description :</b>
          <?php echo $desc ?>
        </p>
        <p><b>Ingredients : </b>
          <?php echo $ingredients ?>
        </p>
        <table class="table table-condensed" border="2dp">
          <th>Nutritional Information (Serving Size : 300g)</th>
          <tr>
            <td>Carbohydrates</td>
            <td>39g</td>
          </tr>
          <tr>
            <td>Protein</td>
            <td>10g</td>
          </tr>
          <tr>
            <td>Fat</td>
            <td>31g</td>
          </tr>
          <tr>
            <td>Fibre</td>
            <td>13g</td>
          </tr>
        </table>
        <p><br><strong>Price: Rs.
            <?php echo $price ?>
          </strong>
        </p>
        <form action="cart.php" method="post">

          <div class="form-group">
            <label for="special_instructions">Special Cooking Instructions:</label>
            <textarea placeholder="Eg. Add more vegetables
       Add more nuts
            " class="form-control" id="special_instructions" name="special_instructions" rows="3" style="resize:none;"></textarea>
          </div>

          <!-- Quantity Conponent -->
          <?php include 'components/quantity_component.php'; ?>

          <?php

          echo '<input type="hidden" name="product_id" value="' . $id . '">';
          echo '<input type="hidden" name="product_name" value="' . $name . '">';
          echo '<input type="hidden" name="product_price" value="' . $price . '">';
          echo '<input type="hidden" name="product_image" value="uploads/' . $img . '">';
          echo '<input type="hidden" name="add_to_cart" value="1">';
          ?>
        </form>
      </div>
    </div>
  </div>


  <?php include 'footer.php'; ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>