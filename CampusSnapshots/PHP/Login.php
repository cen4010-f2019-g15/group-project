<?php
require 'connection.php';

$f = $_POST["Username"];
$r = $_POST["Password"];

$conn = connect();

$data = trim($r);
$data = stripslashes($data);
$data = htmlspecialchars($data);

//$r = password_hash($r, PASSWORD_DEFAULT);

$login = $conn->prepare("SELECT UID, Password, Type FROM Person 
WHERE UserName = ? LIMIT 1");
$login->bindParam(1, $f);

$login->execute();
$login->setFetchMode(PDO::FETCH_ASSOC);
$result = $login->fetch();

if(password_verify($r, $result["Password"])){
    session_start();
    $_SESSION["user"] = $f;
    $_SESSION["UID"] = $result["UID"];
    if ($result["Type"] == 'admin') {
        $_SESSION["admin"] = $result["Type"] == 'admin';
    }
    
    $login = $conn->prepare("UPDATE Person SET Active = DEFAULT WHERE UID = ?");
    $login->bindParam(1, $_SESSION['UID']);
    $login->execute();
    
    echo json_encode(['result' => true]);
}
else{
    echo json_encode(['result' => false]);
}
?>

