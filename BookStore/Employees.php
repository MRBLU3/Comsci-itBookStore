<?php

include "ck_session.php";
if(!isSessionAction()){
    header("location: admin.php");
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
    <link rel="stylesheet" href="css/Employees.css">
    <link rel="icon" href="images/code.png">
    <title>Employees</title>
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
            <div class="cards">
            <div class="card">
                <div class="card-content">
                    <div class="number">68</div>
                    <div class="card-name">Employees</div>
                </div>
                <div class="icon-box">
                    <i class='fas fa-users'></i>
                </div>
            </div>
        </div>
        <div class="charts">
            <div class="chart doughnut-chart">
                <h2>Employees</h2>
                <div>
                    <canvas id="doughnut1"></canvas>
                </div>
            </div>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
        <script src="js/Employees.js"></script>
</body>
</html>