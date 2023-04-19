<?php
include "ck_session.php";
if(isSessionAction()){
  header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Admin Login</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="images/code.png">
</head>
<body>

  <div class="container">
    <div class="myform">
    <a href="index.php"><button type="submit"><i class="fas fa-sign-out"></i>LOGOUT</button></a>
      <form action="auth.php" method="post">
        <h2>ADMIN LOGIN</h2>
        <?php if(isset($_GET['error'])) { ?>
          <p class="error"> <?php echo $_GET['error']; ?></p>
        <?php } ?>

        <input type="text" name="username" placeholder="Admin Name">
        <input type="password" name="password" placeholder="Password">
       <button type="submit">LOGIN</button>
      </form>
    </div>
    <div class="image">
      <img src="images/geek.png">
    </div>
  </div>

</body>
</html>