<?php 
require 'connection.php';
require 'Searches.php';

$s = new Searches(connect());
$IDType = "RID";
$Reports = $s->getProblems();

echo json_encode($Reports);

?>