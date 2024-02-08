<?php
// Include the database configuration file
include_once '../db.php';


$targetDir = "../uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Get form data
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $price = $_POST['price'];
            $nutritional_content = $_POST['nutritional_content'];
            $ingredients = $_POST['ingredients'];

            // Insert data into database
            $insert = $conn->query("INSERT into salads (salad_name, salad_desc, salad_price, nutritional_content, ingredients, salad_img) VALUES ('" . $name . "', '" . $desc . "', '" . $price . "', '" . $nutritional_content . "', '" . $ingredients . "', '" . $fileName . "')");
            if ($insert) {
                echo "The salad has been added successfully.";
                header("Location: insert.php");
            } else {
                echo "Failed to add the salad, please try again.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
} else {
    echo 'Please select a file to upload.';
}
?>