<?php
function Connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "surya123";
    $dbname = "data";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    return $conn;
}
?>
