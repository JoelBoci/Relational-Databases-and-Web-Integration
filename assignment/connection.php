<?php
    session_start();
    // Login details 
    $servername = "localhost"; // "selene.hud.ac.uk"
    $username = "u2155356";
    $password = "JB12aug03jb";
    $dbname = "u2155356";

    // Creating the connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error);
    }
?>