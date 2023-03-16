<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Register Dog</title>
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
    ?>

    <div class="owner-dog-div">
        <div class="owner-dog-container">
            <div class="owner-dog-box"> 
                <div class="owner-dog-form-box">
                    <h3 class="owner-dog-text">Please fill in your dogs details below</h3>
                    <form method="POST" action="">
                        <input class="owner-dog-input" type="text" name="dname" placeholder="Name" required>

                        <input class="owner-dog-input" type="text" name="breedid" placeholder="Breed ID" required>

                        <input class="owner-dog-button" type="submit" name="sub" value="Submit">
                    </form>
                </div>
                <div class="circle-01"></div>
                <div class="circle-02"></div>
            </div>        
        </div>
    </div>
        
    <?php
        if (isset($_POST['sub'])) {
            // Name assigned from 'register-owner.php', name assigned to SESSION
            $name = $_SESSION['name'];

            // Query used to get the 'id' for the name register in the 'register-owner.php' file
            $owner_id = mysqli_query($conn, "SELECT id FROM owners WHERE name = '$name'");
            $row = mysqli_fetch_row($owner_id);

            $dogs_name = $_POST['dname'];
            $breed_id = $_POST['breedid'];

            $insert_dog = "INSERT INTO dogs (name, breed_id, owner_id) VALUES('$dogs_name', '$breed_id', '$row[0]');";

            // Check for duplicte values to make sure a dog has not been registered twice
            $dog_duplicate = mysqli_query($conn, "SELECT * FROM dogs WHERE name = '$dogs_name' AND breed_id = '$breed_id' AND owner_id = '$row[0]'");

            // If there is a duplicate, display error message
            if (mysqli_num_rows($dog_duplicate) > 0) {
                echo "<script> alert('Dog exists!') </script>";

            // If there are no duplicate value, we can run the query and then redirect to the home page
            } else {
                if (mysqli_query($conn, $insert_dog)) {
                    echo "<script> alert('Dog successfully registered!') </script>";
                    header('Location: index.php');
                }
            }
        }

        $conn->close();
    ?>
    <script src="app.js"></script>
</body>
</html>