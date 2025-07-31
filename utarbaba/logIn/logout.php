
<?php
session_start(); // Start the PHP session to allow session variables to be used
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session, effectively logging the user out
header("Location: ../homePage/index.php"); // Redirect the user to the home page
?>
