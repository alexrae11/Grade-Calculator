<?php
  require "header.php";
?>

<main>
  <div class="wrapper-main">
    <section class="section-default">
      <h1>Welcome To The University Grading Calculator</h1>
      <?php
      if (!isset($_SESSION['id'])) {
        echo '<p class="login-status">Please login or signup to access the calculator</p>';
      }
      else if (isset($_SESSION['id'])) {
        echo '<p class="login-status">Please click the calculator to enter your marks</p>
        <div class="logo-container">
        <a class="calc-logo" href="calculator.php">
          <img src="img/calc.png" alt="calc-logo" style="width:20em; height:20em" class="center"></div>';
      }
      ?>
    </section>
</main>
