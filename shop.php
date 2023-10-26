<?php
include('include/connect.php');
// Start or resume the session
session_start();

// Define a function to add an item to the cart
function addToCart($productId, $productName, $productPrice, $productBrand)
{
    $cartItem = array(
        'id' => $productId,
        'name' => $productName,
        'price' => $productPrice,
        'brand' => $productBrand
    );

    // Add the item to the cart session
    $_SESSION['cart'][] = $cartItem;
}

// Check if the Add to Cart button is clicked and add the item to the cart
if (isset($_POST['addToCart'])) {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productBrand = $_POST['productBrand'];

    addToCart($productId, $productName, $productPrice, $productBrand);
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
    <!-- <link rel="stylesheet" href="loader.css" /> -->

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body>
    <div class="loader"></div>
    <section id="header">
        <a href="#"><img src="img/logo.png" alt="logo" /></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li>
                <li id="lg-bag"><a href="cart.php"><i class="fas fa-shopping-bag"></i></a></li>
                </li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">

            <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="page-header">
        <h2>#Stayhome</h2>
        <p>Save more with coupons & upto 70% off!</p>
    </section>



    <section id="product1" class="section-p1">

        <div class="pro-container">
        <?php
            $select_query = "Select * from `clothes`";
            $result_query = mysqli_query($con, $select_query);
            $row = mysqli_fetch_assoc($result_query);
            while($row = mysqli_fetch_assoc($result_query)){
                $type = $row['type'];
                $brand_id = $row['brand_id'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $description = $row['description'];
                $size = $row['size'];
                $image = $row['image'];
                $clothes_id = $row['clothes_id'];

                if (!is_null($brand_id)) {
                    $select_brand = "SELECT * FROM `brands` WHERE brand_id = '$brand_id'";
                    $result_brand = mysqli_query($con, $select_brand);
            
                    while ($row_brand = mysqli_fetch_assoc($result_brand)) {
                        $brand_name = $row_brand['name'];
                        echo "<div class='pro'>
            
                        <img src='admin/database_images/$image' alt='image' />
                        <div class='des'>
                            <span>$brand_name</span>
                            <h5>$type</h5>
                            <div class='star'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                            </div>
                            <br>
                            <div>$description</div>
                            <br>
                            <span> In Stock: <h4 style='display: inline'>$quantity</h4></span>
                            <h4>$$price</h4>
                        </div>
                        <form action='cart.php' method='post'>
                            <input type='hidden' name='productId' value='$clothes_id' />
                            <input type='hidden' name='productName' value='$type' />
                            <input type='hidden' name='productPrice' value='$price' />
                            <input type='hidden' name='productBrand' value='$brand_name' />
                            <
                            <button type='submit' class='fal fa-shopping-cart cart' name='addToCart'></button>
                        </form>
                    </div>";
                    }
                } else {
                    echo "No brand found.";
                }
            };
            ?>
            <!-- <div class="pro">
            
                <img src="img/products/f1.jpg" alt="" />
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <form action="cart.php" method="post">
                    <input type="hidden" name="productId" value="1" />
                    <input type="hidden" name="productName" value="Cartoon Astronut T-Shirts" />
                    <input type="hidden" name="productPrice" value="78" />
                    <input type="hidden" name="productBrand" value="adidas" />
                    <button type="submit" class="fal fa-shopping-cart cart" name="addToCart"></button>
                </form>
            </div> -->

            <!-- <div class="pro">
                <img src="img/products/f8.jpg" alt="" />
                <div class="des">
                    <span>Zara</span>
                    <h5>Crop-Top</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$24</h4>
                </div>
                <form action="cart.php" method="post">
                    <input type="hidden" name="productId" value="2" />
                    <input type="hidden" name="productName" value="Crop-Top" />
                    <input type="hidden" name="productPrice" value="24" />
                    <input type="hidden" name="productBrand" value="Zara" />
                    <button type="submit" class="fal fa-shopping-cart cart" name="addToCart"></button>
                </form>
            </div> -->

            <!-- <div class="pro">
                <img src="img/products/f2.jpg" alt="" />
                <div class="des">
                    <span>Zeeve</span>
                    <h5>Japanese print Hawaiian Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$40</h4>
                </div>
                <form action="cart.php" method="post">
                    <input type="hidden" name="productId" value="3" />
                    <input type="hidden" name="productName" value="Japanese print Hawaiian Shirt" />
                    <input type="hidden" name="productPrice" value="40" />
                    <input type="hidden" name="productBrand" value="Zeeve" />
                    <button type="submit" class="fal fa-shopping-cart cart" name="addToCart"></button>
                </form>
            </div> -->

            <!-- <div class="pro">
                <img src="img/products/f3.jpg" alt="" />
                <div class="des">
                    <span>Anamor</span>
                    <h5>Flower print Hawaiian Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$20</h4>
                </div>
                <form action="cart.php" method="post">
                    <input type="hidden" name="productId" value="4" />
                    <input type="hidden" name="productName" value="Flower print Hawaiian Shirt" />
                    <input type="hidden" name="productPrice" value="20" />
                    <input type="hidden" name="productBrand" value="Anamor" />
                    <button type="submit" class="fal fa-shopping-cart cart" name="addToCart"></button>
                </form>
            </div> -->

            <!-- <div class="pro">
                <img src="img/products/f4.jpg" alt="" />
                <div class="des">
                    <span>Zara</span>
                    <h5>White Hawaiian Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$48</h4>
                </div>
                <form action="cart.php" method="post">
                    <input type="hidden" name="productId" value="5" />
                    <input type="hidden" name="productName" value="White Hawaiian Shirt" />
                    <input type="hidden" name="productPrice" value="48" />
                    <input type="hidden" name="productBrand" value="Zara" />
                    <button type="submit" class="fal fa-shopping-cart cart" name="addToCart"></button>
                </form>
            </div> -->

            <!-- <div class="pro">
                <img src="img/products/f5.jpg" alt="" />
                <div class="des">
                    <span>H&M</span>
                    <h5>Basics Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$28</h4>
                </div>
                <form action="cart.php" method="post">
                    <input type="hidden" name="productId" value="6" />
                    <input type="hidden" name="productName" value="Basic Shirt" />
                    <input type="hidden" name="productPrice" value="28" />
                    <input type="hidden" name="productBrand" value="H&M" />
                    <button type="submit" class="fal fa-shopping-cart cart" name="addToCart"></button>
                </form>    
            </div> -->

            <!-- <div class="pro">
                <img src="img/products/f6.jpg" alt="" />
                <div class="des">
                    <span>Gap</span>
                    <h5>Classic Winter Jacket</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$80</h4>
                </div>
                <form action="cart.php" method="post">
                    <input type="hidden" name="productId" value="7" />
                    <input type="hidden" name="productName" value="Classic Winter Jacket" />
                    <input type="hidden" name="productPrice" value="80" />
                    <input type="hidden" name="productBrand" value="Gap" />
                    <button type="submit" class="fal fa-shopping-cart cart" name="addToCart"></button>
                </form>   
            </div> -->

            <!-- <div class="pro">
                <img src="img/products/f7.jpg" alt="" />
                <div class="des">
                    <span>Zara</span>
                    <h5>Loose Pants Womens basics</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$32</h4>
                </div>
                <form action="cart.php" method="post">
                    <input type="hidden" name="productId" value="8" />
                    <input type="hidden" name="productName" value="Loose Pants Womens basics" />
                    <input type="hidden" name="productPrice" value="32" />
                    <input type="hidden" name="productBrand" value="Zara" />
                    <button type="submit" class="fal fa-shopping-cart cart" name="addToCart"></button>
                </form>   
            </div> -->




            <!-- <div class="pro">
                <img src="img/products/n1.jpg" alt="" />
                <div class="des">
                    <span>WestSide</span>
                    <h5>Full sleeve Basic Plain Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$23</h4>
                </div>
                <form action="cart.php" method="post">
                    <input type="hidden" name="productId" value="9" />
                    <input type="hidden" name="productName" value="Full Sleeve Basic White Shirt" />
                    <input type="hidden" name="productPrice" value="23" />
                    <input type="hidden" name="productBrand" value="WestSide" />
                    <button type="submit" class="fal fa-shopping-cart cart" name="addToCart"></button>
                </form>  
            </div> -->

            <!-- <div class="pro">
                <img src="img/products/n2.jpg" alt="" />
                <div class="des">
                    <span>WestSide</span>
                    <h5>Full sleeve Basic Plain Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$22</h4>
                </div>
                <form action="cart.php" method="post">
                    <input type="hidden" name="productId" value="10" />
                    <input type="hidden" name="productName" value="Full Sleeve Basic White Shirt" />
                    <input type="hidden" name="productPrice" value="22" />
                    <input type="hidden" name="productBrand" value="WestSide" />
                    <button type="submit" class="fal fa-shopping-cart cart" name="addToCart"></button>
                </form>   
            </div> -->

            <!-- <div class="pro">
                <img src="img/products/n3.jpg" alt="" />
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div> -->

            <!-- <div class="pro">
                <img src="img/products/n4.jpg" alt="" />
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div> -->

            <!-- <div class="pro">
                <img src="img/products/n5.jpg" alt="" />
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div> -->

            <!-- <div class="pro">
                <img src="img/products/n6.jpg" alt="" />
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div> -->

            <!-- <div class="pro">
                <img src="img/products/n7.jpg" alt="" />
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div> -->

            <!-- <div class="pro">
                <img src="img/products/n8.jpg" alt="" />
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
            </div> -->
        </div>
    </section>

    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
    </section>


    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop & <span>special offers</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
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




    <!-- <script src="loader.js"></script> -->
    <!-- <script src="script.js"></script> -->
</body>

</html>