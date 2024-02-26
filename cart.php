<?php
session_start();
require_once './db_connect.php';
require_once './razorpay-php-2.9.0/Razorpay.php'; // Include the Razorpay SDK
use Razorpay\Api\Api;

$api = new Api('rzp_test_7uVG1qKCzbwtMp', '1zmntNrVqlX9Qr26SfOelbVB');



// check if the user is logged in

// Check if the add to cart form is submitted

if (isset($_POST['add_to_cart']) and isset($_SESSION['user_id'])) {
    $product_id = htmlspecialchars($_POST['product_id']);
    $quantity = $_POST['qty'];
    $price = floatval($_POST['product_price']);


    // Get the product details from the database
    $stmt = $conn->prepare("SELECT * FROM salads WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    // check if user is logged in

    // Check if a cart already exists for the user
    $user_id = $_SESSION['user_id']; // Get the user ID from the session
    // echo "user id: " . $user_id . "<br>";
    $stmt = $conn->prepare("SELECT id FROM cart WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $cart = $result->fetch_assoc();
        $cart_id = $cart['id'];
    } else {
        // Create a new cart
        $stmt = $conn->prepare("INSERT INTO cart (user_id) VALUES (?)");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        // indert_id returns the last inserted ID
        $cart_id = $stmt->insert_id;
    }

    // Add the item to the cart

    // check if the product is already in the cart
    $_SESSION['cart_id'] = $cart_id;
    $stmt = $conn->prepare("SELECT * FROM cart_items WHERE cart_id = ? AND salad_id = ?");
    $stmt->bind_param("ii", $cart_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Update the quantity
        $stmt = $conn->prepare("UPDATE cart_items SET quantity = quantity + ? WHERE cart_id = ? AND salad_id = ?");
        $stmt->bind_param("iii", $quantity, $cart_id, $product_id);
        $stmt->execute();
    } else {
        // Insert a new item
        $stmt = $conn->prepare("INSERT INTO cart_items (cart_id, salad_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiid", $cart_id, $product_id, $quantity, $price);
        $stmt->execute();
    }


    // echo 'Product added to cart.';
}

// Remove item from cart
if (isset($_POST['remove_from_cart'])) {
    $item_id = $_POST['item_id'];
    $stmt = $conn->prepare("DELETE FROM cart_items WHERE id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
} elseif (isset($_POST['reduce_quantity'])) {
    $item_id = $_POST['item_id'];
    $stmt = $conn->prepare("UPDATE cart_items SET quantity = quantity - 1 WHERE id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Shopping Cart</title>

    <!-- razor pay -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


</head>

<body>
    <?php include 'nav.php';
    if (!isset($_SESSION['user_id'])) {
        echo "
        <div class='container d-flex flex-column align-items-center'>

        <h2 class='pt-5 text-center'>Please login to view your cart.</h2>
        
        <a href='./login.php' class='btn btn-primary w-25 pt-2 text-center '>Login 👉</a>
        </div>
        ";
        exit();
    }
    ?>
    <div class="container mt-5">
        <h2 class="pt-4">Your Salad Cart</h2>
        <table class="d-table table table-responsive-sm w-100">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Salad Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                    <th style="width:0" scope="col">Image</th>
                </tr>
            </thead>
            <tbody>

                <?php

                // Display the cart
                $user_id = $_SESSION['user_id'];
                $stmt = $conn->prepare(
                    "SELECT cart_items.id, salads.salad_name, salads.salad_price, cart_items.quantity, salads.salad_img 
                        FROM cart_items 
                        JOIN salads ON cart_items.salad_id = salads.id 
                        JOIN cart ON cart_items.cart_id = cart.id 
                        WHERE cart.user_id = ?"
                );
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 0) {
                    echo "<tr><td colspan='6'>Your cart is empty.</td></tr>";
                } else {
                    $total = 0;
                    $total_Quantity = 0;
                    $id = 0;
                    while ($row = $result->fetch_assoc()) {
                        $id += 1;
                        $name = $row['salad_name'];
                        $price = $row['salad_price'];
                        $quantity = $row['quantity'];
                        $img = $row['salad_img'];
                        $total += $price * $quantity;
                        $total_Quantity += $quantity;
                        echo "<tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$price</td>
                    <td>$quantity</td>
                    <td>" . $price * $quantity . "</td>
                    <td><img src='./uploads/$img' alt='product image' class='img-fluid' style='max-width:10em'></td>
                    </tr>";
                //     echo "<form method='POST'>
                //     <input type='hidden' name='item_id' value='". $row['id'].">
                //     <td><button type='submit' name='remove_from_cart'>Remove</button></td>
                //     <td><button type='submit' name='reduce_quantity'>Reduce Quantity</button></td>
                // </form>";
                    }
                    echo "<tr>
                <td></td>
                <td></td>
                <td></td>
                <th>Total Items: $total_Quantity</th>
                <th>Total: $total</th>
                <td></td>
                </tr>";


                }


                ?>
            </tbody>
        </table>

        <!-- -------------RAZOR PAY---------------------- -->
        <?php
        // Create an order in Razorpay
        $orderData = [
        'receipt' => $_SESSION['user_id'] . ' - ' . date('Y-m-d H:i:s'),
        'amount' => $total * 100, // amount in the smallest currency unit
        'currency' => 'INR',
        'payment_capture' => 1 // auto capture
        ];
        $razorpayOrder = $api->order->create($orderData);
        $razorpayOrderId = $razorpayOrder['id'];
        $_SESSION['razorpay_order_id'] = $razorpayOrderId;

        // Display the checkout form
        echo '<button id="rzp-button1" class="btn btn-primary">Pay with Razorpay</button>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            var options = {
                "key": "rzp_test_7uVG1qKCzbwtMp", // Enter the Key ID generated from the Dashboard
                "amount": "' . $total * 100 . '", // Amount is in currency subunits. Default currency is INR. Hence, here 50000 refers to 50000 paise
                "currency": "INR",
                "name": "Healthy Bytes",
                "description": "Test Transaction",
                "image": "./images/logo.png",
                "order_id": "' . $razorpayOrderId . '", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "handler": function (response) {
                    // Submit the form with the payment ID
                    var form = document.createElement("form");
                    form.action = "verify_payment.php";
                    form.method = "POST";

                    var input = document.createElement("input");
                    input.type = "hidden";
                    input.name = "razorpay_payment_id";
                    input.value = response.razorpay_payment_id;
                    form.appendChild(input);

                    document.body.appendChild(form);
                    form.submit();
                },
                "prefill": {
                    "name": "Gaurav Kumar",
                    "email": "gaurav.kumar@example.com",
                    "contact": "9999999999"
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
                "theme": {
                    "color": "#F37254"
                }
            };
            var rzp1 = new Razorpay(options);
            document.getElementById("rzp-button1").onclick = function (e) {
                rzp1.open();
                e.preventDefault();
            }
        </script>';
        
        ?>

        <a href="./products.php" class="btn btn-primary">Continue Shopping</a>
        <!-- <a href="#" class="btn btn-success">Checkout</a> -->
    </div>
    <?php include 'footer.php'; ?>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>