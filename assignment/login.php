<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assignment/images/dog.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="design.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Login form -->
    <div class="container">
        <div class="box">
            <div class="form-box">
                <form name="signup-form" method="POST" action="">
                    <h3 class="signup-text">Login</h3>
                    <input class="signup-input" type="text" name="username" placeholder="Username" required>
                    <input class="signup-input" type="password" name="password" placeholder="Password" required>
                    <input class="signup-button" type="submit" name="login" value="Login">
                </form>
                <a class="signup-button register-text" href="signup.php">Register</a>
            </div>
            <div class="circle-01"></div>
            <div class="circle-02"></div>
        </div>
    </div>

    <?php
        require_once('connection.php'); 

        session_start();
        
        if(isset($_POST['login'])) {
            $user = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            // Encrypted password
            $clean_pw = crypt(md5($password), md5($password));

            // Query to check if the user exists;
            // Need to match the password entered which will be encypted with the encrytped password from Selene
            $query = "SELECT username FROM Users WHERE username = '$user' AND password = '$clean_pw';";

            $results = $conn->query($query);

            $count = $results -> num_rows;

            // If it exists
            if($count == 1) {
                $_SESSION['username'] = $user;
                
                echo "<script> alert('Welcome $user!')</script>";
                header('Location:index.php');
                die();
            // Does not exist
            } else {
                echo "<script> alert('Invalid username or password')</script>";
            }
        }

        $conn -> close();
    ?>
</body>
</html>