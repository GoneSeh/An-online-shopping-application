<?php
	$guestId = $_SESSION['guestId'];

    // Get the updated dish ID and amount from the POST request
    $itemId = $_POST['update'];
    $amount = $_POST['amount'];
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    if(!$conn)
        die("Connection Error".mysqli_connect_error());

    $query = "SELECT * FROM cart WHERE guestId = $guestId";

    $result = mysqli_query($conn, $query);
     
    // Loop through the cart items
    while($row = mysqli_fetch_assoc($result)) {

        // If the updated amount is 0, delete the item from the cart
        if ($amount == 0) {
            $query = "DELETE FROM cart WHERE guestId = ? AND itemId = ?";

            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "ss", $guestId, $itemId);
        }

        // Otherwise, update the amount of the item in the cart
        else {
            $query = "UPDATE cart SET amount = ? WHERE guestId = ? AND itemId = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sss", $amount, $guestId, $itemId);
        }

        if(mysqli_stmt_execute($stmt)){ // If successful, do nothing
            ;
        }else{
            die("Change Amount Error".mysqli_error($conn));
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn); 
?>