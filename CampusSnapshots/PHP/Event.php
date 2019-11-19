<?php
require 'Searches.php';
require 'connection.php';
$s = new Searches(connect());
echo $s->getEvents();
?>