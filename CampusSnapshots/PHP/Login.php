<?php

require 'conneciton.php';

$f = $_POST["f"];
$r = $_POST["dp"];

$conn = connect();

$data = trim($r);
$data = stripslashes($data);
$data = htmlspecialchars($data);

$login = $conn->prepare("SELECT UID, Password FROM Person 
WHERE UserName = ? LIMIT 1");
$login->bindParam(1, $f);

$login->execute();
$login->setFetchMode(PDO::FETCH_ASSOC);
$result = $login->fetch();

if($data === $result["Password"]){
    session_start();
    $_SESSION["user"] = $f;
    $_SESSION["UID"] = $result["UID"];
    
    $login = $conn->prepare("UPDATE Person SET Active = DEFAULT WHERE UID = " + $_SESSION['UID']);
    
    $login->execute();
    
    echo "True";
}
else{
    echo "False";
}
?>
