<?php
$conn = new mysqli("localhost", "root", "", "online_food_ordering_website_database");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to MySQL!";
