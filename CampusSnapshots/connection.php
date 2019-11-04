<?php

function connect(){
    try {
        $servername = "localhost";
        $username = "cen4010fal19_g15";
        $password = "VyC5SF6sut3Z2r4K";
        $conn = new PDO("mysql:host=$servername;dbname=cen4010fal19_g15", trim($username), trim($password));
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    return $conn;
}
?>