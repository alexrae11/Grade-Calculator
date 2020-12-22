<?php
require "header.php";                                                                                        // includes the header on the main page
?>

<main>
  <div class="main-wrapper">
    <section class="section-default">
      <h1>Welcome To The University Grading Calculator</h1>
      <?php
      if (!isset($_SESSION['id'])) {                                                                         // you are required to log in to access the calculator
        echo '<p class="login-status">Please login or signup to access the calculator</p>';
      } else if (isset($_SESSION['id'])) {                                                                   // calculator image used as button to direct user to the calculator screen
        echo '<p class="login-status">Please click the calculator to enter your marks</p>
        <div class="logo-container">
        <a class="calc-logo" href="calculator.php">
          <img src="img/calc.png" alt="calc-logo" style="width:20em; height:20em" class="center"></div>';
      }
      ?>
    </section>
</main>
