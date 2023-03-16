<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

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
    <div class="container">
        <div class="box">
            <div class="form-box">
                <form name="signup-form" method="POST" action="">
                    <h3 class="signup-text">Sign up</h3>
                    <input class="signup-input" type="text" name="name" placeholder="Full Name" required>

                    <input class="signup-input" type="text" name="username" placeholder="Username" required>

                    <input class="signup-input" type="text" name="email" placeholder="E-mail" required>

                    <input class="signup-input" type="password" name="password" placeholder="Password" required>

                    <input class="signup-input" type="password" name="conf_pass" placeholder="Confirm Password" required>

                    <input class="signup-button" type="submit" name="create" value="Register">
                </form>
                <a class="signup-button login-text" href="login.php">Login</a>
            </div>
            <div class="circle-01"></div>
            <div class="circle-02"></div>
        </div>
    </div>

    <?php 
        require_once('connection.php'); 
        session_start();

        if(isset($_POST['create'])) {
            // Assign values entered in form to these variable and escape special characters
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $user = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $conf_pass = mysqli_real_escape_string($conn, $_POST['conf_pass']);

            // Encrypted password
            $clean_pw = crypt(md5($password), md5($password));

            // Checking for duplicates
            $user_duplicate = mysqli_query($conn, "SELECT * FROM Users WHERE username = '$user';");
            $email_duplicate = mysqli_query($conn, "SELECT * FROM Users WHERE email = '$email';");

            // Check for username or email duplicates and if there are any, display error message
            if(mysqli_num_rows($user_duplicate) > 0 || mysqli_num_rows($email_duplicate)) {
                echo "<script> alert('That user already exists') </script>";

            } else {
                // Check if email in correct format
                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // Check that the password and confirm passwords entered match
                    if($password == $conf_pass) {
                        // Insert the user into the table
                        $query = mysqli_query($conn, "INSERT INTO Users (name, username, email, password) VALUES ('$name', '$user', '$email', '$clean_pw')");
                        
                        echo "<script> alert('Registration Successful') </script>";
                        // Redirect to login page
                        header('Location: login.php');

                    // If passwords entered do not match
                    } else {
                        echo "<script> alert('Passwords do not match') </script>";
                    }
                // If email entered is not in the correct format
               } else {
                    echo "<script> alert('Not correct format for an email') </script>";
                }
            }
        }

        $conn -> close();
    ?>
</body>

</html>