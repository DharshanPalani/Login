<?php 

    session_start();
    if(!isset($_SESSION['user'])){
        header("location: login.php"); exit();
    }

    if (isset($_GET['logout'])) {
        unset($_SESSION['user']);
        header("location: login.php"); exit();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="topbar"></div>
      <div id="container">
          <div id="topcontent">
            <ul>
            <p class="mobile">Menu</p>
            <li><a href="index.html">Home</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Register</a></li>
              <li><a href="about.html">About</a></li>
            </ul>
          </div>
    <div class="content">
        <h2>Welcome <?php echo $_SESSION['user']; ?></h2>
        <h4>This is a home page for you <?php echo $_SESSION['user']; ?></h4>
        <main>
            Some content.....
        </main>
        <a href="?logout">Log out</a>
    </div>
</body>
</html>