<?php
ob_start();
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include 'config.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="">
   </head>
  <body style="background-color: #087b81">

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
      <h2 class="mb_10 text-center text-white">Inventory Management System</h2>
      </div>
    </div>
  </div>
  <div class="container mt-5">
  <div class="row justify-content-center">
      <div class="col-lg-6">
      <p class="text-center text-white">Registration is successful.</p>
<p class="text-white text-center" >
    <a class="text-white" href="<?php echo BASE_URL; ?>index.php">Go to Login Page</a>
</p>
      </div>
    </div>
  </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>