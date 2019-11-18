<?php
include 'connection.php';

session_start();

$conn = connect();
$login = $conn->prepare("INSERT INTO Person VALUES 
(DEFAULT, ?, ?, ?, ?, ?, ?, DEFAULT, DEFAULT)"
    );

$login->bindParam(1, $_POST['username']);
$login->bindParam(2, password_hash($_POST['password'], PASSWORD_DEFAULT));
$login->bindParam(3, $_POST['email']);
$login->bindParam(4, $_POST['firstName']);
$login->bindParam(5, $_POST['lastName']);
$login->bindParam(6, $_POST['middleInitial']);

$login->execute();
if($login->errorCode() !== '00000')
    echo 'false';
else
    echo 'true';