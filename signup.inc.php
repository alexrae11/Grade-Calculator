<?php
if (isset($_POST['signup-submit'])) {                                                                        // checks to make sure the user accessed the page using the login submit button

  require 'database.include.php';                                                                            // allows for connection to the MySQL database

  // data from the signup form is declared
  $username = $_POST['userid'];
  $email = $_POST['mail'];
  $password = $_POST['password'];
  $passwordRepeat = $_POST['password-repeat'];

  // the following script checks for any errors made by the user when signing up
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {                     // checks for empty inputs
    header("Location: ../signup.php?error=emptyfields&userid=" . $username . "&mail=" . $email);
    exit();
  } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {     // checks for an invalid username and invalid e-mail
    header("Location: ../signup.php?error=invaliduseridmail");
    exit();
  } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {                                                   // checks for an invalid username
    header("Location: ../signup.php?error=invaliduserid&mail=" . $email);
    exit();
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {                                                   // checks for an invalid email
    header("Location: ../signup.php?error=invalidmail&userid=" . $username);
    exit();
  } else if (empty(preg_match("/@brookes.ac.uk$/", $email))) {                                               // checks that the e-mail being used is from Oxford Brookes
    header("Location: ../signup.php?error=invalidmail&userid=" . $username);
    exit();
  } else if ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordcheck&userid=" . $username . "&mail=" . $email);           // checks if the passwords do not match
    exit();
  } else {
    $sql = "SELECT useridUsers FROM users WHERE useridUsers=?";                                              // a statement that checks the database for identical usernames
    $statement = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($statement, $sql)) {                                                            // checks if there are any errors in the statement
      header("Location: ../signup.php?error=sqlerror");                                                      // if there are errors the user is redirected to the signup page
      exit();
    } else {
      mysqli_stmt_bind_param($statement, "s", $username);                                                    // the variables are bound to the statement as parameters
      mysqli_stmt_execute($statement);                                                                       // the bound statement is executed and sent to the database
      mysqli_stmt_store_result($statement);                                                                  // the result from the statement is stored in the database
      $resultCount = mysqli_stmt_num_rows($statement);                                                       // returns a number of results, indicating if the username exists
      mysqli_stmt_close($statement);                                                                         // closes the statement
      if ($resultCount > 0) {                                                                                // checks if the username is taken
        header("Location: ../signup.php?error=usernametaken&mail=" . $email);                                // if the username is taken the user is redirected to the signup page
        exit();
      } else {
        $sql = "INSERT INTO users (useridUsers, emailUsers, passwordUsers) VALUES (?, ?, ?)";                // inserts future values into the database
        $statement = mysqli_stmt_init($connection);                                                          // a new statement is initialized from database.include.php  
        if (!mysqli_stmt_prepare($statement, $sql)) {                                                        // the SQL statement is prepared and checked for errors
          header("Location: ../signup.php?error=sqlerror");                                                  // if there are errors the user is sent back to the signup page
          exit();
        } else {
          $hashedpassword = password_hash($password, PASSWORD_DEFAULT);                                      // passwords are hashed 
          mysqli_stmt_bind_param($statement, "sss", $username, $email, $hashedpassword);                     // the variables are bound to the statement as parameters
          mysqli_stmt_execute($statement);                                                                   // the bound statement is executed and sent to the database
          header("Location: ../signup.php?signup=success");                                                  // user is now signed up
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($statement);                                                                             // closes the prepared statement
  mysqli_close($connection);                                                                                 // closes the connection to the MySQL database
} else {
  header("Location: ../signup.php");                                                                         // if the user tries to access the site incorrectly they are sent back to the signup page
  exit();
}
