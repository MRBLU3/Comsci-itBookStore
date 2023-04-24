<?php
session_start();
include "conn.php";

$userName = $_POST['username'];
$passWord = $_POST['password'];


// # This is Anti sql injection
$userName = stripslashes($userName);
$passWord = stripslashes($passWord);
$userName = mysqli_real_escape_string($conn, $userName);
$passWord = mysqli_real_escape_string($conn, $passWord);


if (empty($userName)){
    header("location: admin.php?error=Username is required");
    exit();
}else if(empty($passWord)){
    header("location: admin.php?error=Password is required");
    exit();
}

$query = mysqli_query($conn, "SELECT * FROM demo_db1 WHERE `username`='$userName' AND `password`='$passWord'");
$count = mysqli_num_rows($query);

if($count > 0){
    $_SESSION['userSession'] = $userName;
    header ("location: dashboard.php");
}else{
    header("location: admin.php?error=incorrect username or password");
    exit();
}

?>