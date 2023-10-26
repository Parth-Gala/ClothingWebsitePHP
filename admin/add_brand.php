<?php
include('../include/connect.php');
if(isset($_POST['insert_brand'])){
    $name=$_POST['name'];

    $select_query="Select * from `brands` where name='$name'";
    $select_query_result=mysqli_query($con,$select_query);
    $count=mysqli_num_rows($select_query_result);
    if($count>0){
        echo "<script>alert('Brand already exists')</script>";
        echo "<script>window.open('insert_clothes.php','_self')</script>";
    }
    else{
        $insert_query="insert into `brands` (name) values ('$name')";
        $insert_query_result=mysqli_query($con,$insert_query);
        if($insert_query_result){
            echo "<script>alert('Brand inserted successfully')</script>";
            echo "<script>window.open('insert_clothes.php','_self')</script>";
        }
        else{
            echo "<script>alert('Brand not inserted')</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Brand-Admin</title>
    <link rel="stylesheet" type="text/css" href=" insert_clothes.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

</head>

<body class="bodybg">

    <section id="header">
        <a href="#"><img src="../img/logo.png" alt="logo" /></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="insert_clothes.php">Add Clothes</a></li>
                <li><a href="/store/shop.php">Shop</a></li>
                <li><a href="/store/blog.php">In Stock</a></li>
                <li><a href="/store/users.php">Users</a></li>
                <li><a href="add_brand.php">Add Brands</a></li>
                <li>
                <li id="lg-bag"><a href="/store/cart.php"><i class="fas fa-shopping-bag"></i></a></li>
                </li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">

            <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>


    <div class="form-container">
        <h1 class="form-heading">Add New Brands</h1>
        <form action="" method="post" enctype="multipart/form-data" class="form">
            <div class="form-group">
                <label for="brandname">Enter Brand Name</label>
                <input type="text" id="brandname" name="name" placeholder="Enter Brand Name" />
            </div>
            <input type="submit" class="form-button" name="insert_brand" value="Add Brand">
        </form>
    </div>
</body>

</html>