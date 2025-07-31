<!DOCTYPE html>
<html>
    <head>
        <title>Item Details</title>
        <link rel="stylesheet" href="../style/itemDetails">
    </head>

    <body>
        <br>
        <?php require '../includes/env.php' ?>
        <?php include("../includes/header.php") ?>
        <?php include("../includes/navigation.php") ?>

       
        <?php
            if (basename($_SERVER['PHP_SELF']) == 'index.php') {
                if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
                    $loggedIn = false;
                }
                else{
                    $loggedIn = true;
                }
            }

            $selectionId = $_GET['id']; // Get the item ID from the URL
            
            $conn = new mysqli('localhost', 'root', 'chun8763', 'utarbaba_shopping');

            if ($conn -> connect_error){
                die("Unable to connect to server! Please check your connection");
            }

            $sql = "SELECT * FROM items WHERE itemId = '$selectionId'";
            $selectedDish = $conn->query($sql);
        
            $selectedDish = $selectedDish->fetch_assoc();
        ?>

        <!-- Display the item details -->
        <div class="itemDetails">
        <h2>About the items</h2>
       
        <div class="content">
            <table>
                <tr>
                    <td><img src="../images/itemIMG/<?php echo $selectedDish['itemPhoto']?>" 
                            alt="<?php echo $selectedDish['itemName']?>" ></td>
                    <td>
                        <ul >
                            <li><b>Name: </b><?php echo $selectedDish['itemName']?></li><br>
                            <li><b>Price: </b>$ <?php echo $selectedDish['itemPrice']?></li><br>
                            <li><b>Item Type: </b><?php echo $selectedDish['itemType']?></li><br>
                            <li><b>Description: </b><br><?php echo $selectedDish['itemDesc']?></li><br>
                            
                        </ul>
                        <br>
                        <div class="buttons"> <!-- Buttons to add to cart and go back -->
                            <button type="submit" onclick="getAmount()">Add to cart</button>
                            <button type="button" onclick="window.location.href='/utarbaba/menu/index.php'">Back</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div id="shadow"></div>             <!-- Shadow overlay and pop-up dialog for adding to cart -->
        <dialog class="form-popup" id="popUp">
            <form class="form-content" action="addToCart.php">
                <h3><?php echo $selectedDish['itemName']?></h3>

                <!-- Hidden input fields for guestId and itemId -->
                <input type="hidden" name="guestId" value="<?php if($loggedIn){echo $_SESSION['guestId'];}else{echo 0;}?>">
                <input type="hidden" name="itemId" value="<?php echo $selectionId?>">
                
                <label for="amount"><b>Enter Amount :</b></label>
                <input type="number" min="1" name="amount" value="">
                <br><br>
                
                <button type="submit">Add to cart</button>
                <button id="cancelButton" type="button" onclick="closePopUp()">Cancel</button>
                
            </form>
        </dialog>
        </div>

        <!-- JavaScript functions to control pop-up dialog -->
        <script>  
            function getAmount()
            {
                document.getElementById('shadow').style.display = 'block';
                document.getElementById('popUp').style.display = 'inline';
            }

            function closePopUp()
            {
                document.getElementById('shadow').style.display = 'none';
                document.getElementById('popUp').style.display = 'none';
            }

        </script>
            

    <?php include("../includes/footer.php") ?>

    </body>
</html>