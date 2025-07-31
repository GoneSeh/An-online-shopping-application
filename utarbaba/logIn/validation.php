<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
// Get the email and password from the login form

// Establish a connection to the database
$conn = new mysqli('localhost','root','chun8763','utarbaba_shopping');

// Check if the connection to the database was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare a SQL query to select the user with the provided email and password
$stmt = $conn->prepare("SELECT * FROM guests WHERE email = ? AND password = ? LIMIT 1");
$stmt->bind_param("ss", $email,$password);     // Bind the email and password parameters to the prepared statement
$stmt->execute();     // Execute the prepared statement
$result = $stmt->get_result();     // Get the result of the executed query
$id = "";    // Initialize a variable to store the user ID

    // If a user with matching login credentials is found
if ($result->num_rows == 1) {
  $row = mysqli_fetch_assoc($result); // Fetch the row from the result set

  // Store the user's info in a session variable
  $_SESSION['email'] = $row['email'];
  $_SESSION['isLoggedIn'] = true;
  $_SESSION['guestId'] = $row['guestId'];
  
  echo "<script>alert('Welcome, " . $email . "!');</script>"; // Display a welcome message using JavaScript alert


  // Redirect the user to the home page after a short delay
  header("Refresh:1; url=http://localhost/utarbaba/homePage/index.php");
}else {
  
  $_SESSION['isLoggedIn'] = false; //no match
  echo "<script>alert('Invalid username or password.'); window.location.href='http://localhost/utarbaba/logIn/index.php';</script>";
  //error message

}
// Close the prepared statement and database connection
$stmt->close(); 
$conn->close();
?>
