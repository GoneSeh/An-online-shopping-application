<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="../homePageStyle/mystyle.css">
	<link rel="stylesheet" href="../style/cartStyle.css">
<?php
	session_start();

	if (basename($_SERVER['PHP_SELF']) == 'index.php') {
		if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
			header("Location: http://localhost/utarbaba/logIn/index.php");
			exit;
		}
	}
	$guestId = $_SESSION['guestId']; // Get the guest ID from the session
?>
</head>

<body>
	<br>
	<?php
		require '../includes/env.php';
		include("../includes/header.php");
		include("../includes/navigation.php");
	?>

<!-- Cart box section -->
	<div class="cartBox">
		<div class="pageTitle">
			<h3>List of Dishes in Cart</h3>
		</div>
		<?php include("cartList.php"); ?>
	</div>

	<!-- Payment box section -->
	<div class="payBox">
		<h3>Table Number & Payment Method</h3>
		<?php include("submitOrder.php"); ?>
	</div>

	<div style="clear:both; font-size:1px;"></div>
	<?php
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$task = $_POST['task'];

			if($task == 'Change Amount')
				include("updateAmount.php");
			
			else if ($task == 'submitOrder')
				include("submit.php");				
			
		}
	?>
	<?php include('../includes/footer.php'); ?>
</body>
