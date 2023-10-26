<?php
// use Twilio\Rest\Client;
// $number = $_POST['number'];
// $message = $_POST['description'];
// require_once 'C:\xampp\htdocs\store\twilio-php-main\src\Twilio\autoload.php';

// $sid = "ACcb0a47f937aa7438edb2bfa0aba0139d";
// $token = "330484218ab94808ab19016ad8362f6a";
// $twilio = new Client($sid, $token);

// $twilio_number = "+12293982626";

// $twilio->messages->create(
//     $number,
//     array(
//         'from' => $twilio_number,
//         'body' => $message
//     )
// );

include('include/connect.php');

if (isset($_POST['otp_verify'])) {
    $email = $_POST['email'];
    $user_otp = $_POST['user_otp'];

    $select_query = "select otp FROM `user` where email = '$email'";
    $select_result = mysqli_query($con, $select_query);

    if ($select_result && $row = mysqli_fetch_assoc($select_result)) {
        $hashedOtp = $row['otp'];
        
        // Verify the user-entered OTP by dehashing and comparing
        if (password_verify($user_otp, $hashedOtp)) {
            echo "<script>alert('OTP verification successful. You are logged in.')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            echo "<script>alert('OTP verification failed. Please try again.')</script>";
            echo "<script>window.open('send.php','_self')</script>";
        }
    } else {
        echo "<script>alert('Email not found or database error.')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    }
}
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
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
        <h1 class="form-heading">Verify OTP</h1>
        <form action="verifyotp.php" method="post" class="form">
            <div class="form-group">
                <label for="user_otp">Enter OTP</label>
                <input type="text" id="user_otp" name="user_otp" placeholder="Enter OTP received on your mobile" />
            </div>
            <button type="submit" class="form-button">Verify</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>
<body class="bodybg">
    <section id="header">
        <a href=""><img src="img/logo.png" alt="logo" /></a>
        <div>
            <ul id="navbar">
                <li><a class="active" href="insert_clothes.php">Add Clothes</a></li>
                <li><a href="shop.php">Shop</a></li>
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
        <h1 class="form-heading">Verify OTP</h1>
        <form action="index.php" method="post" class="form">
            <input type="hidden" name="email" value="email">
            <div class="form-group">
                <label for="user_otp">Enter OTP</label>
                <input type="text" id="user_otp" name="user_otp" placeholder="Enter OTP received on your mobile" />
            </div>
            <button type="submit" class="form-button" name="otp_verify">Verify</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>