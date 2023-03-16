<?php
    session_start();
    
    echo "<h1>Logged Out Successfully</h1>";

    header('Location:index.php');

    session_destroy();
?>