<?php
$servername = "localhost";
$username = "capstoneg5";
$password = "root";
$database = "Inventory";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Read all rows from the database table
$sql = "SELECT * FROM `Delivery_Receipts`";
$result = $connection->query($sql);

$deliveryReceipts = [];

if ($result) {
    // Fetch data and store it in an array
    while ($row = $result->fetch_assoc()) {
        $deliveryReceipts[] = $row;
    }
} else {
    die("Invalid query: " . $connection->error);
}

// Close the connection
$connection->close();
?>
