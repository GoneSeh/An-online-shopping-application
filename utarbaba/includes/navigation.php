<!DOCTYPE html>

<head>
<link rel="stylesheet" href="../style/includeStyle.css">
</head>

<header class="nav">
  <div class="header-border">
    <div class="webName">UTARBABA E-SHOPPING</div>
      <div class="nav">

        <form id='search' method='post' action ='../search/index.php'> <!-- Search form -->
            <input type="search_text" name='search' placeholder="Search your favourite items">
            <button type="search">Search</button>
        </form>

        <div class="cart"> <!-- Cart icon -->
          <button class="cartIcon" onclick="window.location.href='../cart/index.php'"></button>
          <span id="count">0</span>
        </div>

        <div class="dropdown"> <!-- log in or log out -->
          <button class="loginIcon"></button>
          <div class="dropdown-content">
            <?php 
              if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
              if(isset($_SESSION['email'])) {  // Check if user is logged in
            ?>
                <p><i>User:</i><br> <?php echo $_SESSION['email']; ?></p>
                <a href="../login/logout.php">Log Out</a>
            <?php } else { ?>
                <a href="../logIn/index.php">Log In</a>
            <?php } ?>
          </div>
        </div>

        <div class="dropdown"> <!-- Dropdown menu for navigation -->
          <button class="menuIcon"></button>
          <div class="dropdown-content">
            <a href="../homePage/index.php">Home</a>
            <a href="../menu/index.php">Shopping Menu</a>
            <a href="../contact/index.php">Contact Us!</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</header>

<?php
  $count = 0;

  if(isset($_SESSION['guestId'])) {
    $guestId = $_SESSION['guestId'];
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    if(!$conn)
      die("Connection Error".mysqli_connect_error());

    $query = "SELECT amount FROM cart WHERE guestId = $guestId";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0){ // Loop through the results and calculate the total count
      while($row = mysqli_fetch_assoc($result)) {
        $count += $row['amount'];
      }
    }

    // Display the count dynamically using JavaScript
    echo "
    <script>
      let count = document.getElementById('count');
      count.innerText = {$count};
    </script>
    ";
  }
?>