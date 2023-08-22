<?php 

/*require_once('config/db.php');
$query = "select * from deliveryreport";
$result = mysqli_query($con, $query);*/


require_once 'config/db.php';
require_once 'config/functions.php';

$result=display_data();
$result2=display_data2();
$result3=display_data3();
$result4=display_data4();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reports.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>Reports</title>
</head>
<body style="background-color: #087b81;">
<div class="container" style="margin-top:100px; ">
        <button class="tablink" onclick="openPage('Home', this, 'white')"id="defaultOpen">Delivery Receipt</button>
        <button class="tablink" onclick="openPage('News', this, 'white')" >Stock Receipt</button>
        <button class="tablink" onclick="openPage('Contact', this, 'white')">Customers</button>
        <button class="tablink" onclick="openPage('About', this, 'white')">Orders</button>

        <div id="Home" class="tabcontent">
          <div class="container" >
            <div class="row" >
                <div class="col-lg-12 col-md-12 col-sm-12" style="background-color:white;">
                    <div class="card" >
                        <div class="card-header" style="background-color:white;">
                            <h2 style="background-color:white;">Delivery Reports</h2>
                        </div>
                        <div class="card-body" style="background-color:white;">
                            <table class="table table-bordered text-center">
                                <tr>
                                    <td>DR No.</td>
                                    <td>Product Code</td>
                                    <td>Description</td>
                                    <td>Price</td>
                                    <td>Quantity</td> 
                                    <td>Total</td>
                                </tr>
                                    <?php 
                                
    
                                        while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        <td><?php echo $row['DRNo.']; ?></td>
                                        <td><?php echo $row['productCode']; ?></td>
                                        <td><?php echo $row['Description']; ?></td>
                                        <td><?php echo $row['Price']; ?></td>
                                        <td><?php echo $row['Quantity']; ?></td>
                                        <td><?php echo $row['Total']; ?></td>
                                    </tr>        
                                    <?php
                                        }
    
    
                                    ?>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        <div id="News" class="tabcontent">
            <div class="container">
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12" style="background-color:white;">
                    <div class="card" >
                        <div class="card-header" style="background-color:white;">
                            <h2 style="background-color:white;">Stock Receipt</h2>
                            </div>
                            <div class="card-body" style="background-color:white;">
                                <table class="table table-bordered text-center">
                                    <tr>
                                        <td>Product Code</td>
                                        <td>Description</td>
                                        <td>Price</td>
                                        <td>Quantity</td> 
                                        <td>Total</td>
                                    </tr>
                                        <?php 
        
        
                                            while($row = mysqli_fetch_assoc($result2)){
                                        ?> 
                                        <tr>
                                            <td><?php echo $row['productCode']; ?></td>
                                            <td><?php echo $row['Description']; ?></td>
                                            <td><?php echo $row['Price']; ?></td>
                                            <td><?php echo $row['Quantity']; ?></td>
                                            <td><?php echo $row['Total']; ?></td>
                                        </tr>        
                                        <?php
                                            }
        
        
                                        ?>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="Contact" class="tabcontent">
            <div class="container">
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12" style="background-color:white;">
                    <div class="card" >
                        <div class="card-header" style="background-color:white;">
                            <h2 style="background-color:white;">Customer List</h2>
                            </div>
                            <div class="card-body" style="background-color:white;">
                                <table class="table table-bordered text-center">
                                    <tr>
                                        <td>Customer Name</td>
                                        <td>In Charge</td>
                                        <td>Customer Name</td>
                                        <td>Address</td> 
                                        <td>Contact Number</td>
                                    </tr>
                                        <?php 
        
        
                                            while($row = mysqli_fetch_assoc($result3)){
                                        ?> 
                                            <td><?php echo $row['storeName']; ?></td>
                                            <td><?php echo $row['inCharge']; ?></td>
                                            <td><?php echo $row['customerName']; ?></td>
                                            <td><?php echo $row['Address']; ?></td>
                                            <td><?php echo $row['contactNo']; ?></td>
                                        </tr>        
                                        <?php
                                            }
        
        
                                        ?>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="About" class="tabcontent">
            <div class="container">
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12" style="background-color:white;">
                    <div class="card" >
                        <div class="card-header" style="background-color:white;">
                            <h2 style="background-color:white;">Orders</h2>
                            </div>
                            <div class="card-body" style="background-color:white;">
                                <table class="table table-bordered text-center">
                                    <tr>
                                        <td>Store Name</td>
                                        <td>DR Number</td>
                                        <td>Status</td>
                                        <td>Quantity</td> 
                                    </tr>
                                        <?php 
        
        
                                            while($row = mysqli_fetch_assoc($result4)){
                                        ?> 
                                            <td><?php echo $row['storeName']; ?></td>
                                            <td><?php echo $row['DRNo']; ?></td>
                                            <td><?php echo $row['Status']; ?></td>
                                            <td><?php echo $row['Quantity']; ?></td>
                                        </tr>        
                                        <?php
                                            }
        
        
                                        ?>
                                    
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

</div>

    <input value='Print' type='button' class='btn btn-light' style='float:right; margin: 70px; margin-top: 20px;' onclick='handlePrint()' />
      <script type="text/javascript">
         const handlePrint = () => {
            var actContents = document.body.innerHTML;
            document.body.innerHTML = actContents;
            window.print();
         }
      </script>

        <script src="javascript/reports.js"></script>    
</body>
</html>
