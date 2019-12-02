<?php 
require 'connection.php';
require 'Searches.php';

$s = new Searches(connect());
$ID = $_POST['id'];
$Posts = $s->getReportComments($ID);

echo json_encode($Posts);
?>