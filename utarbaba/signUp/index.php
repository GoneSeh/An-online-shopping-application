<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="../style/loginStyle.css">
</head>
<body>
	<?php require "../includes/env.php"; ?>
	<?php include("../includes/header.php"); ?>
    <?php include("../includes/navigation.php"); ?>
    
	<div class="signupBox"> <!-- Sign up form section -->
	<form class="signup" method="post" action="connDB.php">
		<h2>Sign up</h2>
		<!-- Input fields for name, email, and password -->
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>
		<input type="submit" value="Sign up"> <!-- Submit button to submit the sign up form -->
		<p>Have An UTARBABA Account?? <a href="../logIn/index.php"><br>Log in</a></p> <!-- Link to log in page for existing customers -->
	</form>
	</div>
    <br><br>

	<?php include('../includes/footer.php'); ?>

</body>
</html>
