<?php
include 'connection.php';
include 'fileUpload.php';
session_start();

if(!isset($_SESSION['UID']))
    die("Not Logged In");

$conn = connect();
$login = $conn->prepare("INSERT INTO Reports VALUES (DEFAULT, ?, ?, ?, DEFAULT, ?, ?, ?)");

$login->bindParam(1, $_SESSION['UID']);
$login->bindParam(2, $_POST['Name']);

//$login->bindParam(3, $_POST['Image']);//given null on no picture

$login->bindParam(3, fileUpload('../Files/Reports/' . $_SESSION['UID'] . '/'));//given null on no picture

$login->bindParam(4, $_POST['Type']);
$login->bindParam(5, $_POST['Status']);
$login->bindParam(6, $_POST['Description']);

$login->execute();

echo 'New Event Created';
?>