<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Description Page</title>
  <link rel="stylesheet" href="product_details.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php
include_once 'nav.php';
include_once 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM salads WHERE id = $id");
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
  <div class="container-fluid pt-4" style="width:95vw">
    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo "./uploads/" . $img ?>" class="img-fluid product-image" alt="Product Image" style="height:75vh;object-fit:cover">
      </div>
      <div class="col-md-6 text-dark">
        <h1 class="text-dark">
          <?php echo $name ?>
        </h1>
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
            <?php echo $price ?>
          </strong>
        </p>
        <form action="cart.php" method="post">

        <!-- <a href="cart.php" class="btn btn-primary">Add to Cart</a> -->
        <!-- add quantity of the product use bootstrap-->
        <!-- TODO : add quantity of the product use bootstrap -->
          <div class="qty-container d-flex align-items-center  ">
            <input class="btn btn-primary mr-3" type="submit" value="Add to Cart">
            <button class="qty-btn-minus btn btn-primary rounded-left" type="button"><i class="fa fa-minus"></i></button>
            <input type="text" name="qty" value="1" class="input-qty form-control border-0 rounded-0 text-center " style="width:60px" />
            <button class="qty-btn-plus btn btn-primary rounded-right" type="button"><i class="fa fa-plus"></i></button>
          </div>

        <?php
        // take quantity of the product from        
        // $quantity = 

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

 <script>
  // Quantity increment and decrement in js
  var incrementButton = document.querySelector('.qty-btn-plus');
  var decrementButton = document.querySelector('.qty-btn-minus');
  var inputField = document.querySelector('.input-qty');

  incrementButton.addEventListener('click', function () {
    inputField.value = parseInt(inputField.value) + 1;
  });

  decrementButton.addEventListener('click', function () {
    inputField.value = parseInt(inputField.value) - 1;
  });

  // Prevent negative quantity
  inputField.addEventListener('change', function () {
    if (parseint(inputField.value) < 0) {
      inputField.value = 0;
    }
  });

  // Prevent non-numeric input
  inputField.addEventListener('keypress', function (e) {
    if (e.key === '-' || e.key === '+' || e.key === 'e') {
      e.preventDefault();
    }
  });

  // Prevent decimal input
  inputField.addEventListener('input', function () {
    if (this.value.indexOf('.') !== -1) {
      this.value = this.value.slice(0, this.value.indexOf('.'));
    }
  });

  // Prevent non-numeric input

 </script>
</body>

</html>