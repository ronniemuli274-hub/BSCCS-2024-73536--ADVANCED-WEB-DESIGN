<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


$host = "localhost";
$user = "root";
$password = "";
$database = "online_food_ordering_website_database";

$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$Customer_Name = $_POST['Customer_Name'] ?? '';
$Customer_Email = $_POST['Customer_Email'] ?? '';
$Order_Details = $_POST['Order_Details'] ?? '';


if (empty($Customer_Name) || empty($Customer_Email) || empty($Order_Details)) {
    die("Please fill all fields.");
}

$sql = "INSERT INTO orders (Customer_Name,Customer_Email,Order_details) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $Customer_Name, $Customer_Email, $Order_Details);

if ($stmt->execute()) {
    echo "Order submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
