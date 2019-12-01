<?php
require 'connection.php';

session_start();
if(!ISSET($_SESSION['UID'])){
    die("User Not Logged In");
}

$conn = connect();
if($_POST['type'] == 'report'){
    $addPost = $conn->prepare("INSERT INTO Posts 
VALUES (DEFUALT, ?, ?, DEFAULT, ?, DEFAULT, ?)");
    $addPost->bindParam(1, $_SESSION['UID']);
    $addPost->bindParam(2, $_POST['PostID']);
    $addPost->bindParam(3, $_POST['type']);
    $addPost->bindParam(4, $_POST['CommentText']);
    
    echo $addPost->errorCode();
}
else if($_POST['type'] == 'event'){
    $addPost = $conn->prepare("INSERT INTO Posts
VALUES (DEFUALT, ?, DEFAULT, ?, ?, DEFAULT, ?)");
    $addPost->bindParam(1, $_SESSION['UID']);
    $addPost->bindParam(2, $_POST['PostID']);
    $addPost->bindParam(3, $_POST['type']);
    $addPost->bindParam(4, $_POST['CommentText']);
    
    echo $addPost->errorCode();
}

die("Invalid comment Type");
?>