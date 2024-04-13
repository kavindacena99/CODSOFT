<?php
    //echo "Hi";

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "blog";

    $connection = new mysqli($host,$username,$password,$database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>