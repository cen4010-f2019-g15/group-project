<?php
require 'connection.php';

session_start();
if(!ISSET($_SESSION['UID'])){
    die("User Not Logged In");
}

$conn = connect();
if($_POST['type'] == 'report'){
    $addPost = $conn->prepare("INSERT INTO Posts 
VALUES (DEFAULT, ?, ?, DEFAULT, ?, DEFAULT, ?)");
    $addPost->bindParam(1, $_SESSION['UID']);
    $addPost->bindParam(2, $_POST['postID']);
    $addPost->bindParam(3, $_POST['type']);
    $addPost->bindParam(4, $_POST['commentText']);
    $addPost->execute();
    
    echo $addPost->errorCode();
}
else if($_POST['type'] == 'event'){
    $addPost = $conn->prepare("INSERT INTO Posts
VALUES (DEFAULT, ?, DEFAULT, ?, ?, DEFAULT, ?)");
    $addPost->bindParam(1, $_SESSION['UID']);
    $addPost->bindParam(2, $_POST['postID']);
    $addPost->bindParam(3, $_POST['type']);
    $addPost->bindParam(4, $_POST['commentText']);
    $addPost->execute();
    
    echo $addPost->errorCode();
}
else {
    die("Invalid comment Type: " . $_POST['type']);
}
?>