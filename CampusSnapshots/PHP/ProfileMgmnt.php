<?php
require 'connection.php';
require 'Searches.php';

session_start();
 $s = new Searches();
//if(ISSET($_SESSION['user']))

echo json_encode($s->getProfile($_POST['user']));
?>
