<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Details</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assignment/images/dog.png">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="design.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200&display=swap" rel="stylesheet">
</head>
<body>

    <?php
        require_once('connection.php');
        include('navigation.php');
        session_start();
    ?>

    <!-- Image API from unsplash, generates a random photo -->
    <img alt="owner photo" src="https://source.unsplash.com/1080x1920/?portrait" id="unsplash-image"><br>

    <div style="margin: 10px 0 0 15px; 
                font-size: 20px;">
            <?php

                // Getting the values from the last while loop in view.php which assigns the values to the GET method
                echo "<h2 style='margin-left: -3px;'>Owner Details</h2>";
                $owners_name = $_GET['owner'];
                $owners_email = $_GET['email'];
                $owners_phone = $_GET['phone'];

                echo "Name: " . $owners_name;
            ?>

            <!-- Opening email application when email address is clicked --> 
            <a id="owner-details-email" href="mailto:<?php echo $owners_email; ?>?subject=Poppleton Dog Show"> 
                <?php echo "<br>Email: " . $owners_email; ?>
            </a>

            <?php 
                // Displayed next to the email link
                echo " (Click to email)";
        
                echo "<br>Telephone Number: " . $owners_phone;

                $conn->close();
            ?>
    </div>
        
    <script src="app.js"></script>
</body>
</html>