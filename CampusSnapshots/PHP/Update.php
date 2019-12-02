<?php
require 'connection.php';

session_start();

if (!ISSET($_SESSION["UID"])){
    die("You are not logged in");
}

$SQL_str = 'UPDATE ';
$values = array();
$IDType = null;
//Using isset get id from Report or Event Post or Comment
//Then set IDType with Each
if($_POST['type'] == 'report'){
    $SQL_str .= 'Reports SET ';
    $IDType = 'RID ';
    if(ISSET($_FILES['fileToUpload'])){
        $SQL_str .= 'Images = ? ';
        array_push($values, fileUpload('../Files/Reports/' . $_SESSION['UID'] . '/'));
    }
    /*    
    if(ISSET($_POST['type'])){
        $SQL_str .= 'Type = ? ';
        array_push($values, $_POST['type']);
    }
    */
        
    if(ISSET($_POST['Status'])){
        $SQL_str .= 'Status = ? ';
        array_push($values, $_POST['Status']);
    }

}
else if($_POST['type'] == 'event'){

    //$login->bindParam(3, $_POST['Image']);//given null on no picture

    $SQL_str .= 'Events SET';
    $IDType = 'EID';
    if(ISSET($_FILES['fileToUpload'])){
        $SQL_str .= 'Images = ?';
        array_push($values, fileUpload('../Files/Events/' . $_SESSION['UID'] . '/'));
    }

    if(ISSET($_POST['startDate'])){
        $SQL_str .= 'startDate = ?';
        array_push($values, $_POST['startDate']);
    }
        
    if(ISSET($_POST['endDate'])){
        $SQL_str .= 'endDate = ?';
        array_push($values, $_POST['endDate']);
    }
}
else
    die("error");

if(ISSET($_POST['Name'])){
    $SQL_str .= 'Name = ? ';
    array_push($values, $_POST['Name']);
}

if(ISSET($_POST['Description'])){
    $SQL_str .= 'Description = ? ';
    array_push($values, $_POST['Description']);
}

$SQL_str .= 'WHERE ' . $IDType . '= ' . $_POST['PostID'];

$conn = connect();
$Update = $conn->prepare($SQL_str);

//Build PDO request from set Feilds
for($i = 1; $i <= sizeof($values); $i++)
    $Update->bindParam($i, $values[$i-1]);

$Update->execute();


//exectue then echo
//for debugging print PDO errorInfo
echo $Update->errorCode();
?>