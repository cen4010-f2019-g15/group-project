<?php
require 'connection.php';
require 'Searches';

session_start();

//if(ISSET($_SESSION['user']))

sanitize($_POST['user']);

echo json_encode(Searches.getProfile($_POST['user']));
?>
