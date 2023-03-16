<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>

    <!-- Favicon -->
    <link rel="icon" href="/assignment/images/dog.png" type="image/x-icon">

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
    <!-- Connecting to the database -->
    <?php 
        // Connecting to MYSQL 
        require_once('connection.php');

        // Including navbar
        require_once('navigation.php');

        session_start();
    ?>

    <form method="GET" action="">
        <input class="view-buttons" type="submit" name="dogs" value="Dogs">
        <input class="view-buttons" type="submit" name="owners" value="Owners">
        <input class="view-buttons" type="submit" name="events" value="Events">
        <input class="view-buttons" type="submit" name="competitions" value="Competitions">
        <input class="view-buttons" type="submit" name="judges" value="Judges">
        <input class="view-buttons" type="submit" name="dogs_and_owners" value="Dogs and Owners">
    </form>

    <!-- Dogs -->
    <?php 
        if(isset($_GET['dogs'])) {
            $view_query = "SELECT * FROM dogs";
            $view_result = $conn->query($view_query);

            echo "<table class='table-view'>";
            echo "<tr>";
                echo "<th>";
                    echo "ID";
                echo "</th>";
                echo "<th>";
                    echo "Name";
                echo "</th>";
                echo "<th>";
                    echo "Breed ID";
                echo "</th>";
                echo "<th>";
                    echo "Owner ID";
                echo "</th>";
            echo "</tr>";

            while($row = mysqli_fetch_array($view_result)) {
                echo "<tr>";
                    echo "<td>";
                        echo $row['id'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['name'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['breed_id'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['owner_id'];
                    echo "</td>";
                echo "</tr>";
            }

            echo "</table>";

        // Display all the owners and their information
        } else if(isset($_GET['owners'])) {
            $view_query = "SELECT * FROM owners";
            $view_result = $conn->query($view_query);

            echo "<table class='table-view'>";
            echo "<tr>";
                echo "<th>";
                    echo "ID";
                echo "</th>";
                echo "<th>";
                    echo "Name";
                echo "</th>";
                echo "<th>";
                    echo "Address";
                echo "</th>";
                echo "<th>";
                    echo "Email";
                echo "</th>";
                echo "<th>";
                    echo "Phone";
                echo "</th>";
            echo "</tr>";

            while($row = mysqli_fetch_array($view_result)) {
                echo "<tr>";
                    echo "<td>";
                        echo $row['id'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['name'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['address'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['email'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['phone'];
                    echo "</td>";
                echo "</tr>";
            }

            echo "</table>";

        // Display all the events and their information
        } else if(isset($_GET['events'])) {
            $view_query = "SELECT * FROM events";
            $view_result = $conn->query($view_query);

            echo "<table class='table-view'>";
            echo "<tr>";
                echo "<th>";
                    echo "ID";
                echo "</th>";
                echo "<th>";
                    echo "Description";
                echo "</th>";
            echo "</tr>";

            while($row = mysqli_fetch_array($view_result)) {
                echo "<tr>";
                    echo "<td>";
                        echo $row['id'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['description'];
                    echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
            
        // Display all the competitions and their information
        } else if(isset($_GET['competitions'])) {
            $view_query = "SELECT * FROM competitions";
            $view_result = $conn->query($view_query);

            echo "<table class='table-view'>";
            echo "<tr>";
                echo "<th>";
                    echo "ID";
                echo "</th>";
                echo "<th>";
                    echo "Day";
                echo "</th>";
                echo "<th>";
                    echo "AM or PM";
                echo "</th>";
                echo "<th>";
                    echo "Event ID";
                echo "</th>";
                echo "<th>";
                    echo "Chief Judge ID";
                echo "</th>";
            echo "</tr>";

            while($row = mysqli_fetch_array($view_result)) {
                echo "<tr>";
                    echo "<td>";
                        echo $row['id'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['day'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['amOrPm'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['event_id'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['chief_judge_id'];
                    echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        
        // Display all the judges and their information
        } else if(isset($_GET['judges'])) {
            $view_query = "SELECT * FROM judges";
            $view_result = $conn->query($view_query);

            echo "<table class='table-view'>";
            echo "<tr>";
                echo "<th>";
                    echo "ID";
                echo "</th>";
                echo "<th>";
                    echo "Name";
                echo "</th>";
                echo "<th>";
                    echo "Address";
                echo "</th>";
                echo "<th>";
                    echo "Email";
                echo "</th>";
                echo "<th>";
                    echo "Phone";
                echo "</th>";
            echo "</tr>";

            while($row = mysqli_fetch_array($view_result)) {
                echo "<tr>";
                    echo "<td>";
                        echo $row['id'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['name'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['address'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['email'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['phone'];
                    echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        
        // Display the dogs name and the owners email address and phone number
        } else if(isset($_GET['dogs_and_owners'])) {
            ?>

            <h2 class="dogs-and-owners-text">Click the owners name to display their details or their email address to send them an email!</h2>

            <!-- Form used for the 'owner-details.php' page -->
            <form method="GET" action="">
                <?php 
                    $dogs_query =
                    "SELECT d.name AS Dogs_Name, o.name AS Owners_Name, o.email AS Owners_Email, o.phone AS Owners_Phone
                    FROM dogs d
                    JOIN owners o on o.id = d.owner_id
                    ORDER BY d.id ASC";

                    $dogs_result = $conn->query($dogs_query);

                    echo "<table class='table-view'>";
                    echo "<tr>";
                        echo "<th>";
                            echo "Name";
                        echo "</th>";
                        echo "<th>";
                            echo "Owner";
                        echo "</th>";
                        echo "<th>";
                            echo "Email";
                        echo "</th>";
                    echo "</tr>";

                    while($row = mysqli_fetch_array($dogs_result)) {
                        echo "<tr>";
                            echo "<td>";
                                echo $row['Dogs_Name'];
                            echo "</td>";
                            echo "<td>";
                ?>

                            <a href="owner-details.php?owner=<?php echo $row['Owners_Name'];?>&email=<?php echo $row['Owners_Email'];?>&phone=<?php echo $row['Owners_Phone'];?>">
                                <?php echo $row['Owners_Name']; ?> 
                            </a>

                            <?php
                                echo "</td>";
                                echo "<td>";
                            ?>

                            <a href="mailto:<?php echo $row["Owners_Email"];?>?subject=Poppleton Dog Show">
                                <?php echo $row["Owners_Email"]; ?>
                            </a>

                            <?php
                                echo "</td>";
                                echo "</tr>";
                        }

                    echo "</table>";
                ?>  
            </form>
        <?php 
            }

            $conn->close();
        ?>

    <script src="app.js"></script>
</body>
</html>