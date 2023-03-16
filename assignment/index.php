<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poppleton Dog Show</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assignment/images/dog.png">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="design.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/1e07aa6c51.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        // Connecting to MYSQL 
        require_once('connection.php');

        // Including navbar
        require_once('navigation.php');

        session_start();
    ?>

    <!-- Introduction text -->
    <?php 
        // Calculate number of owners
        $xx = mysqli_query($conn, "SELECT COUNT(id) FROM owners");
        $row_xx = mysqli_fetch_array($xx);

        $total_xx = $row_xx[0];

        // Calculating number of dogs
        $yy = mysqli_query($conn, "SELECT COUNT(DISTINCT(dog_id)) FROM entries");
        $row_yy = mysqli_fetch_array($yy);

        $total_yy = $row_yy[0];

        // Calculation number of events
        $zz = mysqli_query($conn, "SELECT COUNT(id) FROM events");
        $row_zz = mysqli_fetch_array($zz);

        $total_zz = $row_zz[0];

        echo "<h1 id='intro_text'><i class='fa-solid fa-dog'></i> Welcome to the Poppleton Dog Show! <i class='fa-solid fa-dog'></i>
            <br>This year $total_xx owners entered $total_yy dogs in $total_zz events.</h1>";
    ?>

    <!-- List for top 10 dogs -->

    <h3 id="top-ten-dogs-text">Top Ten Dogs This Year</h3>

    <?php 
        $dogs_query = 
        "SELECT d.name AS dog_name, b.name AS breed_name, ROUND(AVG(e.score), 1) AS avg_score
        FROM dogs d
        INNER JOIN entries e ON d.id = e.dog_id
        INNER JOIN breeds b ON d.breed_id = b.id
        GROUP BY d.name, d.breed_id
        HAVING COUNT(e.dog_id) > 1
        ORDER BY avg_score DESC
        LIMIT 10"
        ;

        $dogs_result = $conn -> query($dogs_query);
        
        // Creating the headers
        echo "<table class='top-ten-dogs'>";
            echo "<tr>";
                echo "<th>";
                    echo "Name";
                echo "</th>";
                echo "<th>";
                    echo "Breed";
                echo "</th>";
                echo "<th>";
                    echo "Average Score";
                echo "</th>";
            echo "</tr>";

        // Looping through and displaying the values in a table format
        while($row = mysqli_fetch_array($dogs_result)) {
            echo "<tr>";
                echo "<td>";
                    echo $row['dog_name'];
                echo "</td>";
                echo "<td>";
                    echo $row['breed_name'];
                echo "</td>";
                echo "<td>";
                    echo $row['avg_score'];
                echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    ?>

    <!-- Displays the top dog (dog with the highest average calculated from the table above) -->
    <h3 id="this-years-top-dog-text">This Years Top Dog</h3>

    <!-- Used to display the name below the photo -->
    <div class="polaroid">
        <img id="top-dog-photo" src="images/top-dog.jpg">
        <div class="photo-container">
            <p>Emily<p>
        </div>
    </div>

    <script src="app.js"></script>
</body>
</html>