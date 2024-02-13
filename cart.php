<?php
session_start();

// Function to add a product to the cart
function addToCart($productId, $productName, $productPrice, $quantity = 1, $productImage) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product is already in the cart
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] === $productId) {
            $item['quantity'] += $quantity;
            $found = true;
            break;
        }
    }

    // If the product is not in the cart, add it
    if (!$found) {
        $newItem = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => $quantity,
            'image' => $productImage,
        ];
        $_SESSION['cart'][] = $newItem;
    }
}

// Example: Add a product to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {
    $productId = htmlspecialchars($_POST["product_id"]);
    $productName = htmlspecialchars($_POST["product_name"]);
    $productPrice = floatval($_POST["product_price"]);
    $quantity = isset($_POST["qty"]) ? intval($_POST["qty"]) : 1;
    $productImage = htmlspecialchars($_POST["product_image"]);

    addToCart($productId, $productName, $productPrice, $quantity, $productImage);
}

// Example: Remove a product from the cart
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["remove_from_cart"])) {
    $productIdToRemove = htmlspecialchars($_GET["product_id"]);
    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['id'] === $productIdToRemove) {
            unset($_SESSION['cart'][$index]);
            break;
        }
    }
}

// Your HTML code
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Shopping Cart</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Your Salad Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display the cart
                if (!empty($_SESSION['cart'])) {
                    $total = 0;
                    foreach ($_SESSION['cart'] as $index => $item) {
                        $itemTotal = $item['price'] * $item['quantity'];
                        echo "<tr>";
                        echo "<th width='16.6%' scope='row'>" . ($index + 1) . "</th>";
                        echo "<td width='16.6%'>{$item['name']}</td>";
                        echo "<td width='16.6%'>{$item['price']}</td>";
                        echo "<td width='16.6%'>{$item['quantity']}</td>";
                        echo "<td width='16.6%'>{$itemTotal}</td>";
                        echo "<td width='16.6%'><img src='{$item['image']}' alt='Product Image' style='max-width: 150px; max-height: 150px;'></td>";
                        echo "</tr>";
                        $total += $itemTotal;
                    }
                    echo "<tr class='table-dark'><td colspan='4' class='text-right'><strong>Total:</strong></td><td colspan='2'>$total</td></tr>";
                } else {
                    echo '<tr><td colspan="6">Your shopping cart is empty.</td></tr>';
                }
                ?>
            </tbody>
        </table>
        <a href="./products.php" class="btn btn-primary">Continue Shopping</a>
        <a href="#" class="btn btn-success">Checkout</a>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
