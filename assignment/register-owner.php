<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Register Owner</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

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
        require_once('navigation.php');
        session_start();

        // If a session has not been set, redirect tp signup page (must have an account before registering a new owner)
        if(!isset($_SESSION['username'])) {
            echo "<script> alert('You must create an account first!') </script>";
            header('Location:signup.php');
        }
    ?>

    <div class="owner-dog-div">
        <div class="owner-dog-container">
            <div class="owner-dog-box">
                <div class="owner-dog-form-box">
                    <h3 class="owner-dog-text">Please fill in the owners details below</h3>
                    <form method="POST" action="">
                        <input class="owner-dog-input" type="text" name="name" placeholder="Full Name" required>

                        <input class="owner-dog-input" type="text" name="address" placeholder="Address" required>

                        <input class="owner-dog-input" type="text" name="email" placeholder="Email" required>

                        <input class="owner-dog-input" type="text" name="phone" placeholder="Phone" required>

                        <input class="owner-dog-button" type="submit" name="reg" value="Submit">
                    </form>
                </div>    
                <div class="circle-01"></div>
                <div class="circle-02"></div>
            </div>
        </div>
    </div>

        <?php
            if (isset($_POST['reg'])) {
                $name = $_POST['name'];
                // Used for 'register_dogs.php' to get the 'id' assigned to this new owner
                $_SESSION['name'] = $name;
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone_no = $_POST['phone'];

                $insert_owner = "INSERT INTO owners (name, address, email, phone) VALUES('$name', '$address', '$email', '$phone_no')";

                // Check for duplicte values to make sure a dog has not been registered twice
                $owner_duplicate = mysqli_query($conn, "SELECT * FROM owners WHERE name = '$name' 
                                                                             AND address = '$address' 
                                                                             AND email = '$email' 
                                                                             AND phone = '$phone_no';");

                // If there is a duplicate, display error message
                if (mysqli_num_rows($owner_duplicate) > 0) {
                    echo "<script> alert('Owner exists!') </script>";

                // If there are no duplicate value, we can run the query and then redirect to the 'register-dogs.php' page
                } else {
                    if (mysqli_query($conn, $insert_owner)) {
                        echo "<script> alert('Owner successfully registered!') </script>";
                        header('Location: register-dog.php');
                    }
                }
            }

            $conn->close();
        ?>
    
    <script src="app.js"></script>
</body>
</html>