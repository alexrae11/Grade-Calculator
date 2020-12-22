<?php
  require "header.php";                                                                                      // includes the header on the signup page
?>

    <main>
      <div class="main-wrapper">
        <section class="section-default">
          <h1>Signup</h1>
          <?php
          // The following if statements are to check if the user has made an error whilst signing up
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyfields") {
              echo '<p class="signuperror">Fill in all fields</p>';                                          // checks that all the required fields have been filled
            }
            else if ($_GET["error"] == "invaliduseridmail") {
              echo '<p class="signuperror">Invalid username and e-mail</p>';                                 // checks for a valid username and e-mail
            }
            else if ($_GET["error"] == "invaliduserid") {
              echo '<p class="signuperror">Invalid username</p>';                                            // checks for a valid username
            }
            else if ($_GET["error"] == "invalidmail") {
              echo '<p class="signuperror">Invalid e-mail</p>';                                              // checks for a valid e-mail
            }
            else if ($_GET["error"] == "notbrookesemail") {
              echo '<p class="signuperror">User must have a valid Oxford Brookes e-mail</p>';                // checks that the e-mail being used is from Oxford Brookes
            }
            else if ($_GET["error"] == "passwordcheck") {
              echo '<p class="signuperror">Your passwords do not match</p>';                                 // checks for matching passwords
            }
            else if ($_GET["error"] == "usertaken") {
              echo '<p class="signuperror">Username is already taken</p>';                                   // checks for an available username
            }
          }
          else if (isset($_GET["signup"])) {
            if ($_GET["signup"] == "success") {
              echo '<p class="signupsuccess">Signup Successful</p>';                                         // if all previous if statements are false, then signup is successful
            }
          }
          
          ?>
          <br>
          <!--This form is to check if the user has already submitted data-->
          <form class="form-signup" action="includes/signup.include.php" method="post">
            <?php
            if (!empty($_GET["userid"])) {
              echo '<input type="text" name="userid" placeholder="Username" value="'.$_GET["userid"].'">';   // checks for username
            }
            else {
              echo '<input type="text" name="userid" placeholder="Username">';
            }

            if (!empty($_GET["mail"])) {
              echo '<input type="text" name="mail" placeholder="E-mail" value="'.$_GET["mail"].'">';         // checks for e-mail
            }
            else {
              echo '<input type="text" name="mail" placeholder="E-mail">';
            }
            ?>
          
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password-repeat" placeholder="Repeat password">
            <button type="submit" name="signup-submit">Signup</button>
          </form>
        </section>
      </div>
    </main>
