<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Description Page</title>
  <link rel="stylesheet" href="product_details.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<?php
include_once 'nav.php';
include_once 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM salads WHERE salad_id = $id");
$row = $result->fetch_assoc();
$name = $row['salad_name'];
$desc = $row['salad_desc'];
$price = $row['salad_price'];
$nutritional_content = $row['nutritional_content'];
$ingredients = $row['ingredients'];
$img = $row['salad_img'];
$result->free();
$conn->close();






?>

<body>
  <div class="container pt-4">
    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo "./uploads/" . $img ?>" class="img-fluid product-image" alt="Product Image" width="70%">
      </div>
      <div class="col-md-6 text-dark">
        <h2 class="text-dark">
          <?php echo $name ?>
        </h2>
        <p><b>Description :</b>
          <?php echo $desc ?>
        </p>
        <p><b>Ingredients : </b>
          <?php echo $ingredients ?>
        </p>
        <table class="table" border="2dp">
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
          <?php echo $price ?></strong>
        </p>

        <!-- <a href="cart.php" class="btn btn-primary">Add to Cart</a> -->

        <?php

        echo '<form action="cart.php" method="post">';
        echo '<input type="hidden" name="product_id" value="' . $id . '">';
        echo '<input type="hidden" name="product_name" value="' . $name . '">';
        echo '<input type="hidden" name="product_price" value="' .$price . '">';
        echo '<input type="hidden" name="product_image" value="uploads/' . $img . '">';
        echo '<input type="hidden" name="add_to_cart" value="1">';
        echo '<input class="btn btn-primary" type="submit" value="Add to Cart">';
        echo '</form>';

        ?>

        <!-- add quantity of the product use bootstrap-->
        <!-- TODO : add quantity of the product use bootstrap -->



      </div>
    </div>
  </div>
</body>

</html>