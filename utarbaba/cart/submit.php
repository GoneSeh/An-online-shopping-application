<?php
    $orderId = "";
    $guestId = $_SESSION['guestId'];
    $tableNum = $_POST['tableNum'];
    $paymentInfo = $_POST['payMethod'];

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    if(!$conn)
        die("Connection Error".mysqli_connect_error());

    $query = "SELECT * FROM cart WHERE guestId = $guestId";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        // Insert a new order into the database
        $query = "INSERT INTO orders (guestId, tableNum, paymentInfo)
                        VALUES (?,?,?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sss", $guestId, $tableNum, $paymentInfo);
        
        if(mysqli_stmt_execute($stmt)){ // Retrieve the ID of the inserted order
            $orderId = mysqli_insert_id($conn);
            echo "<script>alert('Order {$orderId}: Success');</script>";
        }else{
            die("Error".mysqli_error($conn));
        }

        // Loop through the items in the cart
        while($row = mysqli_fetch_assoc($result)) {
            $itemId = $row['itemId'];
            $amount = $row['amount'];

            // Insert each item into the order_item table
            $query = "INSERT INTO order_item (orderId, itemId, amount)
                        VALUES (?,?,?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sss", $orderId, $itemId, $amount);
        
            if(mysqli_stmt_execute($stmt)){
                ; // Item successfully added to order
            }else{
                die("Error".mysqli_error($conn));
            }

        }
    }
    else
        echo "<script>alert('Cart is empty');</script>";

        // Delete items from the cart after they have been added to the order
    $query = "DELETE FROM cart WHERE guestId = ?";
    $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $guestId);
    if(mysqli_stmt_execute($stmt)){
        ;// Cart items successfully deleted
    }else{
        die("Error".mysqli_error($conn));
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>