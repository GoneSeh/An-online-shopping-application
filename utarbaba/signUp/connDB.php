<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', 'chun8763', 'utarbaba_shopping');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO guests (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            echo "<script>
                alert('Registration success. Welcome!');
                window.location.href = 'http://localhost/utarbaba/logIn/index.php';
            </script>";
        } else {
            echo "<script>alert('Registration failed. Please try again.');</script>";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
