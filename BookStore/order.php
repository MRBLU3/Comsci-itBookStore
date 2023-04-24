<?php

include "ck_session.php";
if(!isSessionAction()){
    header("location: admin.php");
}


?>
<?php 


require_once('conn.php');
$query = "select * from orderdb";
$result = mysqli_query($conn,$query);


// require_once 'conn.php';
// require_once 'functions.php';

// $result = display_data();

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `orderdb` WHERE id = '$delete_id'") or die('query failed');
    header('location: order.php');
 }
 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/boostrap.min.css">
    <link rel="stylesheet" href="css/message.css">
    <link rel="icon" href="images/code.png">
    <title>Order</title>
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
                        <i class="fas fa-dashboard "></i>
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
        <div class="row-mt-5">
        <div class="col">
        <div class="card-mt-5">
        <div class="card-header">
            <h2 class="display-6 text-center">Order</h2>
        </div>
        <div class="card-body">
        <table class="table-border" style="width: 100%">
        <tr>
            <td> -Name- </td>
            <td> -Email- </td>
            <td> -number- </td>
            <td> -How much order- </td>
            <td> -Order name- </td>
            <td> -Address- </td>
        </tr>
        <tr>
                <?php 
                  while($row = mysqli_fetch_assoc($result))
                  {
                ?>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['number']; ?></td>
                  <td><?php echo $row['quantity']; ?></td>
                  <td><?php echo $row['order_name']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><a href="order.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">Delete</a></td>  
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
</body>
</html>