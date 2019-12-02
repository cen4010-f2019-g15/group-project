<?php
include 'connection.php';

session_start();

$conn = connect();
$New_User = $conn->prepare("INSERT INTO Person VALUES 
(DEFAULT, ?, ?, ?, ?, ?, ?, DEFAULT, DEFAULT)"
    );

$New_User->bindParam(1, $_POST['username']);
$New_User->bindValue(2, password_hash($_POST['password'], PASSWORD_DEFAULT));
$New_User->bindParam(3, $_POST['email']);
$New_User->bindParam(4, $_POST['firstName']);
$New_User->bindParam(5, $_POST['lastName']);
$New_User->bindParam(6, $_POST['middleInitial']);

$New_User->execute();
if($New_User->errorCode() !== '00000')
    echo 'false';
else{
    echo 'true';
    $New_User = $conn->prepare("SELECT UID, UserName FROM Person WHERE UserName = ?");
    
    $New_User->bindParam(1, $_POST['username']);
    $New_User->execute();

    $result = $New_User->fetch();
    echo mkdir('../Files/Reports/' . $result['UID'] . $result['UserName']);
    echo mkdir('../Files/Events/' . $result['UID'] . $result['UserName']);
}