<?php
session_start();
require_once './db_connect.php';
require_once './razorpay-php-2.9.0/Razorpay.php'; // Include the Razorpay SDK

use Razorpay\Api\Api;

$api = new Api('rzp_test_7uVG1qKCzbwtMp', '1zmntNrVqlX9Qr26SfOelbVB');

$payment = $api->payment->fetch($_POST['razorpay_payment_id']);

if ($payment['status'] == 'captured') {
    // Payment was successful, update the order in the database
    // $stmt = $conn->prepare("UPDATE cart SET status = 'Paid' WHERE id = ?");
    // $stmt->bind_param("i", $_SESSION['razorpay_order_id']);
    // $stmt->execute();
    echo 'Payment successful.';
    // clear cart
    $stmt = $conn->prepare("DELETE FROM cart_items WHERE cart_id = ?");
    $stmt->bind_param("i", $_SESSION['cart_id']);
    $stmt->execute();
    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['cart_id']);
    $stmt->execute();
    unset($_SESSION['razorpay_order_id']);
    unset($_SESSION['razorpay_payment_id']);
    header('Refresh: 3; URL=./index.php');


} else {
    echo 'Payment failed.';
}