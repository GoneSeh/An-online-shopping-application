<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - UTARBABA E-SHOPPING SYSTEM</title>
    <link rel="stylesheet" href="../style/contactStyle.css">
</head>
<body>
    <?php require "../includes/env.php" ?>
    <?php include("../includes/header.php"); ?>
    <?php include("../includes/navigation.php"); ?> 
    <main class="contact-container">
        <h1>Contact Us</h1>
        <div class="contact-info">         <!-- Contact information -->
            <p>Email: utarbabashopping@gmail.com</p>
            <p>Phone: 03-123456789</p>
        </div>
        
        <div class="feedback-form"> <!-- Feedback form -->
            <h2>Send us your feedback</h2>
            <form action="submit_feedback.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </main>

    <script>
        // Check if the URL contains a success parameter
        const urlParams = new URLSearchParams(window.location.search);
        const success = urlParams.get('success');

        // If success parameter exists and is true, display a pop-up message
        if (success === 'true') {
            alert("Thank you for your feedback!");
        }
    </script>

    <?php include('../includes/footer.php'); ?>
</body>
</html>
