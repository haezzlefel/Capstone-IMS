<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Delivery Receipt</title>
</head>
<style>
    .custom-button-color {
        background-color: #087b81;
        color: white;
    }
</style>

<body style="background-color: #087b81">

<div class="container my-5 border border-dark rounded py-4" style="background-color: white; padding: 20px; text-align: center; color: black;">
        <h2>Delivery Receipts</h2>

   <div class="container">
   <div class="col-md-6 d-flex justify-content-start">
   <a class="btn btn-light w-50" href="/CAPSTONE/createdr.php" role="button" style="background-color: #087b81; color: white;">Create new DR</a>

   </div> 
   <br>
    <table class="table table-striped table-bordered table-light rounded">
        <thead>
            <tr>
                <th>DR_No.</th>
                <th>Product_Code</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            //reporting error
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            

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

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

            // Read data of each row
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['DR_No.']}</td>
                    <td>{$row['Product_Code']}</td>
                    <td>{$row['Description']}</td>
                    <td>{$row['Quantity']}</td>
                    <td>{$row['Price']}</td>
                    <td>{$row['Total']}</td>
                    <td>
                    <a class='btn btn-sm custom-button-color' href='/CAPSTONE/delete.php?id={$row['DR_No.']}'>Delete</a>
                </td>
                </tr>
                ";
            }
            ?>

</div>
        </tbody>
    </table>
</body>
</html>
