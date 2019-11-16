<?php
include 'connection.php';


session_start();

chdir('../Files/Events/');
if(!file_exists($_SESSION['UID']))
    mkdir($_SESSION['UID']);
    
if(!chdir($_SESSION['UID']))
    die("Error changing Directory");

$conn = connect();
$login = $conn->prepare("INSERT INTO Reports VALUES (DEFAULT, ?, ?, ?, DEFAULT, ?, ?, ?)");

$login->bindParam(1, $_SESSION['UID']);
$login->bindParam(2, $_POST['Name']);

//$login->bindParam(3, $_POST['Image']);//given null on no picture
include 'fileUpload.php';
$login->bindParam(3, $_COOKIE['CurrentFile']);//given null on no picture

$login->bindParam(4, $_POST['Type']);
$login->bindParam(5, $_POST['Status']);
$login->bindParam(6, $_POST['Description']);

$login->execute();


echo 'New Event Created';
?>