


<?php
	$guestId = $_SESSION['guestId'];

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    if(!$conn)
        die("Connection Error".mysqli_connect_error());

        // SQL query to fetch cart items for the current guest
    $query = "SELECT cart.itemId, itemName, itemPrice, itemPrice, amount
            FROM items, cart
            WHERE guestId = $guestId AND items.itemId = cart.itemId";

    $result = mysqli_query($conn, $query);	
    $SELF = htmlspecialchars($_SERVER['PHP_SELF']); // Get the PHP_SELF value

    // Initialize sumPrice variable to calculate total price
    $sumPrice = 0;
    if(mysqli_num_rows($result)>0){
        echo "
        <form action='{$SELF}' method='POST' id='form-cart'>
        <table>";
        while($row = mysqli_fetch_assoc($result)) {
            $sumPrice += $row['itemPrice'] * $row['amount'];
            $amountDown = $row['amount'] - 1;
            $amountUp  = $row['amount'] + 1;
            echo "
                <tr>
                    <td><img src='../images/foodImg/{$row['itemPrice']}' width='70' height='70' style='border-radius: 6px;'></td>
                    <td>{$row['itemName']}</td>
                    <td>{$row['itemPrice']}</td>
                    <td><button class='qty-btn' onClick='editAmount({$row['itemId']}, $amountDown)'>-</button></td>
                    <td><div class='count'>{$row['amount']}</div></td>
                    <td><button class='qty-btn' onClick='editAmount({$row['itemId']}, $amountUp)'>+</button></td>
                </tr>
            ";
        }
        // Format the final price
        $finalPrice = number_format((float)$sumPrice, 2, '.', '');
        echo "
            <h3>Cart total: $ {$finalPrice}.</h3>
            </br>
        </table>
        <input type='hidden' name='update' id='update'>
        <input type='hidden' name='amount' id='amount'>
        <input type='hidden' name='task' value='Change Amount'>
        </form>";
    }
    else {
        echo "<h2> Your cart is empty</h2>";
    }
    mysqli_close($conn);
?>

<script>
	editAmount = (itemId, amount) => { // Function to edit amount in the cart
		const input1 = document.getElementById('update');
		input1.value = itemId;
		const input2 = document.getElementById('amount');
		input2.value = amount;
		document.getElementById('form-cart').submit();

	}
</script>