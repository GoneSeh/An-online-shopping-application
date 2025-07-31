<?php
    $guestId = $_GET['guestId'];     // Retrieve guestId


    if ($guestId == 0) { // If the guest not logged in, redirect to the login page
        echo "<script>
                alert('Log in to get access');
                location.href ='../logIn/index.php';
            </script>";
        exit;
    }

    $selectionId = $_GET['itemId'];
    $amount = $_GET['amount'];

    $conn = new mysqli('localhost', 'root','chun8763', 'utarbaba_shopping');

    if ($conn -> connect_error){
        die("<script>alert('Error connecting to database');</script>");
    }

        // Check if the selected dish is already in the cart for the guest
    $sql = "SELECT * FROM cart WHERE guestId='$guestId' AND itemId='$selectionId'";
    $result = $conn -> query($sql);
    $successful = false;
    $no = 0;
    $row = $result->fetch_assoc();

    // If the dish is not in the cart, insert a new record
    if(is_null($row)){
        $insert = "INSERT INTO cart (guestId, itemId, amount) VALUES ('$guestId', '$selectionId', '$amount')";
     
        if($conn -> query($insert) === TRUE){
            $no = 1;
            $successful = true;
        }
    }
    else{ // If the dish is already in the cart, update the quantity
        $oriAmount = $row['amount'];
        $newAmount = $oriAmount + $amount;
        $input = "UPDATE cart SET amount ='$newAmount' WHERE guestId='$guestId' AND itemId='$selectionId'";
       
        if($conn->query($input) === TRUE){
            $no = 2;
            $successful = true;
        }
    }

    if($successful){
        echo "<script>
                alert('Add item: success');
                location.href = '../menu/index.php';
            </script>";
    }
    else{
        echo "<script>alert('Error');</script>";
    }

    $conn -> close();

?>