<?php

require 'conneciton.php';

$f = $_POST["username"];
$r = $_POST["password"];

$conn = connect();

$data = trim($r);
$data = stripslashes($data);
$data = htmlspecialchars($data);

$login = $conn->prepare("SELECT Password FROM Person 
where UserName = ?");
$login->bindParam(1, $f);

$login->execute();
$login->setFetchMode(PDO::FETCH_COLUMN);
$result = $login->fetchAll();

if($data === $result[0]){
    session_start();
    $_SESSION["user"] = $f;
    echo "True";
}
else{
    echo "False";
}
?>
