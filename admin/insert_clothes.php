<?php
include('../include/connect.php');
if(isset($_POST['insert_clothes'])){

    $brand_name=$_POST['brand_name'];
    // take brand id 
    $brand_id = $_POST['brand_name'];
    $clothestype=$_POST['clothestype'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $description=$_POST['description'];
    $size=$_POST['size'];

    //accesing image
    $clothes_image=$_FILES['clothes_image']['name'];

    //accesing image tmp_name
    $temp_image=$_FILES['clothes_image']['tmp_name'];

    //checking empty condition
    if($brand_name=='' or $clothestype=='' or $price=='' or $quantity=='' or $description==''){
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    }
    else{
        // move uploaded image to images folder
        move_uploaded_file($temp_image,"./database_images/$clothes_image");
        
        //inserting data into database
        $insert_query="insert into `clothes` (brand_id, type, price, quantity, description, size, image) values ('$brand_name', '$clothestype', $price, $quantity, '$description', '$size', '$clothes_image')";
        $insert_query_result=mysqli_query($con,$insert_query);
        if($insert_query_result){
            move_uploaded_file($temp_image,"clothes_images/$clothes_image");
            echo "<script>alert('Clothes inserted successfully')</script>";
            echo "<script>window.open('insert_clothes.php','_self')</script>";
        }
        else{
            echo "<script>alert('Clothes not inserted')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Clothes-Admin</title>
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
                <li><a href="/store/about.php">Users</a></li>
                <li><a href="add_brand.php">Add Brands</a></li>
                <li>
                <li id="lg-bag"><a href="/store/cart.php"><i class="fas fa-shopping-bag"></i></a></li>
                </li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>


    <div class="form-container">
        <h1 class="form-heading">Add New Clothes</h1>
        <form action="" method="post" enctype="multipart/form-data" class="form">
            <div class="form-group">
                <label for="brandname">Select Brand Name</label>
                <select id="brandname" required="required" name="brand_name"style="height: auto; padding: 4px; background-color: transparent; width: 95%; border: none;  border-bottom: 1px solid #000000;
    border-radius: 5px 5px 0px 0px;">
                    <option>Select Brand</option>
                    <?php
                    $select_query = "select * from `brands`";
                    $select_query_result = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc ($select_query_result)) {
                        $brand_id = $row['brand_id'];
                        $brand_name = $row['name'];
                        echo "<option value='$brand_id'>$brand_name</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="clothestype">Enter Clothes Type</label>
                <input type="text" required="required"  id="clothestype" name="clothestype" placeholder="Enter Clothes Type" />
            </div>
            <div class="form-group">
                <label for="price">Enter Price</label>
                <input type="text" required="required"  id="price" name="price" placeholder="Enter Price" />
            </div>
            <div class="form-group">
                <label for="quantity">Enter Quantity</label>
                <input type="text" required="required"  id="quantity" name="quantity" placeholder="Enter Quantity" />
            </div>
            <div class="form-group">
                <label for="description">Description of the Cloth</label>
                <textarea id="description" required="required"  name="description" placeholder="Description of the Cloth"></textarea>
            </div>
            <div class="form-group">
                <label for="size">Sizes Available</label>
                <select id="size" required="required" name="size" style="height: auto; padding: 4px">
                    <option value="small">Small</option>
                    <option value="medium" active>Medium</option>
                    <option value="large">Large</option>
                    <option value="xl">XL</option>
                    <option value="xxl">XXL</option>
                </select>
            </div>
            <div class="form-group">
                <label for="clothes_image">Add Image</label>
                <input type="file" id="clothes_image" name="clothes_image" placeholder="Select an Image" />
            </div>

            <button type="submit" class="form-button" name="insert_clothes">Add</button>

            <button type="button" class="form-button" onclick="window.location.reload();">Clear</button>
        </form>
    </div>

    <script src="../script.js"></script>
</body>

</html>