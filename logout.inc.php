<!--creates and deletes the session when the user logs out-->
<?php
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");
?>
