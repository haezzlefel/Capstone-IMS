<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$servername = "localhost";
$username = "capstoneg5";
$password = "root";
$database = "Inventory";


// Create connection
$connection = new mysqli($servername, $username, $password, $database);


$Product_Code = "";
$Description = "";
$Quantity = "";
$Price = "";
$Total = "";


$errorMessage = "";
$successMessage = "";


if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $Product_Code = $_POST["Product_Code"];
    $Description = $_POST["Description"];
    $Quantity = $_POST["Quantity"];
    $Price = $_POST["Price"];
    $Total = $_POST["Total"];

    do {
        if ( empty($Product_Code) || empty($Description) || empty($Quantity) || empty($Price) || empty($Total) ) {
            $errorMessage = "All the fields are required";
            break;    
        }

        //add new dr to data base

        $sql = "INSERT INTO Delivery_Receipts (Product_Code, Description, Quantity, Price, Total) " .
            "VALUES ('$Product_Code', '$Description', '$Quantity', '$Price', '$Total' )";
            $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }   

        $Product_Code = "";
        $Description = "";
        $Quantity = "";
        $Price = "";
        $Total = "";

        $successMessage = "New DR successfully created";

        header("location: /CAPSTONE/dr.php");
        exit;

    } while (false);

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Create DR</title>
</head>
<body style="background-color: #087b81">
<div class="container my-5 border border-dark rounded py-4" style="background-color: white; padding: 20px; text-align: center; color: black;">
        <h2>New DR</h2>
        <?php
        if ( !empty($errorMessage) ) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";

        }

        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Product Code</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Product_Code" value="<?php echo $Product_Code; ?>">
            </div>    
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Description" value="<?php echo $Description; ?>">
            </div>    
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Quantity</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Quantity" value="<?php echo $Quantity; ?>">
            </div>    
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Price</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Price" value="<?php echo $Price; ?>">
            </div>    
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Total</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Total" value="<?php echo $Total; ?>">
            </div>    
            </div>

            <?php
                if ( !empty($successMessage) ) {
                    echo "
                    <div class='row mb-3'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label></button>
                        </div>
                    </div>
                    ";


                }

            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                <a class="btn text-white" href="/CAPSTONE/dr.php" role="button" style="background-color: #087b81;">Cancel</a>
                </div>    
            </div>
        </form>
    </div>
</body>
</html>