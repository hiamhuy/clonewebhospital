<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "hospital";

    if(!$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName))
    {
        die("Failed to connect !");
    }
?>