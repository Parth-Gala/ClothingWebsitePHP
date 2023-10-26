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
                <li><a class="active" href="contact.html">Contact</a></li>
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

    <section id="page-header" class="about-header">
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE. WE LOVE TO HEAR FROM YOU! </p>

    </section>

    <section id="contact-details" class="section-p1">
      <div class="details">
        <span>GET IN TOUCH</span>
        <h2>Visit one of our agency locations or contact us today</h2>
        <h3>Head Office</h3>
        <div>
            <li>
                <i class="fal fa-map"></i>
                <p>562 Lorem ipsum dolor sit amet consectetur elit.</p>
            </li>
            <li>
                <i class="fal fa-envelope"></i>
                <p>562 Lorem ipsum dolor sit amet consectetur elit.</p>
            </li>
            <li>
                <i class="fal fa-phone"></i>
                <p>562 Lorem ipsum dolor sit amet consectetur elit.</p>
            </li>
            <li>
                <i class="fal fa-clock"></i>
                <p>562 Lorem ipsum dolor sit amet consectetur elit.</p>
            </li>
        </div>
    </div>

        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.7927659956586!2d72.89735127507633!3d19.072846982131107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c627a20bcaa9%3A0xb2fd3bcfeac0052a!2sK.%20J.%20Somaiya%20College%20of%20Engineering!5e0!3m2!1sen!2sin!4v1689108875539!5m2!1sen!2sin"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>


    <section id="form-details">
        <form action="">
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" placeholder="Your Name">
            <input type="text" placeholder="E-mail">
            <input type="text" placeholder="Subject">
            <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
      <button class="normal" onclick="alert('Data sent Successfully')">Sumbit</button>
        </form>

        <div class="people">
            <div>
                <img src="img/Testimonial.png" alt="#">
                <p><span>John Doe</span>Senior Marketing Manager <br> Phone: +91 123455678 <br> Email: contact@example.com</p>
            </div>
            <div>
                <img src="img/testominal2.jfif" alt="#">
                <p><span>John Doe</span>Senior Marketing Manager <br> Phone: +91 123455678 <br> Email: contact@example.com</p>
            </div>
            <div>
                <img src="img/testominal3.jfif" alt="#">
                <p><span>John Doe</span>Senior Marketing Manager <br> Phone: +91 123455678 <br> Email: contact@example.com</p>
            </div>
            <div>
                <img src="img/testominal4.jfif" alt="#">
                <p><span>John Doe</span>Senior Marketing Manager <br> Phone: +91 123455678 <br> Email: contact@example.com</p>
            </div>
        </div>
    </section>


    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop & <span>special offers</span></p>
        </div>
        <div class="form">
            <input type="text" name="newsmail" id="newsmail" placeholder="Your email address">
            <button class="normal" onclick="submit_otp()">Sign Up</button>
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




    <script src="loader.js"></script>
    <script src="script.js"></script>
</body>
<script>
    function send_otp(){
	var email=jQuery('newsmail').val();
	jQuery.ajax({
		url:'send_mail.php',
		type:'post',
		data:'email='+email,
		// success:function(result){
		// 	if(result=='not_exist'){
		// 		jQuery('#email_error').html('Please enter valid email');
		// 	}
		// }
	});
}
</script>
</html>