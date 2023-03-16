<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="design.css">
    <title>Navigation</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200&display=swap" rel="stylesheet">
</head>
<body>

    <?php
        require_once('connection.php');
        session_start(); 
    ?>
    
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar_container">
            <a href="index.php" id="navbar_logo">POPPLETON DOG SHOW</a>
            <div class="navbar_toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar_menu">
                <li class="navbar_item">
                    <a href="index.php" class="navbar_links">Home</a>
                </li>
                <li class="navbar_item" id="dropdown">
                    <a href="view.php" class="navbar_links">View</a>
                </li>
                <li class="navbar_item">
                    <a href="about.php" class="navbar_links">About</a>
                </li>

                <?php 
                    // If there is a session set, we can display a welcome message in the navbar displaying their username and the logout button
                    if(isset($_SESSION['username'])) : ?>
                        <p class="welcome-name"><?php echo 'Hello ' . $_SESSION['username']; ?> </p>
                        <a class="logout-button" href="logout.php">Logout</a>
                    
                    <!-- If there is not session set, we can display the register and login buttons-->
                    <?php else : ?>
                        <li class="navbar_btn">
                        <a href="signup.php" class="button">Register</a>
                        </li>
                        <li class="navbar_btn">
                            <a href="login.php" class="button">Login</a>
                        </li>
                    <?php endif; ?>
            </ul>
        </div>
    </nav>
</body>
</html>
