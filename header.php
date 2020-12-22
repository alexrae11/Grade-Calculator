<?php
session_start();                                                                                             // a session is started to enable information to be stored as a session
require "includes/database.include.php";                                                                     // allows for connection to the MySQL database              
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="description" content="This is an example">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
    <!--This header is used to include a login form, other features such as a navigation bar can be implemented in the future if needed-->
    <nav class="header-main">
      <a class="header-logo" href="index.php">
        <img src="img/brookes (2).png" alt="logo">
      </a>
      <div class="header-login">
        <!--This login form lets the user sign in from the header-->
        <?php
        if (!isset($_SESSION['id'])) {                                                                       // when not logged in, a login form and signup button appears
          echo '<form action="includes/login.include.php" method="post">
            <input type="text" name="mailuserid" placeholder="E-mail/Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
          </form>
          <a href="signup.php" class="header-signup">Signup</a>';
        } else if (isset($_SESSION['id'])) {                                                                 // when logged in, the login form and signup button are replaced with a logout button
          echo '<form action="includes/logout.include.php" method="post">
            <input type="text" name="mailuserid" placeholder="E-mail/Username" hidden= "hidden">
            <input type="password" name="password" placeholder="Password" hidden="hidden">
            <button type="submit" name="logout-submit">Logout</button>
          </form>';
        }
        ?>
      </div>
    </nav>
  </header>
</body>

</html>
