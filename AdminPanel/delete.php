<?php
include '../db_connect.php';

include 'adminNav.php';

// Get the product ID from the query string
$id = $_GET['id'];

// Delete the product
$conn->query("DELETE FROM salads WHERE id = $id");

// Redirect to the admin page
header('Location: ../admin.php');
exit;
?>