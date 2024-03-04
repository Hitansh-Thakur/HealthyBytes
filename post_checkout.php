<?php
// Start the session
session_start();

// Check if the session variables are set
if (!isset($_SESSION['order_id']) || !isset($_SESSION['total'])) {
    // Redirect to the checkout page if session variables are not set
    header("Location: cart.php");
    exit();
}

// Include the database connection file
require_once 'db_connect.php';

// Get the order ID and total from session
$order_id = $_SESSION['order_id'];
$total = $_SESSION['total'];

// Retrieve order details from the database
$stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $order = $result->fetch_assoc();
}

// Clear the session variables
// unset($_SESSION['order_id']);
unset($_SESSION['total']);

// Include the header file
include 'nav.php';
?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 my-5">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Order Confirmation
                </div>
                <div class="card-body tex-dark" style="color:#333 !improtant;">
                    <h5 class="card-title">Thank you for your order!</h5>
                    <p class="card-text">Your order has been successfully placed.</p>
                    <p><strong>Order ID:</strong> <?php echo $order['id']; ?></p>
                    <p><strong>Total Amount:</strong> ₹<?php echo number_format($total, 2); ?></p>
                    <!-- You can display additional order details here -->
                    <a href="index.php" class="btn btn-primary">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Include the footer file
include 'footer.php';
?>
