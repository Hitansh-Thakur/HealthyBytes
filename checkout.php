    <?php
    session_start();
    require_once './db_connect.php';
    require_once './razorpay-php-2.9.0/Razorpay.php'; // Include the Razorpay SDK
    use Razorpay\Api\Api;

    $api = new Api('rzp_test_7uVG1qKCzbwtMp', '1zmntNrVqlX9Qr26SfOelbVB');
    $fullName = "";
    $email = "";
    $address = "";
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Checkout Page</title>
        <!-- razor pay -->
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>


    <body>
        <?php
        include 'nav.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if the key exists in $_POST, if not, set a default value
            $fullName = isset($_POST["fullName"]) ? $_POST["fullName"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $address = isset($_POST["address"]) ? $_POST["address"] : "";

            // Perform any backend processing or validation here
        
            // Assuming you want to send an email for demonstration purposes
            $to = "your@email.com";
            $subject = "New Order";
            $message = "Full Name: $fullName\nEmail: $email\nAddress: $address";

            // You can use mail() function to send the email
            if (mail($to, $subject, $message)) {
                echo "Email sent successfully!";
            } else {
                echo "Error sending email.";
            }

            // You can also perform database operations or other backend tasks here
        
            // For demonstration, let's redirect to a thank you page
        
            exit();
        }

        ?>


        <div class="container-fluid  d-flex" style="width:80%">
            <div class="col pr-5">

                <h2 class="mb-4 mt-4">Checkout</h2>
                <form action="check.php" method="post">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" name="fullname" class="form-control" id="fullName" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter your address"
                            required></textarea>
                    </div>  

                    <button id="rzp-button1" type="submit" class="btn btn-primary">Place Order</button>
                </form>

            </div>
            <div class="col-lg-5 mt-4">

                <!-- make me a small table to summarize the products using bootstrap -->
                <table class="table  table-sm">
                    <h5>Order Summary</h5>

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $total = $_SESSION['total'];
                        $total_qty = $_SESSION['total_Quantity'];
                        // using session[cart] array display a order summary using bootstrap and php
                        // TODO: USE QUERY TO GET THE PRODUCT DETAILS FROM THE DATABASE
                        $nos=0;
                        foreach ($_SESSION['cart_items'] as $key => $value) {
                            $nos++;
                            echo "<tr>
                                <td>" . $nos. "</td>
                                <td>" . $value['name'] . "</td>
                                <td>" . $value['price'] . "</td>
                                <td>" . $value['quantity'] . "</td>
                                <td>" . $value['price'] * $value['quantity'] . "</td>
                                <td><img src='./uploads/" . $value['img'] . "' alt='product image' class='img-fluid' style='max-width:5em'></td>
                            </tr>";
                        }
                        // display total
                        echo "<tr>
                <td></td>
                <td></td>
                <th colspan='2'>Total Items:" . $total_qty . "</th>
                <th colspan='2'>Total: $total</th>
            </tr>";

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php
        $cartItems = $_SESSION['cart_items'];
        $total = $_SESSION['total'];
        $userId = $_SESSION['user_id'];
        if ($total == 0) {
            echo "<a href='./products.php' class='btn btn-primary'>Continue Shopping</a>";
            exit();
        }

        $conn->begin_transaction();

        try {
            // Insert into orders table
            $stmt = $conn->prepare("INSERT INTO orders (user_id, total_amount , order_status) VALUES (?,?, 'pending')");
            $stmt->bind_param("id", $userId, $total);

            $userId = $_SESSION['user_id'];


            $stmt->execute();
            $orderId = $conn->insert_id;
            $stmt->close();
            $userId = $_SESSION['user_id'];

            // Query the cart_items table to get all the items in the cart for the current user
            $stmt = $conn->prepare("SELECT cart_items.* 
        FROM cart_items 
        JOIN cart ON cart_items.cart_id = cart.id 
        WHERE cart.user_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // For each item in the cart, insert a new row into the order_items table
            while ($row = $result->fetch_assoc()) {
                $salad_id = $row['salad_id'];
                $quantity = $row['quantity'];
                $price = $row['price'];

                $stmt = $conn->prepare("INSERT INTO order_items (order_id, salad_id, quantity, price) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("iiid", $orderId, $salad_id, $quantity, $price);
                $stmt->execute();
            }


            $stmt->close();

            // Commit transaction
            $conn->commit();

            // echo "Order placed successfully";
        } catch (Exception $e) {
            // Rollback transaction if something went wrong
            $conn->rollback();

            echo "Error placing order: " . $e->getMessage();
        }


        // <!-- -------------RAZOR PAY---------------------- -->
        
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
        $_SESSION['order_id'] = $orderId;
        $_SESSION['address'] = $address;

        // Display the checkout form
        echo '
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

                        // Add the address data to the form
                        var input_address = document.createElement("input");
                        input_address.type = "hidden";
                        input_address.name = "address";
                        input_address.value = document.getElementById("address").value;
                        form.appendChild(input_address);
                    


                        document.body.appendChild(form);
                        form.submit();
                    },
                    "prefill": {
                        "name": "' . $fullName . '",
                        "email": "' . $email . '",
                        "contact": "9999999999"
                    },
                    "notes": {
                        "address": "' . $address . '"
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
        include 'footer.php';
        ?>

        <!-- Bootstrap JS and Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>

    </html>