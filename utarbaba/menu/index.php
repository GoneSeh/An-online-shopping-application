<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menu</title>
	<link rel="stylesheet" href="../style/menu.css">
</head>
<body class="">
    <br>
	<?php
		require '../includes/env.php';
		include("../includes/header.php");
		include("../includes/navigation.php");
	?>
	
	<div class="container">
		<div class='pageTitle'> 
			<h1>ITEM MENU - Pick Your Items from UTARBABA E-SHOPPING now!</h1>
        </div>
        
        <?php 
            $self_url = htmlspecialchars($_SERVER['PHP_SELF']);
            $itemType = "";

            //buttons for different dish type
            echo"
            <div id='dishSection'>
                <form action='{$self_url}' method='POST'> 
                    <button type='submit' id ='itemType' name='itemType' value='all'>All</button>
                    <button type='submit' id ='itemType' name='itemType' value='shirts'>Shirts</button>
                    <button type='submit' id ='itemType' name='itemType' value='pants'>Pants</button>
                    <button type='submit' id ='itemType' name='itemType' value='fruit'>Fruit</button>
                </form>
            </div>
            ";

            $itemType = "all"; //all 25 items
            $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
            if(!$conn)
                    die("Connection Error".mysqli_connect_error());
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                if (isset($_POST['itemType'])) {
                    $itemType = $_POST['itemType'];
                }
                else if (isset($_POST['task']) && $_POST['task'] == 'addItem') {
                    include("addToCart.php");
                    echo "<script>location.href = 'index.php'</script>";
                }
            }    
            if($itemType != 'all'){
                $query = "SELECT * FROM items WHERE itemType='$itemType' ORDER BY itemId ASC";
            }
            else if(!empty($_GET['search']))
            { 
                $itemType = $_GET['search'];
                $query = "SELECT * FROM items WHERE itemName LIKE '%$itemType%'";
                echo "<br><b>Showing result for = '" . $itemType . "' <b>"; 
            }
            else{
                $query = "SELECT * FROM items";
            }
            
            $result = mysqli_query($conn, $query);
            mysqli_close($conn);

             // Display menu items
            if(mysqli_num_rows($result)>0){
                    
                echo "<form action='{$self_url}' method='POST' class='form-menu' id='form-menu'>
                    <div class='list'>
                ";

                while($item = mysqli_fetch_assoc($result)) { 
                    echo " 
                        <div class='item'>
                        <a class='link' href='../itemDetails/index.php?id=".$item['itemId']."'>
                            <img src='../images/itemIMG/{$item['itemPhoto']}'>
                            <div class='title'>{$item['itemName']}</div>
                            <div class='price'>$ {$item['itemPrice']}</div>
                        </a>
                        <button type='submit' id='Add' onClick='submitForm({$item['itemId']})'>Add to Cart</button>
                        </div>
                    ";
                }
                echo "
                    <input type='hidden' name='itemId' id='itemId'>
                    <input type='hidden' name='task' value='addItem'>
                    </div></form>";
            }

        ?>
            <br><br>
	</div>	

    
    <script>
    submitForm = (id) => {
        const input = document.getElementById('itemId');
        input.value = id;

        document.getElementById('form-menu').submit();
    }

    </script>
    <?php include('../includes/footer.php');?>
</body>