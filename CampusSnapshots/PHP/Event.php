<?php
require 'connection.php';
require 'Searches.php';

$s = new Searches(connect());
$Events = $s->getEvents();

echo json_encode($Events);
?>