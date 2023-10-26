<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['addToCart'])) {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productBrand = $_POST['productBrand'];
    // $product_image = $_POST[''];


    $isInCart = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $productId) {
            $item['quantity'] += 1;
            $isInCart = true;
            break;
        }
    }

    if (!$isInCart) {
        $cartItem = array(
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'brand' => $productBrand,
            'quantity' => 1
        );
        $_SESSION['cart'][] = $cartItem;
    }
}

// Function to remove an item from the cart
function removeFromCart($productId) {
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $productId) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}

// Check if a remove button was clicked and remove the item from the cart
if (isset($_POST['removeFromCart'])) {
    $productId = $_POST['productId'];
    removeFromCart($productId);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="loader.css" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body>
    <div class="loader"></div>
    <section id="header">
        <a href="#"><img src="img/logo.png" alt="logo" /></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a  href="contact.php">Contact</a></li>
                <li>
                <li id="lg-bag"><a class="active" href="cart.php"><i class="fas fa-shopping-bag"></i></a></li>
                </li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">

            <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="page-header" class="about-header">
        <h2>#cart</h2>
        <p>Add your coupon code & SAVE upto 70%! </p>
    </section>

    <section id="selected-products">
        <?php if (!empty($_SESSION['cart'])) : ?>
            <?php foreach ($_SESSION['cart'] as $item) : ?>
                <div style="; width: auto; height: auto ">
                    <div class="product-card" style="background-color: #e3e6f3; padding-top: 5px border: 1px solid black; border-radius: 20px; margin-top: 5px; padding-left: 10px; padding-bottom: 5px;">

                        <h3><?= $item['name']; ?></h3>
                        <p>Brand:<?= $item['brand']; ?></p>
                        <p>Price: $<?= $item['price']; ?></p>
                        <p>Quantity: <?= $item['quantity']; ?></p>
                        <form action="cart.php" method="post">
                            <input type="hidden" name="productId" value="<?= $item['id']; ?>">
                            <button type="submit" class="fa fa-trash" name="removeFromCart" style="background-color: transparent; border: none; cursor: pointer; display:flex; margin: 3px; padding: 3px; color: rgb(49, 81, 139);"> </button>
                        </form>
                    </div>
                </div>
              
            <?php endforeach; ?>
        <?php else : ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </section>



    <footer class="section-p1">

        <div class="col">
            <img class="logo" src="img/logo.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address:</strong> 562 Lorem ipsum dolor sit amet consectetur .</p>
            <p><strong>Phone:</strong> +91 4356456546</p>
            <p><strong>Hours:</strong> 10:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install Apps</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">

            </div>
            <p>Secured Payment Gateway</p>
            <img src="img/pay/pay.png" alt="">
        </div>
        <div class="copyright">
            <p>copyright @Parth Gala</p>
        </div>
    </footer>




    <script src="loader.js"></script>
    <!-- <script src="script.js"></script> -->
</body>

</html>