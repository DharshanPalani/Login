<?php require("login.class.php")?>
<?php 
    if (isset($_POST['submit'])) {
        $user = new LoginUser($_POST['username'], $_POST['password']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
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
<form action="" method="post">
        <h2>Login form</h2>
        <label>Username:</label>
        <input type="text" name="username">
        <br><br>
        <label>Password:</label>
        <input type="password" name="password">
        <br><br>

        <button type="submit" name="submit">Login</button>
        <p class="error"><?php echo @$user->error ?></p>
        <p class="success"><?php echo @$user->success ?></p>
    </form>
</body>
</html>