<?php
session_start();

if (!ISSET($_SESSION["UID"])){
    die("You are not logged in");
}

//Using isset get id from Report or Event Post or Comment
//Then set IDType with Each
//Build PDO request from set Feilds
//exectue then echo
//for debugging print PDO errorInfo

?>