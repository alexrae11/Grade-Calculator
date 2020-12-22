<?php
if (isset($_POST['login-submit'])) {                                                                         // checks to make sure the user accessed the page using the login submit button

  require 'database.include.php';                                                                            // allows for connection to the MySQL database

  // data from the signup form is declared
  $mailuserid = $_POST['mailuserid'];
  $password = $_POST['password'];

  // the following script checks for any errors made by the user when logging in
  if (empty($mailuserid) || empty($password)) {                                                              // checks that all the required fields have been filled
    header("Location: ../index.php?error=emptyfields" . $mailuserid);
    exit();
  } else {
    // the password the user typed in is dehashed and checked to see if it matches the username the user entered
    $sql = "SELECT * FROM users WHERE useridUsers=? OR emailUsers=?;";                                       // inserts future values into the database
    $statement = mysqli_stmt_init($connection);                                                              // a new statement is initialized from database.include.php
    if (!mysqli_stmt_prepare($statement, $sql)) {                                                            // the SQL statement is prepared and checked for errors
      header("Location: ../index.php?error=sqlerror");                                                       // if there are errors the user is sent back to the main page
      exit();
    } else {
      mysqli_stmt_bind_param($statement, "ss", $mailuserid, $mailuserid);                                    // the variables are bound to the statement as parameters
      mysqli_stmt_execute($statement);                                                                       // the bound statement is executed and sent to the database
      $result = mysqli_stmt_get_result($statement);                                                          // the result is initialized from the statement
      if ($row = mysqli_fetch_assoc($result)) {                                                              // the result is stored into a variable
        $passwordCheck = check_password($password, $row['passwordUsers']);                                   // the password inputted by the user is checked against the password in the database, the result is returned as a boolean
        if ($passwordCheck == false) {                                                                       // an error message is produced if the two passwords do not match
          header("Location: ../index.php?error=wrongpassword");                                              // if there are errors when logging in the user is redirected to the main page and the error is indicated in the header
          exit();
        } else if ($passwordCheck == true) {                                                                 // if the passwords do match then the next statement is executed

          // create a session and session variables using information from the database to let the website know that the user is logged in
          session_start();
          $_SESSION['id'] = $row['idUsers'];
          $_SESSION['userid'] = $row['useridUsers'];
          $_SESSION['email'] = $row['emailUsers'];
          
          header("Location: ../index.php?login=success");                                                    // as the user is now correctly logged in they can be redirected to the main page
          exit();
        }
      } else {
        header("Location: ../index.php?login=wronguseridpassword");                                          // if there are errors when logging in the user is redirected to the main page and the error is indicated in the header
        exit();
      }
    }
  }
  mysqli_stmt_close($statement);                                                                             // closes the prepared statement
  mysqli_close($connection);                                                                                 // closes the connection to the MySQL database
} else {
  header("Location: ../signup.php");                                                                         // if the user tries to access the site incorrectly they are sent back to the signup page
  exit();
}
