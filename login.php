<?php
use Twilio\Rest\Client;
// include('include/connect.php'); 

// if (isset($_POST['username'], $_POST['email'], $_POST['number'], $_POST['gender'])) {
    // $username = $_POST['username'];
    // $email = $_POST['email'];
    // $number = $_POST['number'];
    // $gender = $_POST['gender'];

    // $otp = mt_rand(100000, 999999);

    // $insert_query = "INSERT INTO user (name, email, phone, gender, otp) VALUES ('$username', '$email', '$number', '$gender', '$otp')";
    // $insert_result = mysqli_query($con, $insert_query);

    // if ($insert_result) {
        // echo "<script>alert('User information saved successfully. OTP: $otp')</script>";
        // echo "<script>window.open('verifyotp.php','_self')</script>";
    // } else {
        // echo "<script>alert('User information not saved.')</script>";
    // }
// }

include('include/connect.php');

if (isset($_POST['insert_user'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $gender = $_POST['gender'];

    // Generate a stronger OTP (6-digit random number)
    $otp = mt_rand(100000, 999999);

    // Store a hashed version of the OTP in the database
    $hashedOtp = password_hash($otp, PASSWORD_BCRYPT);

    $insert_query = "insert into `user` (name, email, phone, gender, otp) VALUES ('$username', '$email', '$number', '$gender', '$hashedOtp')";
    $insert_result = mysqli_query($con, $insert_query);

    if ($insert_result) {
        require_once 'C:\xampp\htdocs\store\twilio-php-main\src\Twilio\autoload.php';

        $sid = "ACcb0a47f937aa7438edb2bfa0aba0139d";
        $token = "330484218ab94808ab19016ad8362f6a";
        $twilio = new Client($sid, $token);
        $twilio_number = "+12293982626";
        echo "Entered in the if statement";
        $twilio->messages->create(
            $number,
            array(
                'from' => $twilio_number,
                'body' => "Your OTP for Chickwear is: $otp."
            )
        );

        echo "<script>alert('User information saved successfully. OTP sent to $number.')</script>";
        echo "<script>window.open('send.php','_self')</script>";
    } 
    else {
        echo "<script>alert('User information not saved.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP SMS</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

</head>

<body class="bodybg">

    <section id="header">
        <a href="#"><img src="img/logo.png" alt="logo" /></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="insert_clothes.php">Add Clothes</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="blog.html">In Stock</a></li>
                <li><a href="about.html">Users</a></li>
                <li><a href="add_brand.php">Add Brands</a></li>
                <li>
                <li id="lg-bag"><a href="cart.php"><i class="fas fa-shopping-bag"></i></a></li>
                </li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>


    <div class="form-container">
        <h1 class="form-heading">Help us Know You Better</h1>
        <form action="" method="post" enctype="multipart/form-data" class="form">
        <div class="form-group">
                <label for="username">Name</label>
                <input type="text" id="username" name="username" placeholder="Parth Gala" />
</div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="example@email.com" />
</div>
            <div class="form-group">
                <label for="number">Number</label>
                <input type="text" id="number" name="number" placeholder="+9198196XXXXX" />
</div>
          
<div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" style="height: auto; padding: 4px; background-color: transparent; width: 95%; border: none;  border-bottom: 1px solid #000000;
    border-radius: 5px 5px 0px 0px;">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <br>
            <br>
            <button type="submit" class="form-button" name="insert_user" >Add</button>
            <!-- Add a relod button -->
            <button type="button" class="form-button" onclick="window.location.reload();">Clear</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>
