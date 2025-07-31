<?php
session_start();     // Start the PHP session to allow session variables to be used

// Check if the 'email' session variable is set, meaning the user is already logged in
if(isset($_SESSION['email'])){
    header("Location:../homePage/index.php"); // Redirect the user to the home page if they are already logged in
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
  <link rel="stylesheet" href="../style/loginStyle.css">
</head>

<body>
  <?php require "../includes/env.php"; ?> 
	<?php include("../includes/header.php"); ?> 
  <?php include("../includes/navigation.php"); ?>

	<div class="loginBox"> <!--Log in Form-->
    <form class="login" method="post" action="validation.php">
      <h2>Login</h2>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br><br>
      <input type="submit" value="Login">
      <br><br>
      <p>New to E-SHOPPING? <a href="../signUp/index.php"><br>Sign up</a></p> <!--Redirect user to sign up-->
    </form>
  </div>


  <?php include('../includes/footer.php'); ?>
    
</body>
</html>
