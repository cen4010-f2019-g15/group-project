<?php
require 'connection.php';
require 'Searches.php';

session_start();
 $s = new Searches(connect());
//if(ISSET($_SESSION['user']))
$result = $s->getProfile($_SESSION['UID']);

echo json_encode($toJSON);
?>
