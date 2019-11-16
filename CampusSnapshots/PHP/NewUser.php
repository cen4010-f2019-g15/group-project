<?php
include 'connection.php';

session_start();

$conn = connect();
$login = $conn->prepare("INSERT INTO Person VALUES (DEFAULT, ?, ?, DEFAULT, DEFAULT)");

$login->bindParam(1, $_POST['Name']);
$login->bindParam(2, $_POST['Password']);

$login->execute();

echo 'New Event Created';