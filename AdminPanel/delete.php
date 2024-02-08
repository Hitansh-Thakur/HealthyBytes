<?php
include '../db.php';

include 'adminNav.php';

// Get the product ID from the query string
$id = $_GET['id'];

// Delete the product
$conn->query("DELETE FROM salads WHERE salad_id = $id");

// Redirect to the admin page
header('Location: ../admin.php');
exit;
?>