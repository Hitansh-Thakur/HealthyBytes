<?php
session_start();

// var_dump($_SESSION);
require_once './db_connect.php';
require_once './razorpay-php-2.9.0/Razorpay.php'; // Include the Razorpay SDK

use Razorpay\Api\Api;

$api = new Api('rzp_test_7uVG1qKCzbwtMp', '1zmntNrVqlX9Qr26SfOelbVB');

$payment = $api->payment->fetch($_POST['razorpay_payment_id']);




if ($payment['status'] == 'captured') {

    // Payment was successful, update the order in the database
    $stmt = $conn->prepare("UPDATE orders SET order_status = 'OutForDelivery' WHERE id = ? ");
    $stmt->bind_param("i", $_SESSION['order_id']);
    $stmt->execute();
    
    $stmt = $conn->prepare("UPDATE orders SET address = ? WHERE id = ? ");
    $stmt->bind_param("si", $_POST['address'],$_SESSION['order_id']);
    $stmt->execute();
    

    // update the payments table
    $stmt = $conn->prepare("INSERT INTO payments (user_id, order_id, razorpay_payment_id, total_amount, payment_status) VALUES (?, ?, ?, ?, 'success')");
    $stmt->bind_param("iisi", $_SESSION['user_id'], $_SESSION['order_id'], $_POST['razorpay_payment_id'], $_SESSION['total']);
    $stmt->execute();
    
    

    
    
    // echo 'Payment successful.';
    // clear cart
    $stmt = $conn->prepare("DELETE FROM cart_items WHERE cart_id = ?");
    $stmt->bind_param("i", $_SESSION['cart_id']);
    $stmt->execute();
    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['cart_id']);
    $stmt->execute();
    unset($_SESSION['razorpay_order_id']);
    unset($_SESSION['razorpay_payment_id']);
    $_SESSION['order_items'] = $_SESSION['cart_items'];
    unset($_SESSION['cart_items']);
    
    header("Location: post_checkout.php");


} else {
    echo 'Payment failed.';
}