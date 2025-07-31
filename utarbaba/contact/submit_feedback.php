<?php
    // Process the submitted feedback
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Redirect back to the contact page after submission
        header('Location: /utarbaba/contact/index.php?success=true');
        exit;
    } else {
        // If the form wasn't submitted, redirect back to the contact page
        header('Location: /utarbaba/contact/index.php');
        exit;
    }
?>
