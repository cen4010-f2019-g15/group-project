<?php 
require 'connection.php';

$s = new Searches(connect());
echo $s->getProblems();
?>