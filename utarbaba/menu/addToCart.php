<?php
    // Check if the current page is 'index.php' and the user is not logged in
	if (basename($_SERVER['PHP_SELF']) == 'index.php') {
		if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
			
            echo "<script>
                    alert('Log in or sign up to get access.');
                    location.href ='../logIn/index.php';
                </script>";
			exit;
		}
	}

    // Retrieve guestId from session and itemId from POST data
    $guestId = $_SESSION['guestId'];
    $itemId = $_POST['itemId'];

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    if(!$conn)
        die("Connection Error".mysqli_connect_error());
    
    $query = "SELECT * FROM cart WHERE guestId = $guestId";

    $result = mysqli_query($conn, $query);

    $itemId = $_POST['itemId'];
    $found = false;

    // Check if there are items in the cart
    if(!empty($result)) {
        while($row = mysqli_fetch_assoc($result)) { // Loop
            if($found == false){
                if ($row['itemId'] == $itemId) { // Check if the current item in the loop matches the selected dish
                    $found = true;

                    // If the dish is already in the cart, update the quantity
                    $query = "UPDATE cart SET amount = ? 
                    WHERE guestId = ? AND itemId = ?";

                    $quantity = $row['amount'] + 1;

                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stmt, "sss",  $amount, $guestId, $itemId);
                }
            }
        }
    }

    if (!$found) { // If the dish is not found in the cart, insert a new record
        $query = "INSERT INTO cart (guestId, itemId, amount) VALUES (?,?,?)";
        $amount = 1;
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sss", $guestId, $itemId, $amount);
    }

    if(mysqli_stmt_execute($stmt)){
        echo "<script>alert('Add item: success');</script>";
    }else{
        die("Error".mysqli_error($conn));
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
?>