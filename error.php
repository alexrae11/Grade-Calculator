<?php
  require "header.php";
?>

<main>
  <div class="wrapper-main">
    <section class="section-default">
      <h1>Welcome To The University Grading Calculator</h1>
      <?php
      if (!isset($_SESSION['id'])) {
        echo '<p class="login-status">Please Login or Signup</p>';
      }
      else if (isset($_SESSION['id'])) {
        echo '<p class="login-status">You have logged in successfully</p>';
      }
      ?>
    </section>
</main>
