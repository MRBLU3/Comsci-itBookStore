<?php

include "ck_session.php";
if(!isSessionAction()){
    header("location: admin.php");
}


?>

<?php
include 'conn.php';
if(isset($_POST['add_product'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploads/'.$image;
 
    $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');
 
    if(mysqli_num_rows($select_product_name) > 0){
       $message[] = 'product name already added';
    }else{
       $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$name', '$price', '$image')") or die('query failed');
 
       if($add_product_query){
          if($image_size > 2000000){
             $message[] = 'image size is too large';
          }else{
             move_uploaded_file($image_tmp_name, $image_folder);
             $message[] = 'product added successfully!';
          }
       }else{
          $message[] = 'product could not be added!';
       }
    }
 }
 
 if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    unlink('uploads/'.$fetch_delete_image['image']);
    mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
    header('location:products.php');
 }
 
 if(isset($_POST['update_product'])){
 
    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
 
    mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price' WHERE id = '$update_p_id'") or die('query failed');
 
    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = 'uploads/'.$update_image;
    $update_old_image = $_POST['update_old_image'];
 
    if(!empty($update_image)){
       if($update_image_size > 2000000){
          $message[] = 'image file size is too large';
       }else{
          mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
          move_uploaded_file($update_image_tmp_name, $update_folder);
          unlink('uploads/'.$update_old_image);
       }
    }
 
    header('location:products.php');
 
 }
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Products</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="css/product.css">
    <link rel="icon" href="images/code.png">
    
</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
            </div>
            <div class="search">
                <input type="text" name="search" placeholder="search here">
                <label for="search"><i class="fas fa-search"></i></label>
            </div>
            <i class="fas fa-bell"></i>
            <div class="user">
                <img src="images/me.jpeg" alt="">
            </div>
        </div>
        <div class="sidebar">
            <ul>
                <li>
                    <a href="dashboard.php">
                  <i class="fa fa-shopping-cart"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="products.php">
                    <i class="fa fa-shopping-cart"></i>
                        <div>Products</div>
                    </a>
                </li>
                <li>
                    <a href="Employees.php">
                        <i class="fas fa-users"></i>
                        <div>Employees</div>
                    </a>
                </li>
                <li>
                    <a href="order.php">
                        <i class="fas fa-chart-bar"></i>
                        <div>Order</div>
                    </a>
                </li>
                <li>
                    <a href="earning.php">
                        <i class="fas fa-hand-holding-usd"></i>
                        <div>Earnings</div>
                    </a>
                </li>
                <li>
                    <a href="message.php">
                        <i class="fa-solid fa-message"></i>
                        <div>Message</div>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fas fa-sign-out"></i>
                        <div>Logout</div>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="main">

        <section class="add-products">

<form action="" method="post" enctype="multipart/form-data">
   <h3>add product</h3>
   <input type="text" name="name" class="box" placeholder="enter product name" required>
   <input type="number" min="0" name="price" class="box" placeholder="enter product price" required>
   <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
   <input type="submit" value="add product" name="add_product" class="btn">
</form>

</section>

<!-- product CRUD section ends -->

<!-- show products  -->

<section class="show-products">

<div class="box-container">

   <?php
      $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_products = mysqli_fetch_assoc($select_products)){
   ?>
   <div class="box">
      <img src="uploads/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">₱<?php echo $fetch_products['price']; ?>/-</div>
      <a href="products.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
      <a href="products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
   </div>
   <?php
      }
   }else{
      echo '<center><h1 class="empty">no products added yet!</h1>';
   }
   ?>
</div>

</section>

<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
      <img src="uploads/<?php echo $fetch_update['image']; ?>" alt="">
      <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter product name">
      <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="enter product price">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="update" name="update_product" class="btn">
      <a href="products.php" class="option-btn">CANCEL</a>
   </form>
   <?php
            }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>

</div>
</div>
</body>

</html>
